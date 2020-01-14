<?php

class DBFilmDAO implements IFilmDAO {

	public function get_from_id(int $id): ?Film {
		$stmt = DB::stmt(
			"SELECT id, titolo, durata, anno, descrizione
				FROM films
					JOIN films_descrizioni
						ON films.id = films_descrizioni.film
				WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Film($r["id"], $r["titolo"], $r["durata"], $r["anno"], $r["descrizione"]);
		else
			return null;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, titolo, durata, anno, descrizione
				FROM films JOIN films_descrizioni
					ON films.id = films_descrizioni.film
				WHERE MATCH(titolo) AGAINST(? IN NATURAL LANGUAGE MODE)
					OR MATCH(descrizione) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Film($r["id"], $r["titolo"], $r["durata"], $r["anno"], $r["descrizione"]);
		return $res;
	}

	/** @inheritDoc */
	public function suggest_me(int $utente_id): array {
		$res = [];
		$create_view_stmt = DB::stmt("
create or replace view generi_pesi as
select film_genere_voto.genere, sum(voto) / count(genere) media
from (
         select film_has_genere.genere, giudizi_utente.voto
         from (
                  select films.id film, giudizi.voto
                  from giudizi
                           join films on giudizi.film = films.id
                  where utente = :utente
              ) as giudizi_utente
                  join film_has_genere on film_has_genere.film = giudizi_utente.film
     ) as film_genere_voto
group by genere
        ");
		$create_view_stmt->execute([":utente" => $utente_id]);
		$take_data_stmt = DB::stmt(
			"
select film_has_genere.film,
       ifnull((
                  select avg(voto)
                  from giudizi
                  where film = film_has_genere.film), 0) media
from film_has_genere
where film_has_genere.genere in (
    select genere
    from generi_pesi
    where media = (select max(media) from generi_pesi)
)
  and film_has_genere.film not in (
    select film
    from giudizi
    where utente = :utente)
order by media desc
limit 5");
		if ($take_data_stmt->execute([":utente" => $utente_id]))
			while ($r = $take_data_stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = $this->get_from_id($r["film"]);
		$drop_view_stmt = DB::stmt("drop view generi_pesi;");
		$drop_view_stmt->execute();
		return $res;
	}

	public function downloadCopertina(int $id) {
		$stmt = DB::stmt("SELECT copertina FROM films_copertine WHERE film = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return $r["copertina"];
		else
			return null;
	}

	public function uploadCopertina(int $id, $copertina_bin): bool {
		$stmt = DB::stmt("UPDATE films_copertine SET copertina = ? WHERE film = ?");
		return $stmt->execute([$copertina_bin, $id]) and $stmt->rowCount() === 1;
	}

	/** @inheritDoc */
	public function getClassifica(): array {
		$res = [];
		$stmt = DB::stmt(
			"select films.*, descrizione, voto_medio
				from films
				         left join (select film, AVG(giudizi.voto) voto_medio from giudizi group by film) x
				                   on films.id = x.film
				         join films_descrizioni on films.id = films_descrizioni.film
				order by voto_medio desc
				limit 50");
		if ($stmt->execute())
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = [
					$r["voto_medio"],
					new Film($r["id"], $r["titolo"], $r["durata"], $r["anno"], $r["descrizione"])
				];
		return $res;
	}

	public function create(Film $film, $copertina_bin): ?Film {
		DB::beginTransaction();
		$stmt1 = DB::stmt("INSERT INTO films (titolo, durata, anno) VALUES (?, ?, ?)");
		if (!$stmt1->execute([$film->getTitolo(), $film->getDurata(), $film->getAnno()])) {
			DB::rollbackTransaction();
			return null;
		}
		$film_id = DB::lastInsertedID();
		$stmt2 = DB::stmt("INSERT INTO films_descrizioni (film, descrizione) VALUES (?, ?)");
		if (!$stmt2->execute([$film_id, $film->getDescrizione()])) {
			DB::rollbackTransaction();
			return null;
		}
		$stmt3 = DB::stmt("INSERT INTO films_copertine (film, copertina) VALUES (?, ?)");
		if (!$stmt3->execute([$film_id, $copertina_bin])) {
			DB::rollbackTransaction();
			return null;
		}
		DB::commitTransaction();
		return self::get_from_id($film_id);
	}

	public function update(Film $film): ?Film {

		$film_reale = self::get_from_id($film->getID());
		if (!$film_reale)
			return null;

		$same_titolo = $film_reale->getTitolo() === $film->getTitolo();
		$same_durata = $film_reale->getDurata() === $film->getDurata();
		$same_anno = $film_reale->getAnno() === $film->getAnno();
		$same_descrizione = $film_reale->getDescrizione() === $film->getDescrizione();

		if ($same_titolo and $same_durata and $same_anno and $same_descrizione)
			return $film;

		DB::beginTransaction();

		if (!$same_titolo) {
			$stmt_titolo = DB::stmt("UPDATE films SET titolo = ? WHERE id = ?");
			if (
				!$stmt_titolo->execute([$film->getTitolo(), $film->getID()])
				or $stmt_titolo->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_durata) {
			$stmt_durata = DB::stmt("UPDATE films SET durata = ? WHERE id = ?");
			if (
				!$stmt_durata->execute([$film->getDurata(), $film->getID()])
				or $stmt_durata->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_anno) {
			$stmt_anno = DB::stmt("UPDATE films SET anno = ? WHERE id = ?");
			if (
				!$stmt_anno->execute([$film->getAnno(), $film->getID()])
				or $stmt_anno->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		if (!$same_descrizione) {
			$stmt_descrizione = DB::stmt("UPDATE films_descrizioni SET descrizione = ? WHERE film = ?");
			if (
				!$stmt_descrizione->execute([$film->getDescrizione(), $film->getID()])
				or $stmt_descrizione->rowCount() === 0
			) {
				DB::rollbackTransaction();
				return null;
			}
		}

		DB::commitTransaction();
		return self::get_from_id($film->getID());
	}

	public function delete(int $id): bool {
		$stmt = DB::stmt("DELETE FROM films WHERE id = ?");
		return $stmt->execute([$id]) and $stmt->rowCount() === 1;
	}

}
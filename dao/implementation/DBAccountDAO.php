<?php

class DBAccountDAO implements IAccountDAO {

	public function exists(string $email): bool {
		$stmt = DB::stmt("SELECT email FROM utenti WHERE email = ?");
		return $stmt->execute([$email]) and $stmt->rowCount() === 1;
	}

	public function create(Utente $utente): ?Utente {
		$stmt = DB::stmt("INSERT INTO utenti (nome, cognome, email, password, gestore) VALUES (?, ?, ?, ?, ?)");
		$stmt->bindValue(1, $utente->getNome());
		$stmt->bindValue(2, $utente->getCognome());
		$stmt->bindValue(3, $utente->getEmail());
		$stmt->bindValue(4, $utente->getPassword());
		$stmt->bindValue(5, $utente->isGestore(), PDO::PARAM_BOOL);
		if ($stmt->execute())
			return self::findByID(DB::lastInsertedID());
		else
			return null;
	}

	public function findByID(int $id): ?Utente {
		$stmt = DB::stmt("SELECT id, nome, cognome, email, password, gestore FROM utenti WHERE id = ?");
		if ($stmt->execute([$id]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
				$r["password"], $r["gestore"] == 1);
		else
			return null;
	}

	public function update(Utente $utente): ?Utente {
		$utente_reale = self::findByID($utente->getID());
		if (!$utente_reale)
			return null;
		if ($utente_reale->getPassword() === $utente->getPassword())
			return $utente;
		$stmt = DB::stmt("UPDATE utenti SET password = ? WHERE id = ?");
		if ($stmt->execute([$utente->getPassword(), $utente->getID()]) and $stmt->rowCount() === 1)
			return self::findByID($utente->getID());
		else
			return null;
	}

	public function authenticate(string $email, string $password): ?Utente {
		$stmt = DB::stmt(
			"SELECT id, nome, cognome, email, password, gestore FROM utenti WHERE email = ? AND password = ?");
		if ($stmt->execute([$email, $password]) and $r = $stmt->fetch(PDO::FETCH_ASSOC))
			return new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
				$r["password"], $r["gestore"] == 1);
		else
			return null;
	}

	/** @inheritDoc */
	public function search(string $fulltext): array {
		$res = [];
		$stmt = DB::stmt(
			"SELECT id, nome, cognome, email, password, gestore FROM utenti
					WHERE MATCH(nome) AGAINST(? IN NATURAL LANGUAGE MODE)
						OR MATCH(cognome) AGAINST(? IN NATURAL LANGUAGE MODE)");
		if ($stmt->execute([$fulltext, $fulltext]))
			while ($r = $stmt->fetch(PDO::FETCH_ASSOC))
				$res[] = new Utente($r["id"], $r["nome"], $r["cognome"], $r["email"],
					$r["password"], $r["gestore"] == 1);
		return $res;
	}

	public function delete(int $id): bool {
		$stmt = DB::stmt("DELETE FROM utenti WHERE id = ?");
		return $stmt->execute([$id]) and $stmt->rowCount() === 1;
	}

}
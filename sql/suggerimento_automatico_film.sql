create or replace view generi_pesi as
# generi e media dei voti dei film di quel genere votati dall'utente => (genere, media)
select film_genere_voto.genere,
       (
               sum(voto) / (select count(*)
                            from film_has_genere
                            where genere = film_genere_voto.genere
                              and film in (select film from giudizi where utente = :utente))
           ) media
from (
         # generi join giudizi dell'utente => (genere, film, voto)
         select film_has_genere.genere, giudizi_utente.film, giudizi_utente.voto
         from (
                  # giudizi dell'utente => (film, voto)
                  select films.id film, giudizi.voto
                  from giudizi
                           join films on giudizi.film = films.id
                  where utente = :utente
              ) as giudizi_utente
                  join film_has_genere on film_has_genere.film = giudizi_utente.film
     ) as film_genere_voto
group by genere;

select film_has_genere.film
from film_has_genere
where film_has_genere.genere in (
    # generi con media massima per un utente
    select genere
    from generi_pesi
    where media = (select max(media) from generi_pesi)
)
  and film_has_genere.film not in (
    # giudizi di un utente
    select film
    from giudizi
    where utente = :utente);

drop view generi_pesi;


create or replace view generi_pesi as
# generi e media dei voti dei film di quel genere votati dall'utente => (genere, media)
select film_genere_voto.genere, sum(voto) / count(genere) media
from (
         # generi join giudizi dell'utente => (genere, voto)
         select film_has_genere.genere, giudizi_utente.voto
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

select film_has_genere.film,
       ifnull((
                  # voto medio di tutti i giudizi
                  select avg(voto)
                  from giudizi
                  where film = film_has_genere.film), 0) media
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
    where utente = :utente)
group by film
order by media desc
limit 5;

drop view generi_pesi;


classDiagram
class Utente{
	-id
	-nome
	-cognome
	-email
	-password
}
class Film{
	-id
	-titolo
	-durata
	-anno
	-descrizione
	-copertina
}
class Artista{
	-id
	-nome
	-nascita
	-descrizione
	-faccia
}
class Recitazione{
	-personaggio
}
Artista "*" -- "*" Film : Regia
Artista "1" -- "*" Recitazione
Recitazione "*" -- "1" Film
class Visione{
    - voto *
    - momento
}
Utente "1" -- "*" Visione
Visione "*" -- "1" Film
class Saga{
    -id
    -titolo
}
Film "*" -- "*" Saga
class Genere{
    -id
    -nome
}
Film "*" -- "*" Genere

classDiagram


class Amicizia {
    -momento_richiesta
}
class AmiciziaAccettata {
    -momento_accettazione
}
Amicizia <|-- AmiciziaAccettata

class Lista {
    -id
    -nome
    -visibilità
}
Utente  "1" -- "*" Lista : Proprietario
Lista  "*" -- "*" Utente : Follower
Lista o-- "*" Film: Contiene

class Film {
	-id
	-titolo
	-durata
	-anno
	-descrizione
	-copertina
}

class Artista {
	-id
	-nome
	-nascita
	-descrizione
	-faccia
}

Artista "*" -- "*" Film : Regia

class Recitazione {
	-personaggio
}
Artista "1" -- "*" Recitazione
Recitazione "*" -- "1" Film

class Saga {
    -id
    -titolo
}
Film "*" -- "*" Saga

class Genere {
    -id
    -nome
}
Film "*" -- "*" Genere

class Utente {
	-id
	-nome
	-cognome
	-email
	-password
}

Utente "1" -- "*" Amicizia: Richiedente
Amicizia "*" -- "1" Utente: Accettante

class FilmGuardati {
    -voto*
    -momento
}
Utente "1" -- "*" FilmGuardati
FilmGuardati "*" -- "1" Film

class FilmDaVedere {
    -momento
}
Utente "1" -- "*" FilmDaVedere
FilmDaVedere "*" -- "1" Film
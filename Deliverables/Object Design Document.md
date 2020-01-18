# Object Design Document
| Versione |    Data    | Descrizione                    | Autori                                    |
|----------|------------|--------------------------------|-------------------------------------------|
| 0.1      | 15/1/2020  | Prima stesura                  | Gianluca Pirone, Michelantonio Panichella |

## Introduzione 
Fino ad ora, con il Requirement Analysis Document e il System Design Document si è descritto quello che in linea di massima sarà il nostro sistema andando ad identificare la struttura logica della WebApplication da noi progettata, tirando fuori da essa le parti principali che ci permettono di sviluppare il nostro sistema quali: identificazione dei requisiti funzionali (le funzionalità che il sistema deve avere), identificazione dei requisiti non funzionali (requisiti che offrono qualità al sistema), identificazione di attori, sottosistemi, serivizi da implementare, oggetti presenti e soprattuto lo scopo di quello che sarà "Moovie".
Con il documento di  Object Design invece andremo ad aggiungere dettagli a tutto quello che fino ad ora abbiamo "trovato" prendendo anche decisioni implementative che dorvanno essere quanto più conformi possibile alle specifiche descrite fino ad ora, non solo per quanto riguarda le funzionalità e la struttura logica che la Web Application dovrà avere ma rispettando anche i requisiti non funzionali individuati in fase di analisi dei requisiti. 

### Object Design Trade Off
#### Funzionalità vs. Usabilità
Il sito "Moovie" sara progettato in modo tale da offrire tutte le funzionalità a tutti, garantendo dunque, che qualunque tipo di utente possa interfacciarsi con le funzionalità presenti all'interno del nostro sistema nel modo più semplice ed intuitibile possibile. 

#### Rapido sviluppo vs. Funzionalità
Nonostante i tempi ristretti a disposizione del team per la progettazione dell'intero sistema, si cercherà, di sviluppare (nei tempi indicati) tutte le funzionalità individuate durante la fase di analisi dei requisiti, partendo però da quelle che hanno più alta priorità.

#### Efficienza vs. Portabilità 
Il sistema, essendo una Web Application che dovrà offrire il proprio servizio in vari browser e quindi in vari ambienti, sarà progettato in modo da garantire quantà più efficienza possibile nel "porting" da un ambiente ad un altro. 

## Guida alla documentazione delle interfaccie
Nel momento in cui andremo a sviluppare il sito Moovie seguiremo alune regole che ci permetteranno di implementare il tutto in modo  tale che ogni sviluppatore segue le stesse linee guide.
Naming Convention:
Utilizzeremo:
- Nomi intuitivi;
- Nomi di lunghezza medio-corta;
- Nomi con caratteri alfabetici (senza numeri o altri tipi di caratteri)

Variabili:
- I nomi delle varibili inizieranno tutte con la lettera minuscola e nela caso una variabile è composta da più di una parola, le parole successive alla prima inizieranno con la lettera maiuscola;
- I nomi delle variabili non dovranno essere casuali, ma essere assegnati in modo logico in base a ciò che la variabile rappresenta;
- Le varibili saranno definite sempre ad inizio codice in modo da permettere a tutti coloro una facile individiazione di esse;

Metodi:
- I nomi dei metodi inizieranno tutte con la lettera minuscola e nel caso una variabile è composta da più di una parola, le parole successive alla prima inizieranno con la lettera maiuscola 
- I nomi dei metodi dovranno suggerire la funzionalità che offre;

Classi:
- I nomi delle classi inizieranno sempre con la letterà maiuscola e nel caso il nome di una classe sia composto da più di una parola, le parole successive alla prima dovranno iniziare anch'esse con la lettera maiuscola;
- I nome delle classi non dovranno essere casuali ma dovranno attenersi a quello che effettivamente andranno a rappresentare;


### Definizioni, acronimi e riferimenti: 
Definizioni e Acronimi:
RAD: Requirements Analysis Document
SDD: System Design Document
ODD: Object Design Document

Riferimenti
Documento RA(Requirement Analysis)
Documento SD (System Design)

### 2.2 Descrizione delle classi
Classe | Descrizione
----|----
Amicizia | Descrive l'amicizia tra due utenti registrati nel sistema.
Artista | Descrive un artista.
Film | Descrive un film.
Genere| Descrive un genere.
Giudizio | Descrive il voto che un utente registrato ha assegnato ad un film.
Promemoria | Descrive un film che un utente registrato deve ancora guardare.
Recitazione| Descrive una recitazione di un artista in un film.
Utente| Descrive un utente registrato nel sistema.

### 3. Interfacce delle Classi

#### AccountDAO 
Servizio | Descrizione
----|----
public static function exists(string $email): bool | Il sottosistema permette di verificare se esiste una specifica email nel database del sistema.
public static function create(Utente $utente): ?Utente | Il sottosistema permette, tramite la compilazione di un apposito form, di registrare un utente nel sistema. Un oggetto utente passato come parametro verrà salvato nel database.
public static function get_from_id(int $id): ?Utente | Il  sottosistema permette di recuperare tutti i dati di un utente registrato nel sito. Viene passato come parametro un codice id univoco di un utente.
public static function update(Utente $utente): ?Utente | Il  sottosistema permette di aggoirnare i dati di un utente registrato nel sito. Viene passato come parametro un oggetto utente.
public static function authenticate(string $email, string $password): ?Utente | Il  sottosistema permette ad un utente registrato di autenticarsi nel sistema. Vengono passati come parametri una email univoca e la password associata a questa email.
public static function search(string $fulltext): array | Il  sottosistema permette di recuperare una collezione di utenti nel sito. Viene passato come parametro un testo sul quale verrà effettuata la ricerca.

#### AmiciziaDAO 
Servizio | Descrizione
----|----
public static function doRetrieveByFromAndTo(int $user_from, int $user_to): ?Amicizia | Il sottosistema permette di recuperare l'amicizia tra due utenti registrati nel sito. Vengono passati come parametri i codici univoci di due utenti: di chi ha effettuato una richiesta di amicizia e di chi ha accettato questa richiesta.
public static function getFriendships(int $user_id): array | Il sottosistema permette di recuperare tutte le amicizie che un utente registrato ha stretto con altri utenti registrati nel sito. Viene passato come parametro il codice univoco di un utente registrato.
public static function getRequests(int $user_id): array | Il sottosistema permette di recuperare tutte le richieste di amicizia che un utente registrato ha inviato ad altri utenti registrati nel sito. Viene passato come parametro il codice univoco di un utente registrato.
public static function existsSomethingBetween(int $user1, int $user2): bool | Il sottosistema permette di verificare se esiste una relazione tra due utenti registrati nel sito. Vengono passai come parametri i codici univoci di due utenti registrati.
public static function requestFriendshipFromTo(int $user_from, int $user_to): ?Amicizia | Il sottosistema permette di recuperare la richiesta di amicizia che un utente registrato ha inviato ad un altro utente registrato. Vengono passai come parametri i codici univoci di due utenti registrati.
public static function existsRequestFromTo(int $user_from, int $user_to): bool| Il sottosistema permette di verificare se esiste una richiesta di amicizia che un utente registrato ha inviato ad un altro utente registrato nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.
public static function removeFriendshipRequestFromTo(int $user_from, int $user_to): bool | Il sottosistema permette di rimuovere una richiesta di amicizia che un utente registrato ha inviato ad un altro utente registrato nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.
public static function acceptFriendshipRequestFromTo(int $user_from, int $user_to): bool | Il sottosistema permette di accettare ad un utente registrato la richiesta di amicizia che un altro utente registrato ha inviato a lui nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.
public static function refuseFriendshipRequestFromTo(int $user_from, int $user_to): bool | Il sottosistema permette di rifiutare ad un utente registrato la richiesta di amicizia che un altro utente registrato ha inviato a lui nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.
public static function existsFriendshipBetween(int $user1, int $user2) | Il sottosistema permette di verificare se esiste l'amicizia tra due utenti registrati nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.
public static function removeFriendshipBetween(int $user1, int $user2): bool | Il sottosistema permette di rimuovere l'amicizia tra due utenti registrati nel sito. Vengono passati come parametri i codici univoci di due utenti registrati.

#### ArtistaDAO 
Servizio | Descrizione
----|----
public static function get_from_id(int $id): ?Artista | Il sottosistema permette di recuperare tutti i dati di un artista presente nel sito. Viene passato come parametro il codice univoco di un artista.
public static function downloadFaccia(int $id) | Il sottosistema permette di recuperare il volto di un artista presente nel sito. Viene passato come parametro il codice univoco di un artista.
public static function uploadFaccia(int $id) | Il sottosistema permette di aggiornare il volto di un artista presente nel sito. Viene passato come parametro il codice univoco di un artista.
public static function search(string $fulltext): array | Il  sottosistema permette di recuperare una collezione di artisti presenti nel sito. Viene passato come parametro un testo sul quale verrà effettuata la ricerca.
public static function create(Artista $artista, $faccia_bin): ?Artista | Il sottosistema permette di aggiungere un'artista nel sito. Vengono passati come parametri un oggetto artista e un volto di questi.
public static function update(Artista $artista): ?Artista | Il sottosistema permette di aggiornare un'artista presente nel sito. Viene passato come parametro un oggetto artista.
public static function delete(int $artista_id): bool | Il sottosistema permette di cancellare un'artista presente nel sito. Viene passato come parametro il codice univoco di un artista.

#### FilmDAO 
Servizio | Descrizione
----|----
public static function get_from_id(int $id): ?Film | Il sottosistema permette di recuperare tutti i dati di un film presente nel sito. Viene passato come parametro il codice univoco di un film.
public static function search(string $fulltext): array | Il sottosistema permette di recuperare una collezione di film presenti nel sito. Viene passato come parametro un testo sul quale verrà effettuata la ricerca.
public static function suggest_me(int $utente_id): array | Il sottosistema permette ad un utente registrato di farsi suggerire un elenco di film presenti nel sito. Viene passato come parametro il codice univoco di un utente.
public static function downloadCopertina(int $id) | Il sottosistema permette di recuperare la copertina di un film presente nel sito. Viene passato come parametro il codice univoco di un film.
public static function uploadCopertina(int $id, $copertina_bin): bool | Il sottosistema permette di aggiornare la copertina di un film presente nel sito. Viene passato come parametro il codice univoco di un film.
public static function getClassifica(): array | Il  sottosistema permette di recuperare una collezione di film presenti nel sito, per rappresentare una classifica di film in base al voto medio di ciascuno.
public static function create(Film $film, $copertina_bin): ?Film | Il sottosistema permette di aggiungere un film nel sito. Vengono passati come parametri un oggetto film e la sua copertina.
public static function update(Film $film): ?Film | Il sottosistema permette di aggiornare un film presente nel sito. Viene passato come parametro un oggetto film.
public static function delete(int $film_id): bool | Il sottosistema permette di cancellare un film presente nel sito. Viene passato come parametro il codice univoco di un film.

#### GenereDAO 
Servizio | Descrizione
----|----
public static function doRetrieveByID(int $id): ?Genere| Il sottosistema permette di recuperare un genere presente nel sito. Viene passato come parametro il codice univoco di un genere.
public static function doRetrieveByFilm(int $id): array | Il sottosistema permette di recuperare una collezione di generi di un film presente nel sito. Viene passato come parametro il codice univoco di un film.
public static function get_generi_from_film(int $id): array | Il sottosistema permette di recuperare una collezione di GeneriID di un film presente nel sito.Viene passato come parametro il codice univoco di un film.
public static function get_films_from_genere(int $id): array | Il sottosistema permette di recuperare una collezione di FilmID di un genere presente nel sito. Viene passato come parametro il codice univoco di un genere.
public static function get_all(): array | Il sottosistema permette di recuperare tutti i generi presenti nel sito.
public static function set_only(int $film_id, array $assign_genere_ids): bool | Il sottosistema permette di assegnare determinati generi ad un film. Vengono passati come parametri il codice univoco di un film e una collezione di generi.
public static function create(Genere $genere): ?Genere | Il sottosistema permette di aggiungere un genere nel sito. Viene passato come parametro un oggetto genere.
public static function update(Genere $genere): ?Genere | Il sottosistema permette di aggiornare un genere presente nel sito. Viene passato come parametro un oggetto genere.
public static function delete(int $genere_id): bool | Il sottosistema permette di cancellare un genere presente nel sito. Viene passato come parametro il codice univoco di un genere.
public static function exists(string $nome): bool | Il sottosistema permette di verificare se un genere è presente nel sito. Viene passato come parametro il nome di un genere.

#### GiudizioDAO 
Servizio | Descrizione
----|----
public static function create(Giudizio $giudizio): bool | Il sottosistema permette di assegnare un voto ad un film. Viene passato come parametro un oggetto giudizio.
public static function update(Giudizio $giudizio): bool | Il sottosistema permette di modificare un voto ad un film. Viene passato come parametro un oggetto giudizio.
public static function drop(Giudizio $giudizio): bool | Il sottosistema permette di cancellare un voto ad un film. Viene passato come parametro un oggetto giudizio.
public static function getAllOf(array $utenti): array | Il sottosistema permette di recuperare tutti i voti assegnati ai film da ogni utente. Viene passato come parametro una collezione di utenti.
public static function doRetrieveByUtenteAndFilm(int $utente, int $film): ?Giudizio | Il sottosistema permette di recuperare il voto che un utente ha assegnato ad un film. Vengono passati come parametri il codice univoco di un utente e di un film.
public static function exists(int $utente, int $film): bool | Il sottosistema permette di verificare se un utente ha assegnato un voto ad un film presente nel sito. Vengono passati come parametri il codice univoco di un utente e di un film.

#### PromemoriaDAO 
Servizio | Descrizione
----|----
public static function get(int $utente): array | Il sottosistema permette di recuperare una collezione di film che un utente deve ancora guardare. Viene passato come parametro il codice univoco di un utente.
public static function exists(int $utente, int $film): bool | Il sottosistema permette di verificare se un utente deve ancora guardare un determinato film presente nel sito. Vengono passati come parametri il codice univoco di un utente e di un film.
public static function create(Promemoria $promemoria): bool | Il sottositema permette di aggiugengere un film tra quelli che deve ancora guardare. Viene passato come parametro un oggetto promemoria.
public static function drop(Promemoria $promemoria): bool | Il sottositema permette di cancellare un film tra quelli che deve ancora guardare. Viene passato come parametro un oggetto promemoria.
public static function get_from_utente_and_film(int $utente, int $film): ?Promemoria | Il sottosistema permette di recuperare una determinato film presente nel sito che un utente deve ancora guardare. Viene passato come parametro il codice univoco di un utente e di un film.

#### RecitazioneDAO 
Servizio | Descrizione
----|----
public static function doRetrieveByAttore(int $id): array | Il sottosistema permette di recuperare tutte le recitazioni di un attore. Viene passato come parametro il codice univoco di un attore.
public static function doRetrieveByFilm(int $id): array | Il sottosistema permette di recuperare tutte gli attori partecipanti di un film. Viene passato come parametro il codice univoco di un film.
public static function set_only(int $film_id, array $recitazioni): bool | Il sottosistema permette di assegnare determinati attori ad un film. Vengono passati come parametri il codice univoco di un film e una collezione di attori.

#### RegiaDAO 
Servizio | Descrizione
----|----
public static function get_films_from_artista(int $id): array | Il sottosistema permette di recuperare una collezione di film che un artista ha girato. Viene passato come parametro il codice univoco di un artista.
public static function get_artisti_from_film(int $id): array | Il sottosistema permette di recuperare una collezione di artisti che hanno girato un determinato film. Viene passato come parametro il codice univoco di un film.
public static function set_only(int $film_id, array $registi_id): bool | Il sottosistema permette di assegnare gli artisti che hanno curato la regia di un determinato film. Vengono passati come parametri il codice univoco di un film e una collezione di artisti.

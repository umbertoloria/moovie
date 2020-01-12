# System Design Document
| Versione | Data       | Descrizione                                                                                | Autori                                    |
|----------|------------| -------------------------------------------------------------------------------------------|-------------------------------------------|
| 0.1      | 19/11/2019 | Prima stesura                                                                              | Michelantonio Panichella, Gianluca Pirone |
| 0.2      | 26/11/2019 | Mappatura HW/SW, gestione accessi                                                          | Gianluca Pirone                           |
| 0.3      | 28/11/2019 | Descrizione del problema, revisione sottosistemi, condizioni limite e servizi sottosistemi | Michelantonio Panichella                  |
| 0.4      | 29/11/2019 | Definizioni, acronimi, abbreviazioni, riferimenti, panoramica e gestione dati persistenti  | Michelantonio Panichella, Gianluca Pirone |
| 0.5      | 18/12/2019 | Revisione sottosistemi, revisione diagrammi e revisione tavola degli accessi               | Team                                      |
| 0.6      | 7/1/2020   | Miglioramento sottosistemi, miglioramento tavola degli accessi                             | Gianluca Pirone                           |
| 0.7      | 9/1/2020   | Revisione sottosistemi, integrazione nuovi diagrammi e miglioramento tavola degli accessi  | Team                                      |
| 0.8      | 12/1/2020  | Ridivisione sottosistemi                                                                   | Team                                      |

# Indice
1. [Introduzione](#introduzione)
    1. [Descrizione del problema](#descrizione-del-problema)
    2. [Design goals](#design-goals)
        1. [DG_1 Usability](#dg_1-usability)
        2. [DG_2 Reliability](#dg_2-reliability)
        3. [DG_3 Performance](#dg_3-performance)
        4. [DG_4 Supportability](#dg_4-supportability)
    3. [Definizioni, acronimi e abbreviazioni](#definizioni-acronimi-e-abbreviazioni)
    4. [Riferimenti](#riferimenti)
    5. [Panoramica](#panoramica)
2. [Architettura del sistema](#architettura-del-sistema)
    1. [Panoramica](#panoramica)
    2. [Decomposizione in sottosistemi](#decomposizione-in-sottosistemi)
        1. [Sottosistemi](#sottosistemi)
            1. [Ricerca](#ricerca)
            2. [Account](#account)
            3. [Film](#film)
            4. [Amicizia](#amicizia)
            5. [Gestione](#gestione)
    3. [Mappatura hardware/software](#mappatura-hardwaresoftware)
    4. [Gestione dei dati persistenti](#gestione-dei-dati-persistenti)
    5. [Gestione degli accessi](#gestione-degli-accessi)
    6. [Condizioni limite](#condizioni-limite)
        1. [Inizializzazione](#inizializzazione)
        2. [Terminazione](#terminazione)
        3. [Fallimenti](#fallimenti)
3. [Servizi dei sottosistemi](#servizi-dei-sottosistemi)
    1. [Sottosistema ricerca](#sottosistema-ricerca)
    2. [Sottosistema account](#sottosistema-account)
    3. [Sottosistema amicizia](#sottosistema-amicizia)
    4. [Sottosistema film](#sottosistema-film)
    5. [Sottosistema gestione](#sottosistema-gestione)

# Introduzione

## Descrizione del problema
La web application proposta è stata progettata per permettere a chiunque fosse interessato e appassionato al cinema, di
gestire i propri film preferiti (e non solo) nella maniera quanto più semplice e divertente possibile.

Moovie offre la possibilità di consultare al suo interno tantissime informazioni riguardanti il mondo del cinema
e, attraverso delle funzionalità ben specifiche, di rendere l'utente in grado di gestire al meglio alcuni dati
riguardanti lui e i film.
Il sito offre quindi le seguenti funzionalità:
- gestione del proprio account;
- ricerca e consultazione delle informazioni di film, attori e utenti;
- gestione delle amicizie: richiesta, accettazione, rifiuto e cancellazione;
- gestione dei film: aggiunta, modifica, rimozione di un giudizio e aggiunta e rimozione di un promemoria.

## Design goals
Moovie sarà progettato in modo da essere una web application di qualità. Questa è visibile all'interno del sistema
laddove ci interfacciamo con esso, in quanto Moovie dovrà: offrire un'interfaccia facile e semplice da utilizzare da
parte di tutti gli utenti; garantire tempi di risposta minimi; ed offrire servizi di qualità nel trattamento dei dati.

### DG_1 Usability
- 2.1.1 Facilità d'uso: il sito deve offrire la possibiltà di utilizzare ogni funzionalità del sito in modo semplice;
- 2.1.2 Garanzia di orientamento: L’utente non deve sentirsi smarrito durante l’uso delle interfacce. L’utente deve
sempre poter raggiungere la home e login/logout;
- 2.1.3 Sarà totalmente gratuito.

### DG_2 Reliability
- 2.2.1 Consistenza dei dati: Moovie, attraverso un RDBMS, garantirà la consistenza dei dati;
- 2.2.2 Persistenza dei dati: Moovie offre un sistema di memorizzazione dei dati attraverso un database relazionale, con
il quale sarà possible recuperare informazioni nel modo più veloce e semplice possibile.

### DG_3 Performance
- 2.3.1 Tempo di risposta: il sistema garantirà un tempo di risposta medio, per ogni tipo di funzionalità, minore di 1s;
- 2.3.2 Scalabilità: il sistema sarà in grado di affrontare senza difficoltà fluttuazioni della quantità di utenti
collegati contemporaneamente.

### DG_4 Supportability
- 2.4.1 Compatibilità: sarà compatibile con i browser Google Chrome, Mozilla Firefox e Safari.

## Definizioni, acronimi e abbreviazioni

**Acronimo** | **Descrizione** 
-------- | -------- 
RAD | Requirements Analysis Document
HTTP | HyperText Transfer Protocol 
GUI | Graphic User Interface
DBMS | DataBase Management System  
DB | DataBase 
PDO | PHP Data Objects

## Riferimenti
- [RAD](Requirements%20Analysis%20Document.md)
- Object-Oriented Software Engineering Using UML, Patterns, and Java™ Third Edition
- [Wikipedia](https://www.wikipedia.org/)

## Panoramica
Il documento è stato diviso in quattro sezioni fondamentali, ognuna fornita di una breve descrizione.
Queste sono:
- Introduzione: sezione che vuole illustrare l'ambito che ha portato alla progettazione della web application. 
Vengono forniti e descritti gli obiettivi proposti dal sistema, le varie funzionalità messe a disposizione dei vari
utenti ed i criteri da rispettare.
- Architettura del sistema: sezione che descrive la decomposizione del sistema in sottosistemi, la mappatura
hardware/software di esso, la gestione dei dati persistenti, la gestione degli accessi e le condizioni limite.
- Servizi dei sottosistemi: sezione che fornisce informazioni riguardo i servizi forniti da ogni sottosistema.

# Architettura del sistema

## Panoramica
Il sistema sarà contruito seguendo il pattern architetturale MVC (Model View Controller).
In questo pattern le componenti del sistema appartengono ai 3 tipi di componenti principali:
- Model: permette di accedere alle informazioni del dominio applicativo;
- Controller: riceve i comandi dell'utente e li attua modificando lo stato delle altre due componenti;
- View: si occupati di interfacciare l'utente al sistema visualizzando i dati contenuto all'interno dei model.

## Decomposizione in sottosistemi
### Sottosistemi
I sottosistemi sono stati decomposti raggruppando argomenti tra loro simili e dividendo intelligentemente porzioni
inutilmente legate. Ecco Moovie divisione in sottosistemi:
- Ricerca;
- Account;
- Amicizia;
- Film;
- Gestione.

![](Package%20diagrams/Sottosistemi_Diagram.jpg)

L'immagine rappresenta le varie suddivisioni effettuate e i vari collegamenti tra sottosistemi appartenenti a layer
differenti.

Per procedere verso uno sviluppo più semplice del sistema, questo è stato diviso in tre strati:
- Presentation_Layer: strato che si occupa delle interfacce grafiche con il quale l'utente dovra interagire;
- Application_Layer: strato che si occupa di gestire tutte le richieste che l'utente effettua attraverso il
Presentation_Layer, ricevendo, elaborando e alla fine mostrando il risultato di un'operazione da lui richiesta;
- Data_Layer: strato che si occupa di gestire i dati del sistema.

#### Ricerca
![](Package%20diagrams/Ricerca_Diagram.jpg)

Il sottosistema **Ricerca** si occupa di gestire le ricerche di tutti gli utenti offrendo diverse funzionalità quali:
- Ricerca di un film;
- Ricerca di un artista;
- Ricerca di un utente.

#### Account
![](Package%20diagrams/Account_Diagram.jpg)

Il sottosistema **Account** si occupa di gestire tutti gli account del sistema offrendo diverse funzionalità quali:
- Creare un account;
- Autenticare un account;
- Cambiare password;
- Deautenticare un account;
- Visualizzare un profilo;
- Visualizzare la pagina iniziale.

#### Amicizia
![](Package%20diagrams/Amicizia_Diagram.jpg)

Il sottosistema **Amicizia** si occupa di gestire le amicizie tra account offrendo diverse funzionalità quali:
- Inviare richiesta di amicizia;
- Cancellare richiesta di amicizia;
- Accettare richiesta di amicizia;
- Rifiutare richiesta di amicizia;
- Cancellare amicizia;
- Visualizzare gli amici.

#### Film
![](Package%20diagrams/Film_Diagram.jpg)

Il sottosistema **Film** si occupa di gestire i giudizi di tutti gli utenti autenticati offrendo diverse funzionalità quali:
- Visualizzare un film;
- Visualizzare un artista;
- Visualizzare un genere;
- Aggiungere un giudizio;
- Modificare un giudizio;
- Rimuovere un giudizio;
- Visualizzare i giudizi;
- Aggiungere un promemoria;
- Rimuovere un promemoria;
- Visualizzare i promemoria;
- Suggerimenti automatici di film;
- Visualizzare la classifica dei film.

### Gestione
![](Package%20diagrams/Gestione_Diagram.jpg)

Il sottosistema **Gestione** si occupa di gestire i dati presenti nel sito offrendo diverse funzionalità quali:
- Aggiungere un film;
- Aggiungere un artista;
- Aggiungere un genere;
- Modificare un film;
- Modificare un artista;
- Modificare un genere;
- Rimuovere un film;
- Rimuovere un artista;
- Rimuovere un genere;
- Aggiornare generi di un film;
- Aggiornare artisti in un film.

## Mappatura hardware/software
![](Deployment%20diagrams/Mappatura_HW_SW.jpg)

Per il sistema "Moovie" si è scelto di utilizzare una struttura **three-tier** composta da un tier di Presentation, un
tier di Business Logic e un tier di Data Resource.
"Ogni tier ha dei ruoli ben precisi" e ognuno ha il proprio tipo di device su cui viene eseguito. Il tier di
Presentazione, attraverso la componente di web browser permette ad un client di interfacciarsi con l'intero sistema, 
fornendo ad un utente la possibilità di fare richieste e renderdo i risultati di ognuna visibili all'utente. Tutte le
richieste che un client esegue, attraverso i protocolli HTTP o HTTPS, arrivano sul web server (che esegue Apache e
PHP), sul quale viene eseguita, tra le altre cose, la logica di business del sito e, in caso di necessità,
interfacciarsi con il DBMS per utilizzare i dati persistenti.

## Gestione dei dati persistenti
Il sito Moovie ha al suo interno alcuni dati che devono essere mantenuti affinché il suo funzionamento sia valido.
La persistenza di questi, è stata scelta di dargliela, memorizzando essi in un database relazionale nel quale i dati
persistenti vengono rappresentati attraverso delle tabelle, ognuna delle quali è composta da righe (gli elementi, le
istanze di ogni dato) e le colonne (attributi, descrizioni di ogni istanza di dato).
I dati vengono gestiti attraverso MySQL che è un DBMS (Data Base Management System) che permette di manipolare le
informazioni che si vogliono controllare sulla base di dati.

![](Database%20Scheme/DataBaseSchema.png)

L'immagine sopra presente, descrive quello che è lo schema dei dati che dovranno essere mantenuti nel nostro database in
maniera persistente.

All'interno del nostro Data Base, inoltre, sono state salvate anche tutte le immagini che il sito contiene in modo tale
da avere una locazione unica dei dati e una "maiera" unica per gestire le stesse. Per evitare di avere dei rallentamenti 
all'interno del sistema, la tabella delle immagini è diversa rispetto a quella a cui si riferisce la stessa 
(Film, Film Copertina, Artista, Artista Faccia). In questo modo, se vogliamo ottente delle informazioni riguardanti 
un qualcosa senza necessità di avere l'immagine, la query non sarà appesantita dalla presenza dell'immagine
e quindi potrà essere restituta più velocemente.

### Struttura tabelle

#### Tabella generi
| Attributo |    Tipo      | Chiave   |
|-----------|--------------|----------|
| id        | INT          | Primaria |
| nome      | VARCHAR(100) |          |

#### Tabella film_has_genere
| Attributo |    Tipo    | Chiave                                     |
|-----------|------------|--------------------------------------------|
| film      | INT        | Primaria, esterna (derivante da films.id)  |
| genere    | INT        | Primaria, esterna (derivante da generi.id) |

#### Tabella recitazione
| Attributo   |    Tipo      | Chiave                                      |
|-------------|--------------|---------------------------------------------|
| attore      | INT          | Primaria, esterna (derivante da artisti.id) |
| film        | INT          | Primaria, esterna (derivante da films.id)   |
| personaggio | VARCHAR(100) |                                             |

#### Tabella artisti
| Attributo |    Tipo      | Chiave   |
|-----------|--------------|----------|
| id        | INT          | Primaria |
| nome      | VARCHAR(100) |          |
| nascita   | DATE         |          |

#### Tabella artisti_facce
| Attributo |    Tipo    | Chiave                                      |
|-----------|------------|---------------------------------------------|
| artista   | INT        | Primaria, esterna (derivante da artisti.id) |
| faccia    | MEDIUMBLOB |                                             |

#### Tabella artisti_descrizioni
| Attributo   |    Tipo    | Chiave                                      |
|-------------|------------|---------------------------------------------|
| artista     | INT        | Primaria, esterna (derivante da artisti.id) |
| descrizione | TEXT       |                                             |

#### Tabella films_copertine
| Attributo |    Tipo    | Chiave                                    |
|-----------|------------|-------------------------------------------|
| film      | INT        | Primaria, esterna (derivante da films.id) |
| faccia    | MEDIUMBLOB |                                           |

#### Tabella films_descrizioni
| Attributo   |    Tipo    | Chiave                                    |
|-------------|------------|-------------------------------------------|
| film        | INT        | Primaria, esterna (derivante da films.id) |
| descrizione | TEXT       |                                           |

#### Tabella giudizi
| Attributo |   Tipo   | Chiave                                     |
|-----------|----------|--------------------------------------------|
| film      | INT      | Primaria, esterna (derivante da films.id)  |
| utente    | INT      | Primaria, esterna (derivante da utenti.id) |
| voto      | INT      |                                            |
| timestamp | DATETIME |                                            |

#### Tabella promemoria
| Attributo |    Tipo    | Chiave                                     |
|-----------|------------|--------------------------------------------|
| film      | INT        | Primaria, esterna (derivante da films.id)  |
| utente    | INT        | Primaria, esterna (derivante da utenti.id) |
| timestamp | DATETIME   |                                            |

#### Tabella amicizie
| Attributo         |    Tipo    | Chiave                                    |
|-------------------|------------|-------------------------------------------|
| mittente          | INT        |Primaria, esterna (derivante da utenti.id) |
| destinatario      | INT        |Primaria, esterna (derivante da utenti.id) |
| momento_richiesta | DATETIME   |                                           |

#### Tabella utenti
| Attributo |    Tipo      | Chiave                       |
|-----------|--------------|------------------------------|
| id        | INT          | Primaria                     |
| nome      | VARCHAR(100) |                              |
| cognome   | VARCHAR(10)  |                              |
| email     | VARCHAR(100) |                              |
| password  | VARCHAR(100) |                              |
| gestore   | BIT          |                              |

#### Tabella films
| Attributo |    Tipo      | Chiave                       |
|-----------|--------------|------------------------------|
| id        | int          | Primaria                     |
| titolo    | VARCHAR(100) |                              |
| durata    | INT          |                              |
| anno      | YEAR         |                              |

#### Tabella regie
| Attributo  |    Tipo    | Chiave                                      |
|------------|------------|---------------------------------------------|
| film       | INT        | Primaria, esterna (derivante da films.id)   |
| regista    | INT        | Primaria, esterna (derivante da artisti.id) |

## Gestione degli accessi
Moovie prevede differenti tipologie di utenza, ognuna delle quali può usufruire di varie funzionalità, a seconda del
tipo di oggetto con cui interagiscono.

Per documentare i diritti di accesso per ogni attore, viene utilizzata la Matrice di Accessi sottostante.

**Sottosistemi / Attori** | **Ricerca**                                            | **Account**                                                                                              | **Amicizia**                                                                                                                                                                    | **Film**                                                                                                                                                                                                                                                                                                                           | **Gestione**                                                                                                                                                                                                                                                |
--------------------------|--------------------------------------------------------|----------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
Utente                    | RicercaFilm()<br/>RicercaArtista()                     | CreareAccount()<br/>AutenticareAccount()                                                                 |                                                                                                                                                                                 | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/>                                                                                                                                                                                                                                                         |                                                                                                                                                                                                                                                             |
Utente autenticato        | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente() | CambiarePassword()<br/>DeautenticareAccount()<br/>VisualizzareProfilo()<br/>VisualizzarePaginaIniziale() | InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia()<br/>VisualizzareAmici() | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>VisualizzareGiudizi()<br/>AggiungerePromemoria()<br/>RimuoverePromemoria()<br/>VisualizzarePromemoria()<br/>SuggerimentiAutomaticiFilm()<br/>VisualizzareClassificaFilm()<br/> |                                                                                                                                                                                                                                                             |
Utente gestore            | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente() | CambiarePassword()<br/>DeautenticareAccount()<br/>VisualizzareProfilo()<br/>VisualizzarePaginaIniziale() | InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia()<br/>VisualizzareAmici() | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>VisualizzareGiudizi()<br/>AggiungerePromemoria()<br/>RimuoverePromemoria()<br/>VisualizzarePromemoria()<br/>SuggerimentiAutomaticiFilm()<br/>VisualizzareClassificaFilm()<br/> | AggiungereFilm()<br/>AggiungereArtista()<br/>AggiungereGenere()<br/>ModificareFilm()<br/>ModificareArtista()<br/>ModificareGenere()<br/>RimuovereFilm()<br/>RimuovereArtista()<br/>RimuovereGenere()<br/>AggiornareGeneriFilm()<br/>AggiornareArtistiFilm() |

Questa matrice ha solo uno scopo esplicativo verso il lettore di questo documento. I controlli NON verranno realizzati
direttamente tramite un'implementazione della suddetta matrice. Tutti i controlli che quest'ultima impone verranno
realizzati diversamente.

## Condizioni limite

### Inizializzazione
Allo start-up del sistema è necessario l'avvio di un web server Apache, il quale, attraverso MySQL acquisirà le
informazioni necessarie all'interno del database per permettere all'utente la viusualizzazione della HomePage.
Ritrovandosi su questa, l'utente avrà la possibilità di usufrurire di tutte le funzionalità che Moovie offre.

### Terminazione
In fase di terminazione del sistema sarà garantita una corretta persistenza dei dati annullando le eventuali operazioni
in esecuzione. Inoltre ogni sottosistema cesserà di operare correttamente.

### Fallimenti
In caso di errore o fallimento del sistema o dei suoi sottosistemi, Moovie garantirà di tornare ad una condizione
precedente di funzionamento ottimale.

# Servizi dei sottosistemi
Il sito Moovie per semplicità è stato decomposto in sottosistemi e per ognuno di questi sono previste delle operazioni
che sono i servizi che la web application offre.

## Sottosistema ricerca
Sottosistema | Descrizione
-------------|---
Ricerca     | Il sottosistema ricerca si occupa di fornire tutti i servizi che offrono la possibilità di effettuare delle ricerche e ricevere delle informazioni sul sito

Servizi   | Descrizione
----------|---
RicercaUtente()  | Servizio che offre la possibilità di ricercare un utente all'interno di Moovie
RicercaArtista() | Servizio che offre la possibilità di ricercare un artista all'interno di Moovie
RicercaFilm()    | Servizio che offre la possibilità di ricercare un film all'interno di Moovie

## Sottosistema account
Sottosistema | Descrizione
-------------|------------
Account      | Il sottosistema account si occupa di fornire tutti i servizi che permettono ad un utente di gestire il proprio account

Servizi                      | Descrizione
-----------------------------|---
CreareAccount()              | Servizio che offre la possibilità di creare un account ad un utente che non ne posside uno
AutenticareAccount()         | Servizio che permette ad un utente di autenticarsi all'interno del sito
CambiarePassword()           | Servizio che permette ad un utente di effettuare il cambio password
DeautenticareAccount()       | Servizio che permette ad un utente di deautenticarsi dal sito
VisualizzareProfilo()        | Servizio che permette ad un utente di visualizzare un profilo all'interno del sito
VisualizzarePaginaIniziale() | Servizio che permette ad un utente di visualizzare la pagina iniziale del sito

## Sottosistema amicizia
Sottosistema | Descrizione
-------------|---
Amicizia     | Il sottosistema amicizia si occupa di fornire tuttti i servizi che permettono ad un utente di gestire le proprie amicizie presenti su Moovie

Servizi | Descrizione
--------|---
InviareRichiestaAmicizia() | Servizio che offre la possibilità di richiedere, ad un altro utente registrato sul sito, la sua amicizia
CancellareRichiestaAmicizia() | Servizio che offre la possibilità di cancellare la richiesta di amicizia ad un altro utente registrato sul sito
AccettareRichiestaAmicizia() | Servizio che offre la possibilità di confermare una amicizia ricevuta da parte di un altro utente
RifiutareRichiestaAmicizia() | Servizio che permette ad un utente di rifiutare una richiesta di amicizia ricevuta da parte di un altro utente
CancellareAmicizia() | Servizio che permette ad un utente di cancellare l'amicizia con un altro utente
VisualizzaAmici() | Servizio che permette ad un utente di visualizzare tutte le amicizie

## Sottosistema film
Sottosistema | Descrizione
-------------|---
FIlm         | Il sottosistema film si occupa di fornire tutti i servizi che permettono ad un utente di gestire i giudizi riguardanti i film e di farsi suggerire dei film dal sistema

Servizi | Descrizione
--------|---
VisualizzareFilm() | Servizio che offre la possibilità di visualizzare la pagina di un film
VisualizzareArtista() | Servizio che offre la possibilità di visualizzare la pagina di un artista
VisualizzareGenere() | Servizio che offre la possibilità di visualizzare la pagina di un genere
AggiungereGiudizio() | Servizio che offre la possibilità di aggiungere un giudizio su un film
ModificareGiudizio() | Servizio che offre la possibilità modificare un giudizio, fatto in precedenza, su un film visto
RimuovereGiudizio() | Servizio che offre la possibilità di rimuovere un giudizio su un film
VisualizzareGiudizio() | Servizio che offre la possibilità di visualizzare tutti i propri giudizi
AggiungerePromemoria() | Servizio che offre la possibilità di aggiungere un determinato film tra i promemoria
RimuoverePromemoria() | Servizio che offre la possibilità di rimuovere un promemoria
VisualizzarePromemoria() | Servizio che offre la possibilità di visualizzare tutti i propri promemoria
SuggerimentiAutomaticiFilm() | Servizio che offre la possibilità di farsi suggerire dal sistema dei film in linea con le proprie preferenze
VisualizzareClassificaFilm() | Servizio che offre la possibilità di visualizzare i film nella classifica

## Sottosistema gestione
Sottosistema | Descrizione
-------------|---
Gestione     | Il sottosistema gestione si occupa di fornire tutti i servizi che permettono ad un utente gestore di gestire i dati presenti nel sito

Servizi | Descrizione
--------|---
AggiungiFilm() | Servizio che offre la possibilità di aggiungere un film all'interno del sistema
AggiungiArtista() | Servizio che offre la possibilità di aggiungere un artista all'interno del sistema
AggiungiGenere() | Servizio che offre la possibilità di aggiungere un genere all'interno del sistema
ModificaFilm() | Servizio che offre la possibilità di modificare un film all'interno del sistema
ModificaArtista() | Servizio che offre la possibilità di modificare un artista all'interno del sistema
ModificaGenere() | Servizio che offre la possibilità di modificare un genere all'interno del sistema
RimuoviFilm() | Servizio che offre la possibilità di rimuovere un film all'interno del sistema
RimuoviArtista() | Servizio che offre la possibilità di rimuovere un artista all'interno del sistema
RimuoviGenere() | Servizio che offre la possibilità di rimuovere un genere all'interno del sistema
AggiornareGeneriFilm() | Servizio che offre la possibilità di aggiornare generi di un film all'interno del sistema
AggiornareArtistiFilm() | Servizio che offre la possibilità di aggiornare gli artisti in un film all'interno del sistema
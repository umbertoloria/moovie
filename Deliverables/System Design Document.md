# System Design Document
| Versione | Data       | Descrizione                                                                                | Autori                                     |
|----------|------------| -------------------------------------------------------------------------------------------|--------------------------------------------|
| 0.1      | 19/11/2019 | Prima stesura                                                                              | Michelantonio Panichella, Gianluca Pirone  |
| 0.2      | 26/11/2019 | Mappatura HW/SW, gestione accessi                                                          | Gianluca Pirone                            |
| 0.3      | 28/11/2019 | Descrizione del problema, revisione sottosistemi, condizioni limite e servizi sottosistemi | Michelantonio Panichella                   |
| 0.4      | 29/11/2019 | Definizioni, acronimi, abbreviazioni, riferimenti, panoramica e gestione dati persistenti  | Michelantonio Panichella, Gianluca Pirone  |
| 0.5      | 18/12/2019 | Revisione sottosistemi, revisione diagrammi e revisione tavola degli accessi               | Team                                       |
| 0.6      | 07/01/2020 | Miglioramento sottosistemi, miglioramento tavola degli accessi                             | Gianluca Pirone                            |

# Indice
1. [Introduzione](#introduzione)
    1. [Descrizione del Problema](#-descrizione-del-problema)
    2. [Design Goals](#designgoals)
        1. [Usability](#dg_1_usability)
        2. [Reliability](#dg_2_reliability)
        3. [Performance](#dg_3_performance)
        4. [Supportability](#dg_4_supportability)
    3. [Definizioni, Acronimi e Abbreviazioni](#definizioni-acronimi-e-abbreviazioni)
    4. [Riferimenti](#riferimenti)
    5. [Panoramica](#panoramica)
2. [Architettura del Sistema](#architettura-del-sistema)
    1. [Panoramica](#panoramica)
    2. [Decomposizione in sottosistemi](#decomposizione-in-sottosistemi)
        1. [Decomposizione in macro-sistemi](#decomposizione-in-macro-sistemi)
        2. [Decomposizione in miscro-sistemi](#decomposizione-in-micro-sistemi)
            1. [Ricerca](#ricerca)
                1. [RicercaPresentationLayer](#ricercapresentationlayer)
                2. [RicercaApplicationLayer](#ricercaapplicationlayer)
                3. [RicercaDataLayer](#ricercadatalayer)
            2. [Account](#account)
                1. [AccountPresentationLayer](#accountpresentationlayer)
                2. [AccountApplicationLayer](#accountapplicationlayer)
                3. [AccountDataLayer](#accountdatalayer)
            3. [Film](#film)
                1. [FilmPresentationLayer](#filmpresentationlayer)
                2. [FilmApplicationLayer](#filmapplicationlayer)
                3. [FilmDataLayer](#filmdatalayer)
             4. [Gestione](#gestione)
                1. [GestionePresentationLayer](#gestionepresentationlayer)
                2. [GestioneApplicationLayer](#gestioneapplicationlayer)
                3. [GestioneDataLayer](#gestionedatalayer)
    3. [Mappatura Hardware/Software](#mappatura-hardwaresoftware)
    4. [Gestione dei Dati Persistenti](#gestione-dei-dati-persitenti)
    5. [Gestione degli accessi](#gestione-degli-accessi)
    6. [Condizione limite](#-condizione-limite)
        1. [Inizializzazione](#inizializzazione)
        2. [Terminazione](#terminazione)
        3. [Fallimenti](#fallimenti)
3. [Servizi dei Sottosistemi](#servizi-dei-sottositemi)
    1. [Sottosistema "Ricerca"](#sottosistema-ricerca)
    2. [Sottosistema "Account"](#sottosistema-account)
    3. [Sottosistema "Amicizia"](#sottosistema-amicizia)
    4. [Sottosistema "Film"](#sottosistema-film)
    5. [Sottosistema "Gestione"](#sottosistema-gestione)
4. Glossario

# Introduzione

## Descrizione del problema
La web-Application da noi proposta è stata progettata per poter permettere a chiunque fosse interessato e appassionato
di cinema, di gestire, e non solo, i propri film nella maniera quanto più semplice e divertente possibile.
Moovie infatti offrè la possibilità di trovare al suo interno tantissime informazioni riguardanti il mondo del cinema e
consentirà a tutti gli utenti di avere delle vere e proprie liste di film che potrà condividere con i proprio amici.
L'Obiettivo del sito è quello di facilitare a tutti il reperimento di dati riguardanti il mondo del cinema, fornendo
una piattaforma che sia in grado di condividere informazioni cinematografiche nella quale ogni utente potrà registrarsi
e condividere le sue informazioni e le cose che più gli interessano ai suoi amici.

Tutto ciò verrà offerto attraverso delle funzionalità che il sito offre quali:
* Gestione del proprio Account
* Ricerca di un film, di un attore o di un utente ricevendo informazioni su di esso
* Gestione dele amicizie inviando, ricevendo, accettando o rifiutandone una
* Gestione dei film aggiungendo, modificando o rimuovendo un giudizio su un film

## Design Goals
Il sito Moovie sarà progettato in modo tale da fare avere all'utente una Web-Application di qualità. 
La qualità fornita è visibile all'interno del sistema laddove ci interfacciamo con esso in quanto Moovie dovrà offrire 
u'n interfaccia facile e semplice da ulizzare da parte di tutti gli utenti, dovrà garantire tempi di risposta minima, 
dovrà offrire un servizio di qualitò nel trattamento dei dati, e dovrà essere utlizzabile su diverse piattaforme senza 
avere alcun tipo di problema.

### DG_1_Usability

* 2.1.1 Facilità d'uso: il sito Moovie deve offrire la possibiltà di utilizzare ogni  funzionalità del sito in modo
semplice.
* 2.1.2 L’utente non deve sentirsi smarrito durante l’uso delle interfacce di Moovie. L’utente deve sempre poter
raggiungere la home e login/logout. Il sito si adatterà alle dimensioni del dispositivo su cui si naviga.
Sarà totalmente gratuito.

### DG_2_Reliability

* 2.2.1 Consistenza dei dati: Moovie, attraverso un database Relazionale, garantirà la consistenza dei dati.
* 2.2.2 Persistenza dei dati: Moovie, offre un sistema di memorizzazione dei dati presenti sul sito attraverso un database 
relazionale con il quale sarà possible recuperare informazioni il più veloce e semplice possibile.

### DG_3_Performance

* 2.3.1 Tempo di risposta: Moovie, garantirà un tempo di risposta medio, per ogni tipo di funzionalità, minore di 1s;
* 2.3.2 Scalabilità: Moovie sarà in grado di gestire un numero elevato di utenti contemporaneamente.


### DG_4_Supportability
* 2.4.1 Sarà supportato dai browser Google Chrome, Mozilla Firefox, Safari 

## Definizioni, Acronimi e Abbreviazioni

**Acronimo** | **Descrizione** 
-------- | -------- 
RAD | Requirements Analysis Document
HTTP | HyperText Transfer Protocol 
GUI | Graphic User Interface
DBMS | Database Management System  
DB | DataBase 
PDO | PHP Data Objects

## Riferimenti
 - RAD Moovie v1.0
 - Object-Oriented Software Engineering Using UML, Patterns, and Java™ Third Edition 
 - https://it.wikipedia.org/
 
## Panoramica
Il documento è stato diviso in quattro sezioni fondamentali, ognuna fornita di una breve descrizione.
Queste sono:
 - Introduzione: sezione che vuole illustrare l'ambito che ha portato alla progettazione della web-Application. 
 Vengono forniti e descritti gli obiettivi proposti dal sistema, le varie funzionalità messe a disposizione 
 dei vari utenti e i criteri da rispettare. 
 - Architettura del Sistema: sezione che descrive la decomposizione in macro-sistemi e quella in micro-sistemi, 
 la mappatura Hardware/Software del sistema, la gestione dei dati persistenti, la gestione degli accessi e la condizione
  limite.
 - Servizi dei Sottosistemi: sezione che fornisce informazioni riguardo i servizi forniti da ogni Sottosistema.
 - Glossario: sezione contenente un glossario che raccoglie termini contenuti nel sistema proposto. 

# Architettura del sistema  
## Panoramica
Il sistema sarà contruito seguendo il pattern architetturale MVC (Model Controller View).
In questo pattern le componenti del sistema hanno 3 ruoli principali quali:
- Model permette al nostro sito di accedere, attraverso vari metodi, ai dati del software;
- Controller si occupa di ricevere le azioni dell'utente attreaverso dei metodi con i quali l'utente può modificare lo 
stato delle altre due componenti (Model, View);
- View che si occupati di interfacciare l'utente al sistema visualizzando i dati contenuto all'interno del model;


## Decomposizione in sottosistemi
### Decomposizione in macro-sistemi
La decomposizione in sottosistemi è stata fatta cercando di raggruppare argomenti che sono tra loro quanto più simili 
possibili. Una macro suddivisione del sistema è stata fatta in questo modo:
 - Ricerca;
 - Account;
 - Amicizia;   
 - Film;
 - Gestione;
 
![](Package%20diagrams/Sottosistemi.png)


L'immagine mostrata, rappresenta le varie suddivisioni fatte all'interno del sistema mostrando dunque, per ogni layer, 
i sottosistemi che includono e descrivendo anche le relazioni che ci sono tra i vari layer.


### Decomposizione in micro-sistemi
Per procedere ad uno sviluppo e ad una progettazione semplificata dell'intero sistema si è deciso di suddividere 
i sottosistemi in tre stati:
 - PresentationLayer: Strato che si occupa delle interfaccie grafiche con il quale l'utente dovra interagire;
 - ApplicationLayer: Strato che si occupa di gestire tutte le richieste che l'utente fa attraverso 
 il "PresentationLayer", ricevendo, elaborando e alla fine mostrando graficamente il risultato di un' operazione da lui 
 fatta;
 - Data: Strato che si occupa di gestire i dati del sistema.

#### Ricerca
![](Package%20diagrams/Ricerche.jpeg)

Il sottosistema  "Ricerca" si occupa di gestire le ricerche di tutti gli utenti offrendo diverse funzionalità quali:
 - Ricerca di un film;
 - Ricerca di un artista;	
 - Ricerca di un utente;

#### RicercaPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti le ricerche:
 - GUI - Ricerca di un film: interfacce che offrono all'utente la possibilità di ricercare un film.
 - GUI - Ricerca di un artista: interfacce che offrono all'utente la possibilità di ricercare un artista.
 - GUI - Ricerca di un utente: interfacce che offrono all'utente autenticato la possibilità di ricercare un altro utente.

#### RicercaApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Ricerca" nel 
sistema:
- RicercaFilm(): incoropora operazioni che permettono di ricercare un film ad un utente.
- RicercaArtista(): incoropora operazioni che permettono di ricercare un artista ad un utente.
- RicercaUtente(): incoropora operazioni che permettono di ricercare un altro utente ad un utente autenticato.

#### RicercaDataLayer
Questo livello si occupa di gestire i dati riguardanti le richerche degli utenti all'interno del sistema.

#### Account
![](Package%20diagrams/Account.png)

Il sottosistema "Account" si occupa di gestire tutti gli account del sistema offrendo diverse funzionalità quali:
 - Creare un account
 - Autenticare un account
 - Cambiare password
 - Deautenticare un account
 - Visualizzare un profilo
 - Visualizzare la pagina iniziale


#### AccountPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione 
di un account:
 - GUI - Creare un account: interfacce che offrono all'utente la possibilità di creare il proprio account immettendo 
 le proprie informazioni;
  - GUI - Autenticare un account: interfacce che offrono all'utente la possibilità di potersi autenticare all'interno 
 del sito;
 - GUI - Cambiare password: interfacce che offrono all'utente autenticato la possibilità di accettare le modifiche 
 precedentemente fatte alla password;
 - GUI - Deautentiare un account: interfacce che offrono all'utente autenticato la possibilità di deautenticarsi dal sito;
 - GUI - Visualizzare un profilo: interfacce che offrono all'utente autenticato la possibilità di visulizzare un profilo all'interno del sito;
 - GUI - Visualizzare la pagina iniziale: interfacce che offrono all'utente autenticato la possibilità di visulizzare la pagina iniziale del sito;

#### AccountApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Account" 
nel sistema:
 - CreareAccount(): incorpora operazioni che permettono di creare un nuovo account ad un utente;
 - AutenticareAccount(): incorpora operazioni che permettono ad un utente di autenticarsi all'interno di Moovie;
 - CambiarePassword(): incorpora operazioni che permettono all'utente autenticato di accettare i cambiamenti precedentementi 
 fatti alla propria password;
 - DeautenticareAccount(): incorpora operazioni che permettono all'utente autenticato di deautenticarsi dal sito;
 - VisualizzareProfilo(): incorpora operazioni che permettono all'utente autenticato di visualizzare un profilo all'interno del sito;
 - VisualizzarePaginaIniziale(): incorpora operazioni che permettono all'utente autenticato di visualizzare la pagina iniziale del sito;

#### AccountDataLayer
Questo livello si occupa di gestire i dati riguardanti gli utenti dell'intero sistema.

#### Amicizia
![](Package%20diagrams/Amicizia.png)

Il sottosistema "Amicizia" si occupa di gestire le amicizie tra account offrendo diverse funzionalità quali:
 - Inviare richiesta di amicizia
 - Cancellare richiesta di amicizia
 - Accettare richiesta di amicizia
 - Rifiutare richiesta di amicizia
 - Cancellare amicizia
 - Visualizzare gli amici

 
#### AmiciziaPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti le amicizie:
 - GUI - Inviare richiesta di amicizia: interfacce che offrono all'utente autenticato la possibilità di inviare 
 una richiesta di amicizia ad un altro account;
 - GUI - Cancellare richiesta di amicizia: interfacce che offrono all'utente autenticato la possibilità di cancellare 
 una richiesta di amicizia ad un altro account;
 - GUI - Accettare richiesta di amicizia: interfacce che offrono all'utente autenticato la possibilità di accettare 
 una richiesta di amicizia proveniente da un altro account;
 - GUI - Rifiutare richiesta di amicizia: interfacce che offrono all'utente autenticato la possibilità di rifiutare 
 una richiesta di amicizia proveniente da un altro account;
 - GUI - Cancellare amicizia: interfacce che offrono all'utente autenticato la possibilità di cancellare 
 un'amicizia con un altro account;
 - GUI - Visualizzare gli amici: interfacce che offrono all'utente autenticato la possibilità di visualizzare le amicizie in cui è coinvolto;

#### AmiciziaApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Amicizia" 
nel sistema:
 - InviareRichiestaAmcizia(): incorpora operazioni che permettono all'utente autenticato di richiedere l'amicizia ad un 
 altro utente;
 - CancellareRichiestaAmcizia(): incorpora operazioni che permettono all'utente autenticato di cancellare la richiesta d'amicizia ad un 
  altro utente;
 - AccettareRichiestaAmicizia(): incorpora operazioni che permettono all'utente autenticato di accettare l'amicizia di un 
 altro utente;
 - RifiutareRichiestaAmicizia(): incorpora operazioni che permettono all'utente autenticato di rifiutare l'amicizia di un 
 altro utente;
 - CancellareAmicizia(): incorpora operazioni che permettono all'utente autenticato di cancellare l'amicizia con un 
 altro utente;
 - VisualizzareAmici(): incorpora operazioni che permettono all'utente autenticato di visualizzare le amicizie in cui è coinvolto;

#### AmiciziaDataLayer
Questo livello si occupa di gestire le amicizie degli utenti dell'intero sistema.

#### Film
![](Package%20diagrams/Film.jpeg)

Il sottosistema "Film" si occupa di gestire i giudizi di tutti gli utenti autenticati offrendo diverse funzionalità 
quali:
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
 - Suggerimenti automatici di film:
 - Visualizzare la classifica dei film;

#### FilmPresentationLayer
Questo include al suo interno tutte le componenti dell'interfaccia che offrono operazioni riguardanti "Film" 
nel sistema:
 - GUI - Visualizzare un film:  interfacce che offrono all'utente la possibilità di visualizzare la pagina di un film;
 - GUI - Visualizzare un artista:  interfacce che offrono all'utente la possibilità di visualizzare la pagina di un artista;
 - GUI - Visualizzare un genere:  interfacce che offrono all'utente la possibilità di visualizzare la pagina di un genere;
 - GUI - Aggiungere un giudizio:  interfacce che offrono all'utente autenticato la possibilità di aggiungere un giudizio ad un determinato film;
 - GUI - Modificare un giudizio: interfacce che offrono all'utente autenticato la possibilità di modificare un giudizio ad un determinato film;
 - GUI - Rimuovere un giudizio: interfacce che offrono all'utente autenticato la possibilità di rimuovere un giudizio ad un determinato film;
 - GUI - Visualizzare i giudizi: interfacce che offrono all'utente autenticato la possibilità di visualizzare tutti i suoi giudizi;
 - GUI - Aggiungere un promemoria: interfacce che offrono all'utente autenticato la possibilità di aggiungere un determinato film tra i promemoria;
 - GUI - Rimuovere un promemoria: interfacce che offrono all'utente autenticato la possibilità di rimuovere un promemoria;
 - GUI - Visualizzare i promemoria: interfacce che offrono all'utente autenticato la possibilità di visualizzare tutti i suoi promemoria;
 - GUI - Suggerimenti automatici di film: interfacce che offrono all'utente autenticato la possibilità di farsi suggerire dal sistema dei film in linea con le sue preferenze;
 - GUI - Visualizzare la classifica dei film: interfacce che offrono all'utente autenticato la possibilità di visualizzare i film nella classifica;
 
#### FilmApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Film" al sistema:
- VisualizzareFilm(): incoropora operazioni che permettono all'utente la possibilità di visualizzare la pagina di un film;
- VisualizzareArtista(): incoropora operazioni che permettono all'utente la possibilità di visualizzare la pagina di un artista;
- VisualizzareGenere(): incoropora operazioni che permettono all'utente la possibilità di visualizzare la pagina di un genere;
- AggiungereGiudizio(): incoropora operazioni che permettono all'utente autenticato di aggiungere un giudizio ad un determinato film;
- ModificareGiudizio(): incoropora operazioni che permettono all'utente autenticato di modificare un giudizio ad un determinato film;
- RimuovereGiudizio(): incoropora operazioni che permettono all'utente autenticato di rimuovere un giudizio ad un determinato film;
- VisualizzareGiudizi(): incoropora operazioni che permettono all'utente autenticato di visualizzare tutti i suoi giudizi;
- AggiungerePromemoria(): incoropora operazioni che permettono all'utente autenticato di aggiungere un determinato film tra i promemoria;
- RimuoverePromemoria(): incoropora operazioni che permettono all'utente autenticato di rimuovere un promemoria;
- VisualizzarePromemoria(): incoropora operazioni che permettono all'utente autenticato di visualizzare tutti i suoi promemoria;
- SuggerimentiAutomaticiFilm(): incoropora operazioni che permettono all'utente autenticato di farsi suggerire dal sistema dei film in linea con le sue preferenze;
- VisualizzareClassificaFilm(): incoropora operazioni che permettono all'utente autenticato di visualizzare i film nella classifica;

#### FilmDataLayer
Questo livello si occupa di gestire i dati riguardanti i giudizi sui film  degli utenti autenticati, 
e i suggerimenti automatici all'interno del sistema.

###Gestione 
Il sosttosistema "Gestione" si occupa di gestire i dati presenti nel sito offrendo diverse funzionalità quali:
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
- Aggiornare artisti in un film;

#### GestionePresentationLayer
Questo include al suo interno tutte le componenti dell'interfaccia che offrono operazioni riguardanti la "Gestione" dei dati
nel sistema:
- GUI - Aggiungere un film: interfacce che offrono all'utente gestore la possibilità di aggiungere un film all'interno del sistema;
- GUI - Aggiungere un artista: interfacce che offrono all'utente gestore la possibilità di aggiungere un artista all'interno del sistema;
- GUI - Aggiungere un genere: interfacce che offrono all'utente gestore la possibilità di aggiungere un genere all'interno del  sistema;
- GUI - Modificare un film: interfacce che offrono all'utente gestore la possibilità di modificare un film all'interno del sistema;
- GUI - Modifica un genere: interfacce che offrono all'utente gestore la possibilità di modificare un genere all'interno del sistema;
- GUI - Modificare un artista: interfacce che offrono all'utente gestore la possibilità di modificare un artista all'interno del sistema;
- GUI - Rimuovere un film: interfacce che offrono all'utente gestore la possibilità di rimuovere un film all'interno del sistema;
- GUI - Rimuovere un artista: interfacce che offrono all'utente gestore la possibilità di rimuovere un artista all'interno del sistema;
- GUI - Rimuovere un genere: interfacce che offrono all'utente gestore la possibilità di rimuovere un genere all'interno del sistema;
- GUI - Aggiornare generi di un film: interfacce che offrono all'utente gestore la possibilità di aggiornare generi di un film all'interno del sistema;
- GUI - Aggiornare artisti in un film: interfacce che offrono all'utente gestore la possibilità di aggiornare gli artisti in un film all'interno del sistema;

#### GestioneApplicationLayer
Questo include al suo interno tutte le componenti che offrono le operazioni riguardanti il sottosistema "Gestione" del sistema.
- AggiungereFilm(): incorpora operazioni che permettono ad un utente gestore di aggiungere un film all'interno del sistema;
- AggiungereArtista(): incorpora operazioni che permettono ad un utente gestore di aggiungere un artista all'interno del sistema;
- AggiungereGenere(): incorpora operazioni che permettono ad un utente gestore di aggiungere un gerenere all'interno del sistema;
- ModificareFilm(): incorpora operazioni che permettono ad un utente gestore di modificarei dati di un film all'interno del sistema;
- ModificareArtista(): incorpora operazioni che permettono ad un utente gestore di modificare i dati di un artista all'interno del sistema;
- ModificareGenere(): incorpora operazioni che permettono ad un utente gestore di modificare un genere all'interno del sistema;
- RimuovereFilm(): incorpora operazioni che permettono ad un utente gestore di rimuovere un film all'interno del sistema;
- RimuovereArtista(): incorpora operazioni che permettono ad un utente gestore di rimuovere un artista all'interno del sistema;
- RimuovereGenere(): incorpora operazioni che permettono ad un utente gestore di rimuovere un genere all'interno del sistema;
- AggiornareGeneriFilm(): incorpora operazioni che permettono ad un utente gestore di aggiornare generi di un film all'interno del sistema;
- AggiornareArtistiFilm(): incorpora operazioni che permettono ad un utente gestore di aggiornare gli artisti in un film all'interno del sistema;

#### GestioneDataLayer
Questo livello si occupa di gestire alcuni dati presenti nel sito Moovie, permettendo, ad un utente gestore di gestirli.

## Gestione dei dati persitenti
Il sito Moovie ha al suo interno alcuni dati che devono essere mantenuti affinché il suo funzionamento sia valido. 
La persistenza di questi, è stata scelta di dargliela, memorizzando essi in un database relazionale nel quale i dati persistenti vengono rappresentati attraverso delle tabelle, 
ognuna delle quali è composta da righe (gli elementi, le istanze di ogni dato) e le colonne (attributi, 
descrizioni di ogni istanza di dato).
I dati vengono gestiti attraverso MySQL che è un DBMS (Data Base Management System) che permette di manipolare 
le informazioni che si vogliono controllare sulla base di dati.

![](Database%20Scheme/DataBaseSchema.png)

L'immagine sopra presente, descrive quello che è lo schema dei dati che dovranno essere mantenuti nel nostro database 
in maniera persistente. 

### Struttura Tabelle

#### Tabella generi

| Attributo |    Tipo      | Chiave   |
|-----------|--------------|----------|
| id        | INT          | Primaria |
| nome      | VARCHAR(100) |          | 

#### Tabella film_has_genere

| Attributo |    Tipo    | Chiave                                      |
|-----------|------------|---------------------------------------------|
| film      | INT        | Primaria, Esterna(derivante da films(id))    |
| genere    | INT        | Primaria, Esterna(derivante da generi(id))  |

#### Tabella recitazione
| Attributo   |    Tipo      | Chiave                                      |
|-------------|--------------|---------------------------------------------|
| attore      | INT          | Primaria, Esterna(derivante da artisti(id)) |
| film        | INT          | Primaria, Esterna(derivante da films(id)     |
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
| artista   | INT        | Primaria, Esterna(derivante da artisti(id)) |
| faccia    | MEDIUMBLOB |                                             |

#### Tabella artisti_descrizioni
| Attributo   |    Tipo    | Chiave                                      |
|-------------|------------|---------------------------------------------|
| artista     | INT        | Primaria, Esterna(derivante da artisti(id)) |
| descrizione | TEXT       |                                             |

#### Tabella films_copertine
| Attributo |    Tipo    | Chiave                                   |
|-----------|------------|------------------------------------------|
| film      | INT        | Primaria, Esterna(derivante da films(id)) |
| faccia    | MEDIUMBLOB |                                          |

#### Tabella films_descrizioni
| Attributo   |    Tipo    | Chiave                                   |
|-------------|------------|------------------------------------------|
| film        | INT        | Primaria, Esterna(derivante da films(id)) |
| descrizione | TEXT       |                                          |

#### Tabella giudizi
| Attributo |   Tipo   | Chiave                                     |
|-----------|----------|--------------------------------------------|
| film      | INT      | Primaria, Esterna (derivante da films(id))  |
| utente    | INT      | Primaria, Esterna(derivante da utenti(id)) |
| voto      | INT      |                                            |
| timestamp | DATETIME |                                            |

#### Tabella promemoria
| Attributo |    Tipo    | Chiave                                     |
|-----------|------------|--------------------------------------------|
| film      | INT        | Primaria, Esterna (derivante da films(id))  |
| utente    | INT        | Primaria, Esterna(derivante da utenti(id)) |
| timestamp | DATETIME   |                                            |

#### Tabella amicizie
| Attributo         |    Tipo    | Chiave                                     |
|-------------------|------------|--------------------------------------------|
| mittente          | INT        |Primaria, Esterna (derivante da utenti(id)) |
| destinatario      | INT        |Primaria, Esterna (derivante da utenti(id)) |
| momento_richiesta | DATETIME   |                                            |


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
| film       | INT        | Primaria, Esterna(derivante da films(id))    |
| regista    | INT        | Primaria, Esterna(derivante da artisti(id)) |


## Gestione degli Accessi
Moovie prevede differenti tipologie di utenza, ognuna delle quali può usufruire di varie funzionalità, 
a seconda del tipo di oggetto con cui interagiscono.

Si è scelto di utilizzare una matrice per documentare i diritti di accesso per ogni attore.
La matrice suddivide la tipologia di attore per colonna, la tipologia di oggetto a cui si accede per riga, 
e per ogni interazione tra questi è presente l'insieme di operazioni disponibli. 

**Attori / Macro-sistemi** | **Utente** | **Utente Autenticato** | **Gestore**
-------- | --------| ----- | ---- 
Ricerca| RicercaFilm()<br/>RicercaArtista() | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente() | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente()
Account | CreareAccount()<br/>AutenticareAccount() | CambiarePassword()<br/>DeautenticareAccount()<br/>VisualizzareProfilo()<br/>VisualizzarePaginaIniziale() | CambiarePassword()<br/>DeautenticareAccount()<br/>VisualizzareProfilo()<br/>VisualizzarePaginaIniziale()  
Amicizia | | InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia()<br/>VisualizzareAmici() | InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia()<br/>VisualizzareAmici() 
Film | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/> | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>VisualizzareGiudizi()<br/>AggiungerePromemoria()<br/>RimuoverePromemoria()<br/>VisualizzarePromemoria()<br/>SuggerimentiAutomaticiFilm()<br/>VisualizzareClassificaFilm()<br/> | VisualizzareFilm()<br/>VisualizzareArtista()<br/>VisualizzareGenere()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>VisualizzareGiudizi()<br/>AggiungerePromemoria()<br/>RimuoverePromemoria()<br/>VisualizzarePromemoria()<br/>SuggerimentiAutomaticiFilm()<br/>VisualizzareClassificaFilm()<br/> 
Gestione | | | AggiungereFilm()<br/>AggiungereArtista()<br/>AggiungereGenere()<br/>ModificareFilm()<br/>ModificareArtista()<br/>ModificareGenere()<br/>RimuovereFilm()<br/>RimuovereArtista()<br/>RimuovereGenere()<br/>AggiornareGeneriFilm()<br/>AggiornareArtistiFilm()


## Condizione Limite

### Inizializzazione
Allo start-up del sistema è necessario l'avvio di un Web-Server Apache, il quale, attraverso MySQL acquisirà 
le informazioni necessarie all'interno del database per permettere all'utente la viusualizzazione della HomePage.
Ritrovandosi su questa, l'utente avrà la possibilità di usufrurire di tutte le funzionalità che Moovie offre.

### Terminazione
In fase di terminazione del sistema sarà garantita una corretta persistenza dei dati annullando le eventuali operazioni 
in esecuzione. Inoltre ogni sottosistema cesserà di operare correttamente.

### Fallimenti
In caso di errore o fallimento del sistema o dei suoi sottosistemi, Moovie garantirà di tornare ad una condizione 
precedente di funzionamento ottimale

# Servizi dei Sottositemi
Il sito Moovie per semplicità è stato decomposto in sottositemi e per ognuno di questi sono previste delle operazioni 
che sono i servizi che la web-application offre.

## Sottosistema "Ricerca"
Sottosistema | Descrizione 
---|---
Ricerche | Il sottosistema "Ricerca" si occupa di fornire tutti i servizi che offrono la possibilità di effettuare delle ricerche e ricevere delle informazioni sul sito 

Servizi | Descrizione 
---|---
RicercaFilm() | Servizio che offre la possibilità di ricercare un film all'interno di Moovie 
RicercaArtista() | Servizio che offre la possibilità di ricercare un determinato artista all'interno di Moovie 
RicercaUtente() | Servizio che offre la possibilità di ricercare un utente all'interno di Moovie 

## Sottosistema "Account"
Sottosistema | Descrizione
---|---
Account | Il sottosistema "Account" si occupa di fornire tutti i servizi che permettono ad un utente di gestire il proprio account

Servizi | Descrizione
---|---
CreareAccount() | Servizio che offre la possibilità di creare un account ad un utente che non ne posside uno
AutenticareAccount() | Servizio che permette ad un utente di autenticarsi all'interno del sito
CambiarePassword() | Servizio che permette ad un utente di effettuare il cambio password
DeautenticareAccount() | Servizio che permette ad un utente di deautenticarsi dal sito
VisualizzareProfilo() | Servizio che permette ad un utente di visualizzare un profilo all'interno del sito
VisualizzarePaginaIniziale() | Servizio che permette ad un utente di visualizzare la pagina iniziale del sito


## Sottosistema "Amicizia"
Sottosistema | Descrizione 
---|---
Amicizie | Il sosttosistema "Amicizia" si occupa di fornire tuttti i servizi che permettono ad un utente di gestire le proprie amicizie presenti su Moovie 

Servizi | Descrizione 
---|---
InviareRichiestaAmicizia() | Servizio che offre la possibilità di richiedere, ad un altro utente registrato sul sito, la sua amicizia
CancellareRichiestaAmicizia() | Servizio che offre la possibilità di cancellare la richiesta di amicizia ad un altro utente registrato sul sito
AccettareRichiestaAmicizia() | Servizio che offre la possibilità di confermare una amicizia ricevuta da parte di un altro utente 
RifiutareRichiestaAmicizia() | Servizio che permette ad un utente di rifiutare una richiesta di amicizia ricevuta da parte di un altro utente
CancellareAmicizia() | Servizio che permette ad un utente di cancellare l'amicizia con un altro utente
VisualizzareAmici() | Servizio che permette ad un utente di visualizzare tutte le amicizie 

## Sottosistema "Film"
Sottosistema | Descrizione 
---|---
FIlm | Il sottosistema "Film" si occupa di fornire tutti i servizi che permettono ad un utente di gestire i giudizi riguardanti i film e di farsi suggerire dei film dal sistema 

Servizi | Descrizione
---|---
VisualizzareFilm() | Servizio che offre la possibilità di visualizzare la pagina di un film
VisualizzareArtista() | Servizio che offre la possibilità di visualizzare la pagina di un artista
VisualizzareGenere() | Servizio che offre la possibilità di visualizzare la pagina di un genere 
ModificareGiudizio() | Servizio che offre la possibilità modificare un giudizio, fatto in precedenza, su un film visto 
RimuovereGiudizio() | Servizio che offre la possibilità di rimuovere un giudizio su un film
VisualizzareGiudizi() | Servizio che offre la possibilità di visualizzare tutti i propri giudizi
AggiungerePromemoria() | Servizio che offre la possibilità di aggiungere un determinato film tra i promemoria
RimuoverePromemoria() | Servizio che offre la possibilità di rimuovere un promemoria
VisualizzarePromemoria() | Servizio che offre la possibilità di visualizzare tutti i propri promemoria
SuggerimentiAutomaticiFilm() | Servizio che offre la possibilità di farsi suggerire dal sistema dei film in linea con le proprie preferenze
VisualizzareClassificaFilm() | Servizio che offre la possibilità di visualizzare i film nella classifica

## Sottosistema "Gestione"
Sottosistema | Descrizione 
---|---
Gestione| Il sottosistema "Gestione" si occupa di fornire tutti i servizi che permettono ad un utente gestore di gestire i dati presenti nel sito

Servizi | Descrizione
---|---
AggiungereFilm() | Servizio che offre la possibilità di aggiungere un film all'interno del sistema
AggiungereArtista() | Servizio che offre la possibilità di aggiungere un artista all'interno del sistema
AggiungereGenere() | Servizio che offre la possibilità di aggiungere un genere all'interno del sistema
ModificareFilm() | Servizio che offre la possibilità di modificare un film all'interno del sistema
ModificareArtista() | Servizio che offre la possibilità di modificare un artista all'interno del sistema
ModificareGenere() | Servizio che offre la possibilità di modificare un genere all'interno del sistema
RimuovereFilm() | Servizio che offre la possibilità di rimuovere un film all'interno del sistema
RimuovereArtista() | Servizio che offre la possibilità di rimuovere un artista all'interno del sistema
RimuovereGenere() | Servizio che offre la possibilità di rimuovere un genere all'interno del sistema
AggiornareGeneriFilm() | Servizio che offre la possibilità di aggiornare generi di un film all'interno del sistema
AggiornareArtistiFilm() | Servizio che offre la possibilità di aggiornare gli artisti in un film all'interno del sistema

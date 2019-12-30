# System Design Document
| Versione | Data       | Descrizione                                                                                | Autori                                     |
|----------|------------| -------------------------------------------------------------------------------------------|--------------------------------------------|
| 0.1      | 19/11/2019 | Prima stesura                                                                              | Michelantonio Panichella, Gianluca Pirone  |
| 0.2      | 26/11/2019 | Mappatura HW/SW, gestione accessi                                                          | Gianluca Pirone                            |
| 0.3      | 28/11/2019 | Descrizione del problema, revisione sottosistemi, condizioni limite e servizi sottosistemi | Michelantonio Panichella                   |
| 0.4      | 29/11/2019 | Definizioni, acronimi, abbreviazioni, riferimenti, panoramica e gestione dati persistenti  | Michelantonio Panichella, Gianluca Pirone  |
| 0.5      | 18/12/2019 | Revisione sottosistemi, revisione diagrammi e revisione tavola degli accessi               | Team                                       |

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
            1. [Ricerche](#ricerche)
                1. [RicerchePresentationLayer](#ricerchepresentationlayer)
                2. [RicercheApplicationLayer](#ricercheapplicationlayer)
                3. [RicercheDataLayer](#ricerchedatalayer)
            2. [Accounts](#accounts)
                1. [AccountsPresentationLayer](#accountspresentationlayer)
                2. [AccountsApplicationLayer](#accountsapplicationlayer)
                3. [AccountsDataLayer](#accountsdatalayer)
            3. [Film](#film)
                1. [FilmPresentationLayer](#filmpresentationlayer)
                2. [FilmApplicationLayer](#filmapplicationlayer)
                3. [FilmDataLayer](#filmdatalayer)
    3. [Mappatura Hardware/Software](#mappatura-hardwaresoftware)
    4. [Gestione dei Dati Persistenti](#gestione-dei-dati-persitenti)
    5. [Gestione degli accessi](#gestione-degli-accessi)
    6. [Condizione limite](#-condizione-limite)
        1. [Inizializzazione](#inizializzazione)
        2. [Terminazione](#terminazione)
        3. [Fallimenti](#fallimenti)
3. [Servizi dei Sottosistemi](#servizi-dei-sottositemi)
    1. [Sottosistema "Ricerche"](#sottosistema-ricerche)
    2. [Sottosistema "Accounts"](#sottosistema-accounts)
    3. [Sottosistema "Amicizie"](#sottosistema-amicizie)
    4. [Sottosistema "Film"](#sottosistema-film)
    5. [Sottosistema "Liste"](#sottosistema-liste)
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
* Gestione delle liste creando, modificando, o rimuovendo delle liste
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
 - RAD Moovie v0.9
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
 - Ricerche;
 - Accounts;
 - Amicizie;   
 - Film;
 - Liste;

![](Package%20diagrams/Macro%20decomposizione.png)


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

#### Ricerche
![](Package%20diagrams/Ricerche.jpeg)

Il sottosistema  "Ricerche" si occupa di gestire le ricerche di tutti gli utenti offrendo diverse funzionalità quali:
 - Ricerca di un film;
 - Ricerca di un artista;	
 - Ricerca di un utente;

#### RicerchePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti le ricerche:
 - GUI - Ricerca di un film: interfacce che offrono all'utente la possibilità di ricercare un film.
 - GUI - Ricerca di un artista: interfacce che offrono all'utente la possibilità di ricercare un artista.
 - GUI - Ricerca di un utente: interfacce che offrono all'utente autenticato la possibilità di ricercare un altro utente.

#### RicercheApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Ricerche" nel 
sistema:
- RicercaFilm(): incoropora operazioni che permettono di ricercare un film ad un utente.
- RicercaArtista(): incoropora operazioni che permettono di ricercare un artista ad un utente.
- RicercaUtente(): incoropora operazioni che permettono di ricercare un altro utente ad un utente autenticato.

#### RicercheDataLayer
Questo livello si occupa di gestire i dati riguardanti le richerche degli utenti all'interno del sistema.

#### Accounts
![](Package%20diagrams/Account.png)

Il sottosistema "Accounts" si occupa di gestire tutti gli account del sistema offrendo diverse funzionalità quali:
 - Creare un account
 - Autenticare un account
 - Cambiare password


#### AccountsPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione 
di un account:
 - GUI - Creare un account: interfacce che offrono all'utente la possibilità di creare il proprio account immettendo 
 le proprie informazioni;
  - GUI - Autenticare un account: interfacce che offrono all'utente la possibilità di potersi autenticare all'interno 
 del sito;
 - GUI - Cambiare password: interfacce che offrono all'utente la possibilità di accettare le modifiche 
 precedentemente fatte alla password;

#### AccountsApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Accounts" 
nel sistema:
 - CreareAccount(): incorpora operazioni che permettono di creare un nuovo account ad un utente;
 - AutenticareAccount(): incorpora operazioni che permettono ad un utente di autenticarsi all'interno di Moovie;
 - CambiarePassword(): incorpora operazioni che permettono all'utente di accettare i cambiamenti precedentementi 
 fatti alla propria password;

#### AccountsDataLayer
Questo livello si occupa di gestire i dati riguardanti gli utenti dell'intero sistema.

#### Amicizie
![](Package diagrams/Amicizia.png)

Il sottosistema "Amicizie" si occupa di gestire le amicizie tra account offrendo diverse funzionalità quali:
 - Inviare richiesta di amicizia
 - Cancellare richiesta di amicizia
 - Accettare richiesta di amicizia
 - Rifiutare richiesta di amicizia
 - Cancellare amicizia

 
#### AmiciziePresentationLayer
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

#### AmicizieApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Amicizie" 
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

#### AmicizieDataLayer
Questo livello si occupa di gestire le amicizie degli utenti dell'intero sistema.

#### Film
![](Package%20diagrams/Film.jpeg)

Il sottosistema "Film" si occupa di gestire i giudizi di tutti gli utenti autenticati offrendo diverse funzionalità 
quali:
 - Aggiungere un giudizio;	
 - Modificare un giudizio;
 - Rimuovere un giudizio;
 - Suggerimento automatico di un film:

#### FilmPresentationLayer
Questo include al suo interno tutte le componenti dell'interfaccia che offrono operazioni riguardanti "Film" 
nel sistema:
 - GUI - Aggiungere un giudizio:  interfacce che offrono all'utente autenticato la possibilità di aggiungere un giudizio 
 su un film aggiungendolo in "Film guardati".
 - GUI - Modificare giudizio: interfacce che offrono all'utente autenticato la possibilità di modificare un giudizio su 
 un film.
 - GUI - Rimuovere giudizio: interfacce che offrono all'utente autenticato la possibilità di rimuovere un giudizio su un 
 film rimuovendolo da "Film guardati".
 - GUI - Suggerimento automatico di un film: interfacce che offrono all'utente autenticato la possibilità 
 di farsi suggerire dal sistema un film in linea con i suoi gusti.
#### FilmApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema "Film" al sistema:
- AggiungereGiudizio(): incoropora operazioni che permettono di aggiungere un giudizio su un film, 
aggiungendolo in "Film guardati", ad un utente autenticato.
- ModificareGiudizio(): incoropora operazioni che permettono di modificare un giudizio su un film ad 
un utente autenticato.
- RimuovereGiudizio(): incoropora operazioni che permettono di rimuovere un giudizio su un film, 
rimuovendolo da "Film guardati", ad un utente autenticato.
- SuggerimentoAutomatico(): incoropora operazioni che permettono di farsi suggerire un film dal sistema ad 
un utente autenticato.

#### FilmDataLayer
Questo livello si occupa di gestire i dati riguardanti i giudizi sui film  degli utenti autenticati, 
e il suggerimento automatico all'interno del sistema.

## Gestione dei dati persitenti
Il sito Moovie ha al suo interno alcuni dati che devono essere mantenuti affinché il suo funzionamento sia valido. 
La persistenza di questi, è stata scelta di dargliela, memorizzando
essi in un database relazionale nel quale i dati persistenti vengono rappresentati attraverso delle tabelle, 
ognuna delle quali è composta da righe (gli elementi, le istanze di ogni dato) e le colonne (attributi, 
descrizioni di ogni istanza di dato).
I dati vengono gestiti attraverso MySQL che è un DBMS (Data Base ManagEment System) che permette di manipolare 
le informazioni che si vogliono controllare sulla base di dati.

![](Database%20Scheme/DatabaseSchema.png)

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
Ricerche | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente() | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente() | RicercaFilm()<br/>RicercaArtista()<br/>RicercaUtente()
Accounts | CreareAccount()<br/>AutenticareAccount() | CambiarePassword()<br/> | CambiarePassword()<br/>  
Amicizie | | InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia()| InviareRichiestaAmicizia()<br/>CancellareRichiestaAmicizia()<br/>AccettareRichiestaAmicizia()<br/>RifiutareRichiestaAmicizia()<br/>CancellareAmicizia() 
Film | | AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>SuggerimentoAutomatico()<br/> | AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>SuggerimentoAutomatico()<br/>


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

## Sottosistema "Ricerche"
Sottosistema | Descrizione 
---|---
Ricerche | Il sottosistema "Ricerche" si occupa di fornire tutti i servizi che offrono la possibilità di effettuare delle ricerche e ricevere delle informazioni sul sito 

Servizi | Descrizione 
---|---
RicercaFilm() | Servizio che offre la possibilità di ricercare un film all'interno di Moovie 
RicercaArtista() | Servizio che offre la possibilità di ricercare un determinato artista all'interno di Moovie 
RicercaUtente() | Servizio che offre la possibilità di ricercare un utente all'interno di Moovie 

## Sottosistema "Accounts"
Sottosistema | Descrizione
---|---
Accounts | Il sottosistema "Accounts" si occupa di fornire tutti i servizi che permettono ad un utente di gestire il proprio account

Servizi | Descrizione
---|---
CreareAccount() | Servizio che offre la possibilità di creare un account ad un utente che non ne posside uno
AutenticareAccount() | Servizio che permette ad un utente di autenticarsi all'interno del sito
CambiarePassword() | Servizio che permette ad un utente di effettuare il cambio password

## Sottosistema "Amicizie"
Sottosistema | Descrizione 
---|---
Amicizie | Il sosttosistema "Amicizie" si occupa di fornire tuttti i servizi che permettono ad un utente di gestire le proprie amicizie presenti su Moovie 

Servizi | Descrizione 
---|---
InviareRichiestaAmicizia() | Servizio che offre la possibilità di richiedere, ad un altro utente registrato sul sito, la sua amicizia
CancellareRichiestaAmicizia() | Servizio che offre la possibilità di cancellare la richiesta di amicizia ad un altro utente registrato sul sito
AccettareRichiestaAmicizia() | Servizio che offre la possibilità di confermare una amicizia ricevuta da parte di un altro utente 
RifiutareRichiestaAmicizia() | Servizio che permette ad un utente di rifiutare una richiesta di amicizia ricevuta da parte di un altro utente
CancellareAmicizia() | Servizio che permette ad un utente di cancellare l'amicizia con un altro utente 

## Sottosistema "Film"
Sottosistema | Descrizione 
---|---
FIlm | Il sottosistema "Film" si occupa di fornire tutti i servizi che permettono ad un utente di gestire i giudizi riguardanti i film e di farsi suggerire dei film dal sistema 

Servizi | Descrizione
---|---
AggiungereGiudizio() | Servizio che offre la possibilità di aggiungere un giudizio su un film che l'utente ha visto 
ModificareGiudizio() | Servizio che offre la possibilità modificare un giudizio, fatto in precedenza, su un film visto 
RimuovereGiudizio() | Servizio che offre la possibilità di rimuovere un giudizio su un film 

# System Design Document
| Versione |    Data    | Descrizione                  | Autori                   |
| :------: | :--------: | :------------------------:   | :----------------------: |
| 0.1      | 19/11/2019 | Prima stesura                | Michelantonio Panichella, Gianluca Pirone  |
| 0.2      | 26/11/2019 | Mappatura HW/SW, Gestione Accessi | Gianluca Pirone  |
| 0.3      | 28/11/2019 | Descrizione del problema | Michelantonio Panichella  |
| 0.4      | 28/11/2019 | Revisione sottositemi | Michelantonio Panichella, Gianluca Pirone  |

1. [Introduzione](#introduzione)
    1. [Descrizione del Problema](#-descrizione-del-problema)
    2. [Design Goals](#designgoals)
        1. [Usability](#dg_1_usability)
        2. [Reliability](#dg_2_reliability)
        3. [Performance](#dg_3_performance)
        4. [Supportability](#dg_4_supportability)
    3. Definizioni,Acronimi e Abbreviazioni
    4. Riferimenti
    5. Panoramica
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
            4. [Liste](#liste)
                1. [ListePresentationLayer](#listepresentationlayer)
                2. [ListeApplicationLayer](#listeapplicationlayer)
                3. [ListeDataLayer](#listedatalayer)
    3. [Mappatura Hardware/Software](#mappatura-hardwaresoftware)
    4. Gestione dei Dati Persistenti
    5. [Gestione degli accessi](#gestione-degli-accessi)
    6. Condizione limite
3. Servizi dei Sottosistemi
4. Glossario

# Introduzione

## Descrizione del problema
-------------
La web-Application da noi proposta è stata progettata per poter permettere a chiunque fosse interessato e appassionato di cinema, di gestire, e non solo, i propri film nella maniera quanto più semplice e divertente possibile.
Moovie infatti offrè la possibilità di trovare al suo interno tantissime informazioni riguardanti il mondo del cinema e consentirà a tutti gli utenti di avere delle vere e proprie liste di film che potrà condividere con i proprio amici.
L'Obiettivo del sito è quello di facilitare a tutti il reperimento di dati riguardanti il mondo del cinema, fornendo una piattaforma che sia in grado di condividere informazioni cinematografiche nella quale ogni utente potrà registrarsi e condividere le sue informazioni e le cose che più gli interessano ai suoi amici.
Tutto ciò verrà offerto attraverso delle funzionalità che il sito offre quali:

 - Gestione del proprio Account
 
 - Ricerca di un film, di un attore o di un utente ricevendo informazioni su di esso

 - Gestione dele amicizie inviando, ricevendo, accettando o rifiutandone una
 
 - Gestione delle liste creando, modificando, o rimuovendo delle liste
 
 - Gestione dei film aggiungendo, modificando o rimuovendo un giudizio su un film
    

##  DesignGoals
---------------
Il sito Moovie sarà progettato in modo tale da offrire all'utente, attraverso una grafica  composta da bottoni, finestre di dialogo ed icone, una navigazione e fruizione delle funzionalità nel modo più intuitivo e semplice possibile. Gli Utenti, anche coloro che hanno scarse conoscenze del sistema, saranno in grado di muoversi all'interno della Web-Application e operare in maniera lampante

//Il sito Moovie sarà progettato in modo tale da fare avere all'utente una Web-Application di qualità. La qualità fornita è visibile all'interno del sistema laddove ci interfacciamo con esso in quanto Moovie dovrà offrire un interfaccia facile e semplice da ulizzare da parte di tutti gli utenti, laddove eseguiamo delle funzionalità in quanto Moovie dovrà garantire tempi di risposta minima, nel trattamento dei dati, nell'uso del sistema su diverse piattaforme senza avere problemi di "adattabilità" e 

### DG_1_Usability

2.1.1 Facilità d'uso : Il sito Moovie deve offrire la possibiltà di utilizzare ogni  funzionalità del sito in modo semplice.
2.1.2 
L’utente non deve sentirsi smarrito durante l’uso delle interfacce di Moovie. L’utente deve sempre poter raggiungere la home e login/logout
Il sito si adatterà alle dimensioni del dispositivo su cui si naviga
Sarà totalmente gratuito

### DG_2_Reliability

2.2.1 Consistenza dei dati: Moovie, attraverso un database Relazionale, garantirà la consistenza dei dati.
2.2.2 Persistenza dei dati: Moovie, offre un sistema di memorizzazione dei dati presenti sul sito attraverso un database relazionale con il quale sarà possible recuperare informazioni il più veloce e semplice possibile.

### DG_3_Performance

2.3.1 Tempo di risposta: Moovie, garantirà un tempo di risposta medio, per ogni tipo di funzionalità, minore di 1s;
2.3.2 Scalabilità: Moovie sarà in grado di gestire un numero elevato di utenti contemporaneamente.


### DG_4_Supportability
2.4.1 Sarà supportato dai browser Google Chrome, Mozilla Firefox, Safari 

Vincoli (pseudo requisiti)

    Il sito prevede l’utilizzo delle seguenti tecnologie: Apache, MySQL, PHP
    
# Architettura del sistema  
## Panoramica
Il sistema saraà contruito seguendo il pattern architetturale MVC (Model Controller View).
In questo pattern le componenti del sistema hanno 3 ruoli principali quali:
- Model permette al nostro sito di accedere, attraverso vari metodi, ai dati del software;
- Controller si occupa di ricevere le azioni dell'utente attreaverso dei metodi con i quali l'utente può modificare lo stato delle altre due componenti (Model, View);
- View che si occupati di interfacciare l'utente al sistema visualizzando i dati contenuto all'interno del model;


## Decomposizione in sottosistemi
### Decomposizione in macro-sistemi
La decomposizione in sosttositemi è stata fatta cercando di raggruppare argomenti che sono tra loro quanto più simili possibili. Una macro suddivisione del sistema è stata fatta in questo modo:
 - Ricerche;
 - Accounts;
 - Amicizie;   
 - Film;
 - Liste;









L'immagine mostrata, rappresenta le varie suddivisioni fatte all'interno del sistema mostrando dunque, per ogni layer, i sottosistemi che includono e descrivendo anche le relazioni che ci sono tra i vari layer.


### Decomposizione in micro-sistemi
Per procedere ad uno sviluppo e ad una progettazione semplificata dell'intero sistema si è deciso di suddividere i sottosistemi in tre stati:
 - PresentationLayer: Strato che si occupa delle interfaccie grafiche con il quale l'utente dovra interagire;
 - ApplicationLayer: Strato che si occupa di gestire tutte le richieste che l'utente fa attraverso il "PresentationLayaer", ricevendo, elaborando e alla fine mostrando graficamente il risultato di un' operazione da lui fatta;
 - Storage: Strato che si occupa di gestire i dati del sistema.

#### Ricerche
Il sottosistema di "Ricerche" si occupa di gestire le ricerche di tutti gli utenti offrendo diverse funzionalità quali:
 - Ricerca di un film;
 - Ricerca di un artista;	
 - Ricerca di un utente;

#### RicerchePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti le ricerche:
 - GUI - Ricerca di un film: interfacce che offrono all'utente la possibilità di ricercare un film.
 - GUI - Ricerca di un artista: interfacce che offrono all'utente la possibilità di ricercare un artista.
 - GUI - Ricerca di un utente: interfacce che offrono all'utente autenticato la possibilità di ricercare un altro utente.

#### RicercheApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema di "Ricerche" nel sistema:
- RicercaFilm(): incoropora operazioni che permettono di ricercare un film ad un utente.
- RicercaArtista(): incoropora operazioni che permettono di ricercare un artista ad un utente.
- RicercaUtente(): incoropora operazioni che permettono di ricercare un altro utente ad un utente autenticato.

#### RicercheDataLayer
Questo livello si occupa di gestire i dati riguardanti le richerche degli utenti all'interno del sistema.

#### Accounts
Il sottosistema di "Accounts" si occupa di gestire tutti gli account del sistema offrendo diverse funzionalità quali:
 - Creare un account
 - Attivare un account 
 - Autenticare un account
 - Richiesta di cambio password
 - Conferma di cambio password


#### AccountsPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione di un account:
 - GUI - Creare un account: interfacce che offrono all'utente la possibilità di creare il proprio account immettendo le proprie informazioni;
 - GUI - Attivare un account: interfacce che offrono all'utente la possibilità di attivare l'account che prima ha creato;
 - GUI - Autenticare un account: interfacce che offrono all'utente la possibilità di potersi autenticare all'interno del sito;
 - GUI - Richiesta di cambio password: interfacce che offrono all'utente la possibilità di cambiare la password del proprio account;
 - GUI - Conferma di cambio password: interfacce che offrono all'utente la possibilità di accettare le modifiche precedentemente fatte alla password;

#### AccountsApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema di "Accounts" nel sistema:
 - CreareAccount(): incorpora operazioni che permettono di creare un nuovo account ad un utente;
 - AttivareAccount(): incorpora operazioni che permettono all'utente di accettare la creazione dell'account e successivamente l'effettiva creazione di esso all'interno del sistema;
 - AutenticareAccount(): incorpora operazioni che permettono ad un utente di autenticarsi all'interno di Moovie;
 - RichiestaCambioPassoword: incorpora operazioni che permettono all'utente di modificare la propria password;
 - ConfermaCambioPassword(): incorpora operazioni che permettono all'utente di accettare i cambiamenti precedentementi fatti alla propria password;

#### AccountsDataLayer
Questo livello si occupa di gestire i dati riguardanti gli utenti dell'intero sistema.

#### Amicizie
Il sottosistema di "Amicizie" si occupa di gestire le amicizie tra account offrendo diverse funzionalità quali:
 - Richiedere amicizia tra due account
 - Confermare amicizia tra due account
 - Rifiutare amicizia tra due account
 - Suggerire un film a un account amico
 
#### AmiciziePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti le amicizie:
 - GUI - Richiedere amicizia tra due account: interfacce che offrono all'utente autenticato la possibilità di inviare una richiesta di amicizia ad un altro account;
 - GUI - Confermare amicizia tra due account: interfacce che offrono all'utente autenticato la possibilità di confermare una richiesta di amicizia proveniente da un altro account;
 - GUI - Rifiutare amicizia tra due account: interfacce che offrono all'utente autenticato la possibilità di rifiutare una richiesta di amicizia proveniente da un altro account;
 - GUI - Suggerire un film a un account amico: interfacce che offrono all'utente autenticato la possibilità di suggerire un film ad un account amico;

#### AmicizieApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema di "Amicizie" nel sistema:
 - RichiestaAmciziaAccount(): incorpora operazioni che permettono all'utente autenticato di richiedere l'amicizia ad un altro utente;
 - ConfermaAmiciziaAccount(): incorpora operazioni che permettono all'utente autenticato di accettare l'amicizia di un altro utente;
 - RifiutaAmiciziaAccount() (): incorpora operazioni che permettono all'utente autenticato di rifiutare l'amicizia di un altro utente;
 - SuggerisciFilmAccountAmico(): incorpora operazioni che permettono all'utente autenticato di suggerire un film ad un utente amico;

#### AmicizieDataLayer
Questo livello si occupa di gestire le amicizie degli utenti dell'intero sistema.

#### Film
Il sottosistema di "Film" si occupa di gestire i giudizi di tutti gli utenti autenticati offrendo diverse funzionalità quali:
 - Aggiungere un giudizio;	
 - Modificare un giudizio;
 - Rimuovere un giudizio;
 - Suggerimento automatico di un film:

#### FilmPresentationLayer
Questo include al suo interno tutte le componenti dell'interfaccia che offrono operazioni riguardanti "Film" nel sistema:
 - GUI - Aggiungere un giudizio:  interfacce che offrono all'utente autenticato la possibilità di aggiungere un giudizio su un film aggiungendolo in "Film guardati".
 - GUI - Modificare giudizio: interfacce che offrono all'utente autenticato la possibilità di modificare un giudizio su un film.
 - GUI - Rimuovere giudizio: interfacce che offrono all'utente autenticato la possibilità di rimuovere un giudizio su un film rimuovendolo da "Film guardati".
 - GUI - Suggerimento automatico di un film: interfacce che offrono all'utente autenticato la possibilità di farsi suggerire dal sistema un film in linea con i suoi gusti.
#### FilmApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazioni rigurdanti il sottosistema di "Film" al sistema:
- AggiungereGiudizio(): incoropora operazioni che permettono di aggiungere un giudizio su un film, aggiungendolo in "Film guardati", ad un utente autenticato.
- ModificareGiudizio(): incoropora operazioni che permettono di modificare un giudizio su un film ad un utente autenticato.
- RimuovereGiudizio(): incoropora operazioni che permettono di rimuovere un giudizio su un film, rimuovendolo da "Film guardati", ad un utente autenticato.
- SuggerimentoAutomatico(): incoropora operazioni che permettono di farsi suggerire un film dal sistema ad un utente autenticato.

#### FilmDataLayer
Questo livello si occupa di gestire i dati riguardanti i giudizi sui film  degli utenti autenticati, e il suggerimento automatico all'interno del sistema.

#### Liste
Il sottosistema di "Liste" si occupa di gestire le liste del sistema offrendo diverse funzionalità quali: 
 - Creare una lista
 - Modificare una lista
 - Eliminare una lista
 - Aggiornare la presenza di film nelle liste
 - Seguire liste altrui

#### ListePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione delle liste:
 - GUI - Creare una lista: interfacce che offrono la possibilità all'utente autenticato di creare una propria lista;
 - GUI - Modificare una lista: interfacce che offrono all'utente autenticato la possibilità di modificare una lista(cambio nome e privilegi);
 - GUI - Eliminare una lista: interfacce che offrono all'utente autenticato la possibilità di eliminare una lista da lui creata all'interno del sito;
 - GUI - Aggiornare la presenza di film nelle liste: interfacce che offrono la possibilità all'utente autenticato di aggiungere o di rimuovere, da una lista ove lui possiede i privilegi, film;
 - GUI - Seguire liste altrui: interfacce che offrono la possibilità all'utente autenticato di seguire lite di altri amici;

#### ListeApplicationLayer
Questo livello include tutte le componenti che offronto operazioni riguardanti il sottosistema di "Liste" nel sistema:
 - CreareLista(): incorpora operazioni che permettono ad un utente autenticato di creare una lista;
 - ModificareLista(): incorpora operazioni che permettono ad un utente autenticato di modificare una lista;
 - EliminareLista(): incorpora operazioni che permettono ad un utente autenticato di eliminare una lista all'interno del sito;
 - AggiornarePresenzaFilm(): incorpora operazioni che permettono ad un utente autenticato di aggiungere o rimuovere un film da una lista;
 - SeguireListeAltrui(): incorpora operazioni che permettono ad un utente autenticato di seguire liste di altri utenti.

#### ListeDataLayer
Questo livello si occupa di gestire i dati riguardanti le liste all'interno del sistema.

## Mappatura Hardware/Software
Il sistema avrà un'architettura client/server three-tier con un tier che implementa il livello di presentazione, un secondo tier che implementa la logica applicativa e un terzo tier che comprende un DBMS per la gestione dei dati persistenti.  
Sul primo tier è eseguto un web browser che consentirà all'utente, attraverso una interfaccia grafica, di interagire con il sistema. La comunicazione tra primo e secondo tier che si occupa della logica di business avverrà tramite protocollo HTTP.
Questo protocollo permette di trasferire ipertesti tra tier di presentazione e tier della logica applicativa tramite un meccanismo di richiesta e risposta.
Dal punto di vista hardware, il primo tier potrà essere una qualsiasi macchina dotata di connesione ad internet, mentre per le specifiche software un sistema operativo con installato uno dei web browser supportati, sarà sufficiente per interagire con il sistema.
Il tier della logica applicativa, dotato di connessione ad internet, avrà installato un Web Server Apache con modulo PHP, e comunicherà con il tier della gestione dei dati attravero un protocollo MySql. Infatti quest'ultimo, dotato anche esso di connessione ad intenet, avrà un database realazionale MySql.



## Gestione degli Accessi
Moovie prevede differenti tipologie di utenza, ognuna delle quali può usufruire di varie funzionalità, a seconda del tipo di oggetto con cui interagiscono.

Si è scelto di utilizzare una matrice per documentare i diritti di accesso per ogni attore.
La matrice suddivide la tipologia di attore per colonna, la tipologia di oggetto a cui si accede per riga, e per ogni interazione tra questi è presente l'insieme di operazioni disponibli. 
  

**Attori / Oggetti** | **Utente** | **Utente Autenticato** | **Gestore**
-------- | --------| ----- | ---- 
Utente | CreareAccount()<br/>AttivareAccount()<br/>AutenticareAccount() | RichiestaCambioPassword()<br/>ConfermaCambioPassword()<br/>RicercaUtente() | RichiestaCambioPassword()<br/>ConfermaCambioPassword()<br/>RicercaUtente() 
Film | RicercaFilm() | RicercaFilm()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br/>RimuovereGiudizio()<br/>SuggerimentoAutomatico() | AggiungiFilm()(**Da aggiungere?**)<br/>RicercaFilm()<br/>AggiungereGiudizio()<br/>ModificareGiudizio()<br>RimuovereGiudizio()<br/>SuggerimentoAutomatico() 
Artista | RicercaArtista() | RicercaArtista() | AggiungiArtista()(**Da aggungere?**)<br/>RicercaArtista()
Lista | | CreareLista()<br/>ModificareLista()<br/>EliminareLista()<br/>AggiornarePresenzaFilm()<br/>SeguireListeAltrui() | CreareLista()<br/>ModificareLista()<br/>EliminareLista()<br/>AggiornarePresenzaFilm()<br/>SeguireListeAltrui()
Amicizia | | RichiestaAmiciziaAccount()<br/>ConfermaAmiciziaAccount()<br/>RifiutaAmiciziaAccount()<br/>SuggerisciFilmAccountAmico() | RichiestaAmiciziaAccount()<br/>ConfermaAmiciziaAccount()<br/>RifiutaAmiciziaAccount()<br/>SuggerisciFilmAccountAmico()



    





# System Design Document
| Versione |    Data    | Descrizione                  | Autori                   |
| :------: | :--------: | :------------------------:   | :----------------------: |
| 0.1      | 19/11/2019 | Prima stesura                | Michelantonio Panichella, Gianluca Pirone  |
| 0.2      | 26/11/2019 | Mappatura HW/SW, Gestione Accessi | Gianluca Pirone  |

1. [Introduzione](#introduzione)
    1. Descrizione del Problema
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
            1. [Ricerca e consultazione](#ricerca-e-consultazione)
                1. [RicercaConsultazionePresentationLayer](#ricercaconsultazionepresentationlayer)
                2. [RicercaConsultazioneApplicationLayer](#ricercaconsultazioneapplicationlayer)
                3. [RicercaConsultazioneDataLayer](#ricercaconsultazionedatalayer)
            2. [Gestione account](#gestione-account)
                1. [GestioneAccountPresentationLayer](#gestioneaccountpresentationlayer)
                2. [GestioneAccountApplicationLayer](#gestioneaccountapplicationlayer)
                3. [GestioneAccountDataLayer](#gestioneaccountdatalayer)
            3. [Gestione dei film guardati](#gestione-dei-film-guardati)
                1. [GestioneFilmGuardatiPresentationLayer](#gestionefilmguardatipresentationlayer)
                2. [GestioneFilmGuardatiApplicationLayer](#gestionefilmguardatiapplicationlayer)
                3. [GestioneFilmGuardatiDataLayer](#gestionefilmguardatidatalayer)
            4. [Gestione delle liste](#gestione-delle-liste)
                1. [GestioneDelleListePresentationLayer](#gestionedellelistepresentationlayer)
                2. [GestioneDelleListeApplicationLayer](#gestionedellelisteapplicationlayer)
                3. [GestioneDelleListeDataLayer](#gestionedellelistedatalayer)
            5. [Suggerimenti](#suggerimenti)
                1. [SuggerimentiPresentationLayer](#suggerimentipresentationlayer)
                2. [SuggerimentiApplicationLayer](#suggerimentiapplicationlayer)
                3. [SuggerimentiDataLayer](#suggerimentidatalayer)
    3. [Mappatura Hardware/Software](#mappatura-hardwaresoftware)
    4. Gestione dei Dati Persistenti
    5. [Gestione degli accessi](#gestione-degli-accessi)
    6. Condizione limite
3. Servizi dei Sottosistemi
4. Glossario

# Introduzione

## Descrizione del problema







##  DesignGoals
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
 - Ricerca e consultazione;
 - Gestione account;
 - Gestione dei film guardati;   
 - Gestione delle liste;
 - Suggerimenti;









L'immagine mostrata, rappresenta le varie suddivisioni fatte all'interno del sistema mostrando dunque, per ogni layer, i sottosistemi che includono e descrivendo anche le relazioni che ci sono tra i vari layer.


### Decomposizione in micro-sistemi
Per procedere ad uno sviluppo e ad una progettazione semplificata dell'intero sistema si è deciso di suddividere i sottosistemi in tre stati:
 - PresentationLayer: Strato che si occupa delle interfaccie grafiche con il quale l'utente dovra interagire;
 - ApplicationLayer: Strato che si occupa di gestire tutte le richieste che l'utente fa attraverso il "PresentationLayaer", ricevendo, elaborando e alla fine mostrando graficamente il risultato di un' operazione da lui fatta;
 - Storage: Strato che si occupa di gestire i dati del sistema.

#### Ricerca e consultazione
Il sottosistema di "Ricerca e consultazione" si occupa di gestire le ricerche di tutti gli utenti offrendo diverse funzionalità quali:
 - Ricerca di un film;
 - Ricerca di un artista;	
 - Ricerca di un utente;

#### RicercaConsultazionePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la ricerca e consultazione:
 - GUI - Ricerca di un film: interfacce che offrono all'utente la possibilità di ricercare un film.
 - GUI - Ricerca di un artista: interfacce che offrono all'utente la possibilità di ricercare un artista.
 - GUI - Ricerca di un utente: interfacce che offrono all'utente autenticato la possibilità di ricercare un altro utente.

#### RicercaConsultazioneApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazione di "Ricerca e consultazione" al sistema:
 - RicercaFilm(): incoropora operazioni che permettono di ricercare un film ad un utente.
- RicercaArtista(): incoropora operazioni che permettono di ricercare un artista ad un utente.
- RicercaUtente(): incoropora operazioni che permettono di ricercare un altro utente ad un utente autenticato.

#### RicercaConsultazioneDataLayer
Questo livello si occupa di gestire i dati riguardanti le richerche degli utenti all'interno del sistema.

#### Gestione account
Il sottosistema di "Gestione account" si occupa di gestire tutti gli account del sistema offrendo diverse funzionalità quali:
 - Creare un account
 - Attivare un account 
 - Autenticare un account
 - Richiesta di cambio password
 - Conferma di cambio password
 - Richiede amicizia tra due account
 - Conferma amicizia tra due account


#### GestioneAccountPresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione di un account:
 - GUI - Creare un account: interfacce che offrono all'utente la possibilità di creare il proprio account immettendo le proprie informazioni;
 - GUI - Attivare un account: interfacce che offrono all'utente la possibilità di attivare l'account che prima ha creato;
 - GUI - Autenticare un account: interfacce che offrono all'utente la possibilità di potersi autenticare all'interno del sito;
 - GUI - Richiesta di cambio password: interfacce che offrono all'utente la possibilità di cambiare la password del proprio account;
 - GUI - Conferma di cambio password: interfacce che offrono all'utente la possibilità di accettare le modifiche precedentemente fatte alla password;
 - GUI - Richiede amicizia tra due account: interfacce che offrono all'utente la possibilità di richiedere l'amicizia ad un altro account;
 - GUI - Conferma amicizia tra due account: interfacce che offrono la possibilità confermare la richiesta di amicizia ricevuta da un altro account.

#### GestioneAccountApplicationLayer
Questo include al suo interno tutte le componenti che offrono operazione di "Gestione account" al sistema:
 - CreareUnAccount(): incorpora operazioni che permettono di creare un nuovo account ad un utente;
 - AttivareUnAccount(): incorpora operazioni che permettono all'utente di accettare la creazione dell'account e successivamente l'effettiva creazione di esso all'interno del sistema;
 - AutenticareUnAccount(): incorpora operazioni che permettono ad un utente di autenticarsi all'interno di Moovie;
 - RichiestadiCambioPassoword: incorpora operazioni che permettono all'utente di modificare la propria password;
 - ConfermaDiCambioPassword(): incorpora operazioni che permettono all'utente di accettare i cambiamenti precedentementi fatti alla propria password;
 - RichiestaAmiciziaTraDueAccount(): incorpora operazioni che permettono all'utente di richiedere un amicizia ad un altro account;
 - ConfermaAmiciziaTraDueAccount(): incorpora operazioni che permettono all'utente di accettare l'amicizia arrivata da un altro utente.

#### GestioneAccountDataLayer
Questo livello si occupa di gestire i dati riguardanti gli utenti dell'intero sistema.


#### Gestione dei film guardati
Il sottosistema di "Gestione dei film guardati" si occupa di gestire i giudizi di tutti gli utenti autenticati offrendo diverse funzionalità quali:
 - Aggiungere giudizio su un film aggiungendolo in “Film guardati”;	
 - Modificare giudizio su un film;
 - Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”);

#### GestioneFilmGuardatiPresentationLayer
Questo include al suo interno tutte le componenti che offrono operazione di "Gestione dei film guardati" al sistema:
 - GUI - Aggiungere giudizio su un film aggiungendolo in “Film guardati”:  interfacce che offrono all'utente autenticato la possibilità di aggiungere un giudizio su un film aggiungendolo in "Film guardati".
 - GUI - Modificare giudizio su un film: interfacce che offrono all'utente autenticato la possibilità di modificare un giudizio su un film.
 - GUI - Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”): interfacce che offrono all'utente autenticato la possibilità di rimuovere un giudizio su un film rimuovendolo da "Film guardati".

#### GestioneFilmGuardatiApplicationLayer
 - AggiungereGiudizioFilm(): incoropora operazioni che permettono di aggiungere un giudizio su un film, aggiungendolo in "Film guardati", ad un utente autenticato.
- ModificareGiudizioFilm(): incoropora operazioni che permettono di modificare un giudizio su un film ad un utente autenticato.
- RimuovereGiudizioFilm(): incoropora operazioni che permettono di rimuovere un giudizio su un film, rimuovendolo da "Film guardati", ad un utente autenticato.

#### GestioneFilmGuardatiDataLayer
Questo livello si occupa di gestire i dati riguardanti i giudizi degli utenti autenticati all'interno del sistema.

#### Gestione delle Liste
Il sottosistema di "Gestione liste" si occupa di gestire le liste del sistema offrendo diverse funzionalità quali: 
 - Creare una lista
 - Modificare una lista
 - Eliminare una lista
 - Aggiungere o rimuovere un film a una lista
 - Seguire liste altrui



#### GestioneDelleListePresentationLayer
Questo livello include tutte le componenti dell'interfaccia che offrono funzionalità riguardanti la gestione delle liste:
 - GUI - Creare una lista: interfacce che offrono la possibilità all'utente di creare una propria lista;
 - GUI - Modificare una lista: interfacce che offrono all'utente la possibilità di modificare una lista(cambio nome e privilegi);
 - GUI - Eliminare una lista: interfacce che offrono all'utente la possibilità di eliminare una lista da lui creata all'interno del sito;
 - GUI - Aggiungere o rimuovere un film a una lista: interfacce che offrono la possibilità all'utente di aggiungere o di rimuovere, da una lista ove lui possiede i privilegi, films;
 - GUI - Seguire liste altrui: interfacce che offrono la possibilità all'utente di seguire lite di altri amici;

#### GestioneDelleListeApplicationLayer
Questo livello include tutte le componenti che offronto operazioni di "Gestione delle liste" al sistema:
 - CreareUnaLista(): incorpora operazioni che permettono ad un utente di creare una lista;
 - ModificareUnaLista(): incorpora operazioni che permettono ad un utente di modificare una lista;
 - EliminareUnaLista(): incorpora operazioni che permettono ad un utente di eliminare una lista all'interno del sito;
 - AggiungereORimuovereUnFilmAUnaLista(): incorpora operazioni che permettono ad un utente di aggiungere o rimuovere un film da una lista;
 - SeguireListeAltrui(): incorpora operazioni che permettono ad un utente di seguire delle liste delle quali possiede i privilegi.

#### GestioneDelleListeDataLayer
Questo livello si occupa di gestire i dati riguardanti le liste all'interno del sistema.

#### Suggerimenti
Il sottosistema di "Suggerimenti" si occupa di gestire i suggerimenti offrendo diverse funzionalità quali:
 - Suggerire un film a un account amico;
 - Suggerimento automatico di un film;

#### SuggerimentiPresentationLayer
Questo include al suo interno tutte le componenti che offrono operazione di "Suggerimenti" al sistema:
- GUI - Suggerire un film a un account amico: interfacce che offrono all'utente autenticato la possibilità di consigliare un film ad un account amico.
 - GUI - Suggerimento automatico di un film: interfacce che offrono all'utente autenticato la possibilità di farsi consigliare un film dal sistema in linea con i propri gusti.

#### SuggerimentiApplicationLayer
 - SuggerireFilmAccountAmico(): incoropora operazioni che permettono ad un utente autenticato di consigliare un film ad un account amico.
 - SuggerimentoAutomaticoFilm(): incoropora operazioni che permettono di farsi consigliare un film dal sistema ad un utente autenticato.

#### SuggerimentiDataLayer
Questo livello si occupa di gestire i dati riguardanti i suggerimenti agli utenti autenticati all'interno del sistema.

## Mappatura Hardware/Software
Il sistema avrà un'architettura client/server three-tier con un client che implementa il livello di presentazione, un server che implementa la logica applicativa e un secondo server che comprende un DBMS per la gestione dei dati.  
Sul client è eseguto un web browser che consentirà all'utente, attraverso una interfaccia grafica, di interagire con il sistema. La comunicazione tra client e server che si occupa della logica di business avverrà tramite protocollo HTTP.
Questo protocollo permette di trasferire ipertesti tra client di presentazione e server della logica applicativa tramite un meccanismo di richiesta e risposta.
Dal punto di vista hardware, il client potrà essere una qualsiasi macchina dotata di connesione ad internet, mentre per le specifiche software un sistema operativo con installato uno dei web browser supportati, sarà sufficiente per interagire con il sistema.
Il server della logica applicativa, dotato di connessione ad internet, avrà installato un Web Server Apache con modulo PHP, e comunicherà con il server della gestione dei dati attravero un protocollo MySql. Infatti quest'ultimo, dotato anche esso di connessione ad intenet, avrà un database realazionale MySql.



## Gestione degli Accessi
Moovie prevede differenti tipologie di utenza, ognuna delle quali può usufruire di varie funzionalità, a seconda del tipo di oggetto con cui interagiscono.

Si è scelto di utilizzare una matrice per documentare i diritti di accesso per ogni attore.
La matrice suddivide la tipologia di attore per colonna, la tipologia di oggetto a cui si accede per riga, e per ogni interazione tra questi è presente l'insieme di operazioni disponibli. 
  

**Attori / Oggetti** | **Utente** | **Utente Autenticato** | **Gestore**
-------- | --------| ----- | ---- 
Utente | CreareAccount()  AttivareAccount() AutenticareAccount() | RichiestaCambioPassword() ConfermaCambioPassword() RicercaUtente() | RichiestaCambioPassword() ConfermaCambioPassword() RicercaUtente() 
Film | RicercaFilm() | RicercaFilm() AggiungereGiudizioFilm() ModificareGiudizioFilm() RimuovereGiudizioFilm() SuggerimentoAutomaticoFilm() | AggiungiFilm()(**Da aggiungere?**) RicercaFilm() AggiungereGiudizioFilm() ModificareGiudizioFilm() RimuovereGiudizioFilm() SuggerimentoAutomaticoFilm() 
Artista | RicercaArtista() | RicercaArtista() | AggiungiArtista()(**Da aggungere?**) RicercaArtista()
Lista | | CreareLista() ModificareLista() EliminareLista() AggiornarePresenzaFilmLista() SeguireListeAltrui() | CreareLista() ModificareLista() EliminareLista() AggiornarePresenzaFilmLista() SeguireListeAltrui()
Amicizia | | RichiestaAmiciziaAccount() ConfermaAmiciziaAccount() RifiutaAmiciziaAccount() SuggerireFilmAccountAmico() | RichiestaAmiciziaAccount() ConfermaAmiciziaAccount() RifiutaAmiciziaAccount() SuggerireFilmAccountAmico()



    





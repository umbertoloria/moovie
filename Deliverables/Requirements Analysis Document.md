# Requirements Analysis Document
| Versione |    Data    | Descrizione                    | Autori                   |
|----------|------------|--------------------------------|--------------------------|
| 0.1      | 30/9/2019  | Prima stesura                  | Umberto Loria            |
| 0.2      | 10/10/2019 | Più tecnicismi                 | Team                     |
| 0.3      | 17/10/2019 | Primi casi d'uso               | Michelantonio Panichella |
| 0.4      | 22/10/2019 | Estensione casi d'uso          | Gianluca Pirone          |
| 0.5      | 24/10/2019 | Semplificazione funzionalità   | Team                     |
| 0.6      | 11/11/2019 | Introduzione Markdown          | Umberto Loria            |
| 0.7      | 19/11/2019 | Sequence Diagrams su GitHub    | Team                     |
| 0.8      | 25/11/2019 | Riorganizzazione sottosistemi  | Umberto Loria            |
| 0.9      | 23/12/2019 | Miglioramenti di progettazione | Umberto Loria            |

# Indice
1. [Introduzione](#introduzione)
    1. [Dominio](#dominio)
    2. [Obiettivi](#obiettivi)
2. [Soluzioni attuali](#soluzioni-attuali)
3. [Sistema proposto](#sistema-proposto)
    1. [Panoramica](#panoramica)
    2. [Requisiti funzionali](#requisiti-funzionali)
    3. [Requisiti non-funzionali](#requisiti-non-funzionali)
        1. [Usability](#usability)
        2. [Reliability](#reliability)
        3. [Performance](#performance)
        4. [Supportability](#supportability)
        5. [Vincoli](#vincoli-pseudo-requisiti)
        6. Implementation
        7. Interface
        8. Packaging
        9. Legal
    4. [Scenari](#scenari)
        1. [Voglio vedere un bel film sabato sera](#voglio-vedere-un-bel-film-sabato-sera)
        2. [Ho guardato uno splendido film](#ho-guardato-uno-splendido-film)
        3. [Suggerire dei film ad un amico che non è registrato su Moovie](#suggerire-dei-film-ad-un-amico-che-non-è-registrato-su-moovie)
        4. [Voglio informazioni su un attore, sceneggiatore o regista](#voglio-informazioni-su-un-attore-sceneggiatore-o-regista)
        5. [Voglio aggiungere un film ad una mia lista](#voglio-aggiungere-un-film-ad-una-mia-lista)
        6. [Suggerire un film ad un amico che è registrato su Moovie](#suggerire-un-film-ad-un-amico-che-è-registrato-su-moovie)
    5. [Use case models](#use-case-models)
        1. [Ricerche](#ricerche)
            1. [UC_RIC_1: Ricerca di un film](#uc_ric_1-ricerca-di-un-film)
            2. [UC_RIC_1.1: Ricerca di un film fallita](#uc_ric_11-ricerca-di-un-film-fallita)
            3. [UC_RIC_2: Ricerca di un artista](#uc_ric_2-ricerca-di-un-artista)
            4. [UC_RIC_2.1: Ricerca di un artista fallita](#uc_ric_21-ricerca-di-un-artista-fallita)
            5. [UC_RIC_3: Ricerca di un utente](#uc_ric_3-ricerca-di-un-utente)
            6. [UC_RIC_3.1: Ricerca di un utente fallita](#uc_ric_31-ricerca-di-un-utente-fallita)
        2. [Accounts](#accounts)
            1. [UC_ACC_1: Creare un account](#uc_acc_1-creare-un-account)
            2. [UC_ACC_1.1: Registrazione fallita](#uc_acc_11-registrazione-fallita)
            3. [UC_ACC_2: Autenticare un account](#uc_acc_2-autenticare-un-account)
            4. [UC_ACC_3: Cambiare password](#uc_acc_3-cambiare-password)
            5. [UC_ACC_3.1: Cambio password fallito](#uc_acc_31-cambio-password-fallito)
            6. [UC_ACC_4: Deautenticare un account](#uc_acc_4-deautenticare-un-account)
            7. [UC_ACC_5: Visualizzare un profilo](#uc_acc_5-visualizzare-un-profilo)
            8. [UC_ACC_6: Visualizzare la pagina iniziale](#uc_acc_6-visualizzare-la-pagina-iniziale)
        3. [Amicizie](#amicizie)
            1. [UC_AMI_1: Inviare richiesta di amicizia](#uc_ami_1-inviare-richiesta-di-amicizia)
            2. [UC_AMI_2: Cancellare richiesta di amicizia](#uc_ami_2-cancellare-richiesta-di-amicizia)
            4. [UC_AMI_3: Accettare richiesta di amicizia](#uc_ami_3-accettare-richiesta-di-amicizia)
            5. [UC_AMI_4: Rifiutare richiesta di amicizia](#uc_ami_4-rifiutare-richiesta-di-amicizia)
            5. [UC_AMI_5: Cancellare amicizia](#uc_ami_5-cancellare-amicizia)
            6. [UC_AMI_6: Visualizzare gli amici](#uc_ami_6-visualizzare-gli-amicizia)
        4. [Film](#film)
            1. [UC_FILM_1: Visualizzare un film](#uc_film_1-visualizzare-un-film)
            2. [UC_FILM_2: Visualizzare un artista](#uc_film_2-visualizzare-un-artista)
            3. [UC_FILM_3: Visualizzare un genere](#uc_film_3-visualizzare-un-genere)
            4. [UC_FILM_4: Aggiungere un giudizio](#uc_film_4-aggiungere-un-giudizio)
            5. [UC_FILM_5: Modificare un giudizio](#uc_film_5-modificare-un-giudizio)
            6. [UC_FILM_6: Rimuovere un giudizio](#uc_film_6-rimuovere-un-giudizio)
            7. [UC_FILM_7: Visualizzare i giudizi](#uc_film_7-visualizzare-i-giudizi)
            8. [UC_FILM_8: Aggiungere un promemoria](#uc_film_8-aggiungere-un-promemoria)
            9. [UC_FILM_9: Rimuovere un promemoria](#uc_film_9-rimuovere-un-promemoria)
            10. [UC_FILM_10: Visualizzare i promemoria](#uc_film_10-visualizzare-i-promemoria)
            11. [UC_FILM_11: Suggerimenti automatici di film](#uc_film_11-suggerimenti-automatici-di-film)
            12. [UC_FILM_12: Visualizzare la classifica dei film](#uc_film_12-visualizzare-la-classifica-dei-film)
    6. [Object model](#object-model)
    7. [Class diagrams](#class-diagrams)
    8. [Sequence diagrams](#sequence-diagrams)
    9. [Statechart diagrams](#statechart-diagrams)
    10. [Navigational paths](#navigational-paths)
    11. Screen mock-ups
4. Glossary

# Introduzione

## Dominio
Dopo aver visto tanti film, è difficile trovarne altri che ti prendano come i precedenti. Si potrebbero vedere tutti i
film di un determinato attore, ma probabilmente non piaceranno tutti. Si potrebbero vedere tutti i film di un regista
preferito, ma spesso nel cinema d'autore il numero di film girati dallo stesso regista si contano sulle dita delle mani
(stesso vale per uno sceneggiatore). Si potrebbero seguire i suggerimenti di altri appassionati di cinema. E se questi
procedimenti si potessero semplificare?

Moovie sarà una piattaforma fornita di tantissime informazioni inerenti al mondo del cinema, e sarà pronta a suggerire
agli utenti dei film in linea con le loro preferenze. Ognuno di essi potrà creare delle liste di film, e condividerle
con i propri amici.

## Obiettivi
L'obiettivo di Moovie è di realizzare una piattaforma per **condividere informazioni cinematografiche**. Gli utenti del
sistema potranno registrarsi e **condividere le proprie informazioni con gli amici**, e utilizzare le funzionalità di
suggerimento del sito per **scoprire nuovi film da guardare**.

# Soluzioni attuali
Senza l'utilizzo di Moovie, l'utente interessato al mondo del cinema attualmente utilizza più servizi per reperire le
informazioni di suo interesse.
* Per scoprire la filmografia di un artista è possibile consultare siti come [Wikipedia](https://wikipedia.org),
[MYmovies](https://www.mymovies.it) e altri.
* Per conteggiare i film già visti si possono utilizzare le funzionalità di [IMDb](https://www.imdb.com/), oppure
[TV Time](https://tvtime.com), che però è un'app molto più orientata sulle serie TV, e al momento le funzioni relative
al cinema sono davvero poco stabili, e manca grande supporto al catalogo di film.
* Per suggerire un film ad un amico, si utilizzano i mezzi generali di comunicazione reali o virtuali già esistenti.
* Per ricevere un suggerimento di film in linea con le proprie preferenze, bisogna conoscere un altro appassionato di
cinema che conosca e rispetti queste preferenze.

# Sistema proposto

## Panoramica
Questo documento descrive l'analisi dei requisiti del sistema e contiene tutte le strutture previste per i casi d'uso.
I requisiti descritti sono catalogati secondo il modello **F.U.R.P.S.**

## Requisiti funzionali
Identificativo | Descrizione | Priorità
:-------------:|-------------|:-------:
**M_RF_RIC** | Ricerche | Alta
RF_RIC.1 | Ricerca di un film
RF_RIC.2 | Ricerca di un artista
RF_RIC.3 | Ricerca di un utente
**M_RF_ACC** | Account | Alta
RF_ACC.1 | Creare un account
RF_ACC.2 | Autenticare un account
RF_ACC.3 | Cambiare password
RF_ACC.4 | Deautenticare un account
RF_ACC.5 | Visualizzare un profilo
RF_ACC.6 | Visualizzare la pagina iniziale
**M_RF_AMI** | Amicizie | Media
RF_AMI.1 | Inviare richiesta di amicizia
RF_AMI.2 | Cancellare richiesta di amicizia
RF_AMI.3 | Accettare richiesta di amicizia
RF_AMI.4 | Rifiutare richiesta di amicizia
RF_AMI.5 | Cancellare amicizia
RF_AMI.6 | Visualizzare gli amici
**M_RF_FILM** | Film | Alta
RF_FILM.1 | Visualizzare un film
RF_FILM.2 | Visualizzare un artista
RF_FILM.3 | Visualizzare un genere
RF_FILM.4 | Aggiungere un giudizio
RF_FILM.5 | Modificare un giudizio
RF_FILM.6 | Rimuovere un giudizio
RF_FILM.7 | Visualizzare i giudizi
RF_FILM.8 | Aggiungere un promemoria
RF_FILM.9 | Rimuovere un promemoria
RF_FILM.10 | Visualizzare i promemoria
RF_FILM.11 | Suggerimenti automatici di film
RF_FILM.12 | Visualizzare la classifica dei film

## Requisiti non-funzionali
### Usability
* L’utente non deve sentirsi smarrito durante l’uso delle interfacce di Moovie
* L’utente deve sempre poter raggiungere la home e login/logout
* Il sito si adatterà alle dimensioni del dispositivo su cui si naviga
* Sarà totalmente gratuito

### Reliability
* Moovie dovrà sempre garantire la consistenza dei dati memorizzati

### Performance
* Il tempo di attesa di pagina su laptop moderno e rete in fibra sarà minore di 1s
* Moovie sarà scalabile in numero di utenti

### Supportability
* Sarà supportato dai browser Google Chrome, Mozilla Firefox, Safari

### Vincoli (pseudo requisiti)
* Il sito prevede l’utilizzo delle seguenti tecnologie: Apache, MySQL, PHP

## Scenari

### Voglio vedere un bel film sabato sera
Dopo una settimana di lavoro, Michele non vede l’ora di guardare un bel film il sabato sera, in televisione accanto
alla sua fornitissima collezione di Blu Ray. Se un film manca nella collezione, lo noleggia e se gli piace lo compra.
Mentre è in autobus verso il noleggio Blu Ray, prende il suo cellulare e va sul sito web www.moovie.me. Cliccando su
**accesso**, si presenta una schermata di input che richiede alcuni campi. Alla voce "e-mail" scrive
"michele@pippo.pluto", e alla voce "password" scrive "adnam". Clicca su "accedi" ma il sistema notifica "I dati non
corrispondono". Si accorge di aver sbagliato e scrive "adnama". Clicca di nuovo su "accedi", e il sistema accede. A
questo punto, per scegliere il prossimo film da guardare, Michele può:

* consultare le proprie liste, aprire la lista "film da guardare", e scegliere un film;

* cercare il profilo della sua amica Amanda, aprire la sua lista "Migliori film del secolo" (può vedere le sue liste
solo avendo l’amicizia), scegliere un film dalla lista ed aggiungerlo nella propria lista "film da guardare";

* cliccare su "suggerisci" e scegliere un film tra i suggerimenti automatici presenti nella schermata successiva.

Una volta scelto il film, lo noleggia, torna a casa e lo guarda.

### Ho guardato uno splendido film
Michele ha appena finito di guardare "Eternal Sunshine of the Spotless Mind". Gli è piaciuto talmente tanto che
vorrebbe consigliarlo ai suoi amici, specialmente Amanda. Qualche mese prima avrebbe mandato molti messaggi a questi
ultimi, oppure ne avrebbe parlato a lavoro con i colleghi, ma da quando ha cominciato a usare Moovie, i suoi giudizi li
esprime direttamente lì.

Michele allora prende il suo cellulare, va su www.moovie.me, e cerca la voce "accesso" ma risulta già loggato, visto che
aveva effettuato l’accesso poche ore prima. Sulla pagina iniziale, trova già i film presenti in "film da guardare",
trova quello che ha appena visto e ci clicca sopra. Arrivato alla pagina del film, clicca su "ho già visto questo film".
Si aprirà una schermata popup che chiederà un voto da 1 a 10. Michele scrive 9 e clicca "aggiungi".

La schermata si chiude, e Michele si troverà sempre sulla pagina del film. In questo modo, Michele sta aggiungendo
informazioni riguardo i suoi gusti sulla piattaforma, che sarà in grado di suggerirgli film ancora più in linea con i
suoi gusti.

Clicca su "aggiungi ad una lista...", si apre una schermata popup contenente tutte le sue liste, sceglie "Film che
consiglio", e la schermata si chiude, mostrando sempre la pagina del film. In questo modo, tutti gli utenti che
"seguono" questa lista saranno notificati del nuovo aggiornamento.

Se quel film fosse già stato votato, e Michele avesse voluto modificare quel giudizio, sarebbe potuto andare sulla lista
"film guardati", scegliere il film, e cliccare su "modifica", per poi inserire il nuovo voto, sempre da 1 a 10.

### Suggerire dei film ad un amico che non è registrato su Moovie
A Stefano piacciono molto i film, mai però quanto a Michele. Quest’ultimo ha capito i gusti di Stefano, e vuole
consigliargli tanti di quei film che quasi non gli vengono in mente. Proprio per questo motivo, Michele consiglia a
Stefano di crearsi un account su Moovie, per poter consultare la sua lista "migliori film biografici".

Stefano allora apre una nuova scheda sul browser, va su www.moovie.me e clicca su "registrazione". Gli si presenta una
schermata che chiede in input alcuni campi: nella voce "nome completo" inserisce "Stefano Bisettrice", nella voce
"indirizzo e-mail" inserisce "stefano@pippo.pluto", nella voce "password" inserisce "ciao". Appena clicca al di fuori
del campo "password" appare una scritta che suggerisce "Minimo 6 massimo 16 caratteri". Allora Stefano sostituisce la
password con "ciaociao". Nella voce "conferma password" inserisce "ciaociao".

Stefano, a questo punto, clicca su "Registrati". La nuova pagina che si presenta mostra il testo "Benvenuto nel
fantastico mondo di Moovie". Stefano sarà riportato alla pagina iniziale, dove potrà usare il suo nuovo account Moovie.

### Voglio informazioni su un attore, sceneggiatore o regista
Amanda vuole vedere un altro film diretto da "Tarantino", visto che ha particolarmente apprezzato il film "Pulp Fiction"
che lei e Michele hanno visto il giorno prima. Allora prende il suo tablet, apre il browser, va su www.moovie.me, accede
alle funzionalità di ricerca raggiungibili nel menu del sito (autenticazione non necessaria). In realtà le basterebbe
accedere al suo account e andare nella lista "film guardati". Nello spazio di ricerca, Amanda inserisce "Pulp Fiction" e
preme Invio. La nuova pagina che si presenta conterrà i risultati della ricerca, e tra questi clicca sulla voce "Pulp
Fiction". Giunta alla scheda del film, ricca di informazioni riguardo gli attori, il regista, e le saghe di cui potrebbe
far parte, clicca sulla voce "Quentin Tarantino", e finalmente arriva alla pagina delle informazioni del noto regista.
In questa pagina ci sono tutti i film diretti, scritti e recitati da Tarantino. Amanda si accorge che "Pulp Fiction",
oltre ad essere stato girato, è stato anche scritto da "Tarantino"!

### Voglio aggiungere un film ad una mia lista
Amanda si trova sulla pagina di "Quentin Tarantino" su Moovie. Interessata, comincia a sbirciare tra tutti i lavori di
questo artista, per poter cercare il prossimo film da vedere. La pagina dell’artista mostra tutti i film in cui
Tarantino ha partecipato. Nel caso specifico, ci saranno tanti film nel reparto "regie", e alcuni film nel reparto
"recitazioni". Una volta scelto il film, Amanda raggiunge la sua scheda informativa, e clicca su "Guarda più tardi". Il
sito adesso saprà che tra i film da guardare c’è "Kill Bill: Volume 1".

### Suggerire un film ad un amico che è registrato su Moovie
Stefano ha una scheda di browser aperta sul suo computer al sito www.moovie.me, e dopo aver effettuato l’accesso, si è
subito reso conto di aver trovato un sito davvero valido.

Allora raggiunge l’area di ricerca presente nel menu, e cerca il proprio amico Michele. La pagina successiva mostra i
vari risultati della ricerca, e tra questi è presente l’account di Michele. Cliccandoci sopra, la nuova pagina mostra il
profilo di Michele, tutte le liste e attività pubbliche. Stefano trova quindi la voce "invia richiesta di amicizia", e
cliccandoci sopra, viene notificato dell’invio della richiesta. Intanto Michele, che stava usando Moovie, trova la
richiesta di amicizia di Stefano nella sezione delle notifiche. Allora, Michele clicca sulla notifica, che lo porta sul
profilo di Stefano. Quando lo riconosce, clicca su "accetta richiesta di amicizia". Fatto questo, la pagina prima mostra
il messaggio "amicizia accettata", e successivamente aggiorna le informazioni mostrate sul profilo di Stefano.

Stefano, intanto, ha notato la notifica della conferma dell’amicizia (sempre nella sezione notifiche), e clicca su
questa notifica, arrivando sul profilo di Michele. A questo punto, Stefano sbircia nella lista "film guardati" di
Michele. Cliccando su questa lista, la pagina cambia mostrando i film presenti nella lista. Tra questi, Stefano nota
subito che non è presente "Forrest Gump", il suo film preferito. Sconcertato che un appassionato di cinema come Michele
non abbia mai visto questo famosissimo film, glielo suggerisce immediatamente. Accede alle funzionalità di ricerca,
cerca "Forrest Gump", arriva alla pagina dei risultati, e tra questi clicca sulla scheda del film. Arrivato alla scheda
del film, Stefano prima aggiunge il film alla propria lista dei "film guardati" (con voto 10), e poi clicca su
"suggerisci". Sul popup che si è appena aperto, Stefano vede tutti i suoi amici (in questo caso solo
Michele), seleziona questa voce, preme "suggerisci", il popup si chiude, e se ne apre un altro che contiene la scritta
"Film suggerito".

Intanto Michele, che è ancora collegato su Moovie, trova una nuova notifica che dice "Stefano ti consiglia Forrest
Gump". Michele allora clicca sul film, arriva sulla sua scheda, e lo aggiunge subito alla lista "film guardati" (con
voto 10), perché ovviamente lui lo aveva già visto, ma prima di conoscere Moovie.

## Use case models
![](Use%20case%20diagrams/Moovie's%20User%20Tasks.jpg)

### Ricerche
![](Use%20case%20diagrams/Ricerche.jpg)

#### UC_RIC_1: Ricerca di un film
**Nome** | **Ricerca di un film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente seleziona "film" e inserisce il titolo di un film<li>Il sistema esegue la ricerca di film e mostra tutti i risultati<li>L’utente seleziona il film cercato<li>Il sistema preleva le informazioni e le presenta tramite la pagina del film</ol>
Condizione di uscita | L’utente potrà visualizzare il film tramite [UC_FILM_1](#uc_film_1-visualizzare-un-film).
Eccezioni | Se il film cercato non è presente, vai a [UC_RIC_1.1](#uc_ric_11-ricerca-di-un-film-fallita).

#### UC_RIC_1.1: Ricerca di un film fallita
**Nome** | **Ricerca di un film fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un film non presente.
Flusso di eventi | Moovie non trova il film cercato.
Condizione di uscita | Moovie comunica che il film non è presente.

#### UC_RIC_2: Ricerca di un artista
**Nome** | **Ricerca di un artista**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente seleziona "artisti" e inserisce il nome di un artista<li>Il sistema esegue la ricerca di artisti e mostra tutti i risultati<li>L’utente seleziona l'artista cercato<li>Il sistema preleva le informazioni e le presenta tramite la pagina dell'artista</ol>
Condizione di uscita | L’utente potrà visualizzare l'artista tramite [UC_FILM_2](#uc_film_2-visualizzare-un-artista).
Eccezioni | Se l’utente cercato non è presente, vai a [UC_RIC_2.1](#uc_ric_21-ricerca-di-un-artista-fallita).

#### UC_RIC_2.1: Ricerca di un artista fallita
**Nome** | **UC_2.1: Ricerca di un artista fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un artista non presente.
Flusso di eventi | Moovie non trova l’artista cercato.
Condizione di uscita | Moovie comunica che l’artista non è presente.

#### UC_RIC_3: Ricerca di un utente
**Nome** | **Ricerca di un utente**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente seleziona "utenti" e inserisce il nome di un utente<li>Il sistema esegue la ricerca di utenti e mostra tutti i risultati<li>L’utente seleziona l'utente cercato<li>Il sistema preleva le informazioni e le presenta tramite il profilo dell'utente</ol>
Condizione di uscita | L’utente potrà visualizzare l'utente tramite [UC_ACC_5](#uc_acc_5-visualizzare-un-profilo).
Eccezioni | Se l’utente cercato non è presente, vai a [UC_RIC_3.1](#uc_ric_31-ricerca-di-un-utente-fallita).

#### UC_RIC_3.1: Ricerca di un utente fallita
**Nome** | **Ricerca di un utente fallita**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente cerca un altro utente non esistente.
Flusso di eventi | Moovie non trova l’account cercato.
Condizione di uscita | Moovie comunica che l’account non esiste.

### Accounts
![](Use%20case%20diagrams/Accounts.jpg)

#### UC_ACC_1: Creare un account
**Nome** | **Creare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail e password (due volte)<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati.</ol>
Condizione di uscita | Il sistema comunica che l'account è stato creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a [UC_ACC_1.1](#uc_acc_11-registrazione-fallita).

#### UC_ACC_1.1: Registrazione fallita
**Nome** | **Registrazione fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente ha inserito dati non accettabili durante la registrazione.
Flusso di eventi | <br/><ol><li>Il sistema si accorge che uno dei campi inseriti non è valido e avvisa l'utente<li>L'utente inserisce dei dati corretti<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati.</ol>
Condizione di uscita | Il sistema comunica che l'account è stato creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a [UC_ACC_1.1](#uc_acc_11-registrazione-fallita).

#### UC_ACC_2: Autenticare un account
**Nome** | **Autenticare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di accesso.
Flusso di eventi | <br/><ol><li>L’utente inserisce e-mail e password del suo account e prosegue<li>Moovie verifica la correttezza dei dati inseriti e autentica l'account</ol>
Condizione di uscita | Il sistema comunica che l'accesso è stato effettuato.
Eccezioni | Se i dati sono sbagliati, effettua questo caso d'uso:<br/>**Attori**: utente<br/>**Condizione di entrata**: l'utente ha inserito i dati sbagliati.<br/>**Flusso di eventi**: <br/><br/><ol><li>Il sistema comunica che i dati sono sbagliati<li>L'utente inserisce di nuovo i dati<li>Il sistema verifica la correttezza dei dati e autentica l'account.</ol>**Condizione di uscita**: L'accesso è stato effettuato.

#### UC_ACC_3: Cambiare password
**Nome** | **Cambiare password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell'area di cambio password.
Flusso di eventi | <br/><ol><li>L’utente inserisce la vecchia e nuova password<li>Il sistema controlla che la vecchia password corrisponda, e aggiorna la nuova</ol>
Condizione di uscita | Il sistema comunca che la password è stata aggiornata.
Eccezioni | L’utente non fornisce i dati corretti. Vai a [UC_ACC_3.1](#uc_acc_31-cambio-password-fallito).

#### UC_ACC_3.1: Cambio password fallito
**Nome** | **Cambio password fallito**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente fornisce come vecchia password una password che non è la sua.
Flusso di eventi | <br/><ol><li>Il sistema afferma che la password fornita è sbagliata.<li>L'utente inserisce la vecchia password giusta<li>Il sistema controlla che la vecchia password corrisponda, e aggiorna la nuova</ol>
Condizione di uscita | Il sistema comunca che la password è stata aggiornata.
Eccezioni | L’utente non fornisce i dati corretti. Vai a [UC_ACC_3.1](#uc_acc_31-cambio-password-fallito).

#### UC_ACC_4: Deautenticare un account
**Nome** | **Deautenticare un account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nel sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link di uscita nel menu<li>Il sistema deautentica l'account</ol>
Condizione di uscita | Il sistema comunica che l'uscita è stata effettuata.

#### UC_ACC_5: Visualizzare un profilo
**Nome** | **Visualizzare un profilo**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nei risultati di ricerca, tra cui c'è un link al profilo che vuole visualizzare.
Flusso di eventi | <br/><ol><li>L'utente clicca sul link del profilo<li>Il sistema reperisce le informazioni dell'utente cercato e dei suoi giudizi, e le mostra nel suo profilo</ol>
Condizione di uscita | L'utente può consultare le informazioni dell'utente cercato e dei suoi giudizi.

#### UC_ACC_6: Visualizzare la pagina iniziale
**Nome** | **Visualizzare la pagina iniziale**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si nel sito.
Flusso di eventi | <br/><ol><li>L'utente clicca sul link alla pagina iniziale nel menu<li>Se l'utente è autenticato, il sistema reperisce le attività sue e dei suoi amici e le mostra nella pagina iniziale<li>Se l'utente è ospite, il sistema gli suggerisce di effettuare l'accesso o la registrazione</ol>
Condizione di uscita | L'utente può consultare la pagina iniziale.

### Amicizie
![](Use%20case%20diagrams/Amicizie.jpg)

#### UC_AMI_1: Inviare richiesta di amicizia
**Nome** | **Inviare richiesta di amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dell’account di cui vuole richiedere l’amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca per inviare una richiesta di amicizia<li>Moovie invia la richiesta al destinatario</ol>
Condizione di uscita | Il sistema comunica l'invio della richiesta

#### UC_AMI_2: Cancellare richiesta di amicizia
**Nome** | **Cancellare richiesta di amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente al quale ha inviato una richiesta di amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca per cancellare la richiesta di amicizia che aveva inviato<li>Il sistema cancella la richiesta</ol>
Condizione di uscita | Il sistema comunica che la richiesta è stata cancellata.

#### UC_AMI_3: Accettare richiesta di amicizia
**Nome** | **Accettare richiesta di amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto la sua amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca per accettare la richiesta inviatagli<li>Il sistema stabilisce l’amicizia</ol>
Condizione di uscita | Il sistema comunica che gli utenti sono diventati amici.

#### UC_AMI_4: Rifiutare richiesta di amicizia
**Nome** | **Rifiutare richiesta di amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto la sua amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca per rifiutare la richiesta inviatagli<li>Il sistema cancella la richiesta di amicizia</ol>
Condizione di uscita | Il sistema comunica che la richiesta di amicizia è stata rifiutata.

#### UC_AMI_5: Cancellare amicizia
**Nome** | **Cancellare amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente con cui vuole cancellare l'amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca per cancellare l'amicizia<li>Il sistema cancella l'amicizia</ol>
Condizione di uscita | Il sistema conferma che l'amicizia è stata cancellata

#### UC_AMI_6: Visualizzare gli amicizia
**Nome** | **Visualizzare gli amicizia**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link agli amici presente nel menu<li>Il sistema preleva tutte le amicizie (accettate o in attesa) e li mostra nella pagina degli amici</ol>
Condizione di uscita | Il sistema mostra tutte le amicizie che coinvolgono l'utente.

### Film
![](Use%20case%20diagrams/Film.jpg)

#### UC_FILM_1: Visualizzare un film
**Nome** | **Visualizzare un film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente, tra i risultati di ricerca, trova il link a un film che vuole visualizzare.
Flusso di eventi | <br/><ol><li>L'utente clicca sul link del film<li>Il sistema reperisce le informazioni del film, degli artisti partecipanti e dei suoi generi, e le mostra nella pagina film</ol>
Condizione di uscita | L'utente può consultare la pagina del film.

#### UC_FILM_2: Visualizzare un artista
**Nome** | **Visualizzare un artista**
---------|---
Attori | Utente.
Condizione di entrata | L’utente, tra i risultati di ricerca, trova il link a un artista che vuole visualizzare.
Flusso di eventi | <br/><ol><li>L'utente clicca sul link dell'artista<li>Il sistema reperisce le informazioni dell'artista e dei film a cui ha partecipato, e le mostra nella pagina film</ol>
Condizione di uscita | L'utente può consultare la pagina dell'artista.

#### UC_FILM_3: Visualizzare un genere
**Nome** | **Visualizzare un genere**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di un film, ed è interessato ad uno dei generi di questo film.
Flusso di eventi | <br/><ol><li>L'utente clicca sul link al genere a cui è interessato<li>Il sistema reperisce le informazioni del genere e dei suoi film, e le mostra nella pagina del genere</ol>
Condizione di uscita | L'utente può consultare la pagina del genere desiderato.

#### UC_FILM_4: Aggiungere un giudizio
**Nome** | **Aggiungere un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell'area di aggiunta di un giudizio a un determinato film.
Flusso di eventi | <br/><ol><li>L’utente inserisce un voto<li>Moovie salva il giudizio e rimanda l'utente alla pagina del film</ol>
Condizione di uscita | Il giudizio viene salvato e la pagina film viene visualizzata tramite [UC_FILM_1](#uc_film_1-visualizzare-un-film).

#### UC_FILM_5: Modificare un giudizio
**Nome** | **Modificare un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell'area di modifica di un giudizio a un determinato film.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nuovo voto<li>Moovie aggiorna il giudizio e rimanda l'utente alla pagina dei giudizi</ol>
Condizione di uscita | Il giudizio viene aggiornato e la pagina giudizi viene aggiornata tramite [UC_FILM_7](#uc_film_7-visualizzare-i-giudizi).

#### UC_FILM_6: Rimuovere un giudizio
**Nome** | **Rimuovere un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei giudizi.
Flusso di eventi | <br/><ol><li>L’utente clicca sul pulsante di rimozione di un giudizio<li>Moovie rimuove il giudizio, e aggiorna la pagina dei giudizi</ol>
Condizione di uscita | Il giudizio viene rimosso e la pagina giudizi viene aggiornata tramite [UC_FILM_7](#uc_film_7-visualizzare-i-giudizi).

#### UC_FILM_7: Visualizzare i giudizi
**Nome** | **Visualizzare i giudizi**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link ai giudizi presente nel menu<li>Il sistema preleva tutti i giudizi dell'utente e li mostra nella pagina dei giudizi</ol>
Condizione di uscita | Il sistema mostra tutti i giudizi dell'utente.

#### UC_FILM_8: Aggiungere un promemoria
**Nome** | **Aggiungere un promemoria**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina di un film.
Flusso di eventi | <br/><ol><li>L’utente clicca per aggiungere il film tra i promemoria<li>Moovie crea il nuovo promemoria e aggiorna la pagina del film</ol>
Condizione di uscita | Il promemoria viene salvato e la pagina film viene visualizzata tramite [UC_FILM_1](#uc_film_1-visualizzare-un-film).

#### UC_FILM_9: Rimuovere un promemoria
**Nome** | **Rimuovere un promemoria**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei promemoria.
Flusso di eventi | <br/><ol><li>L’utente clicca sul pulsante di rimozione di un promemoria<li>Moovie rimuove il promemoria, e aggiorna la pagina dei promemoria</ol>
Condizione di uscita | Il promemoria viene rimosso e la pagina promemoria viene aggiornata tramite [UC_FILM_10](#uc_film_10-visualizzare-i-promemoria).

#### UC_FILM_10: Visualizzare i promemoria
**Nome** | **Visualizzare i promemoria**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link ai promemoria presente nel menu<li>Il sistema preleva tutti i promemoria dell'utente e li mostra nella pagina dei promemoria</ol>
Condizione di uscita | Il sistema mostra tutti i promemoria dell'utente.

#### UC_FILM_11: Suggerimenti automatici di film
**Nome** | **Suggerimenti automatici di film**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link ai suggerimenti automatici presente nel menu<li>Il sistema seleziona alcuni film in linea con le preferenze dell'utente</ol>
Condizione di uscita | Il sistema suggerisce i film prelevati all'utente.

#### UC_FILM_12: Visualizzare la classifica dei film
**Nome** | **Visualizzare la classifica dei film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente clicca sul link alla classifica dei film presente nel menu<li>Il sistema mostra i film migliori, scelti secondo i giudizi di tutti gli utenti</ol>
Condizione di uscita | Il sistema mostra i film nella classifica.

## Object model

### Boundary objects
* Pagine generiche:
    * Pagina iniziale: mostra informazioni rilevanti per l'utente
        * Se l'utente è autenticato, mostra i giudizi propri e degli amici
        * Se l'utente è ospite, la pagina invita alla registrazione o all'accesso
    * Pagina film: mostra le informazioni di un film, degli artisti che vi hanno partecipato, e dei suoi generi
    * Pagina artista: mostra le informazioni di un artista e dei film in cui ha lavorato
    * Pagina utente: mostra i giudizi dell'utente (visibili solo se si è amici) e le funzionalità di amicizia
    * Leftmenu: permette di visualizzare giudizi, promemoria, suggerimenti automatici, amici
    * Risultati di ricerca: presenta i risultati elaborati dopo una ricerca
* Ricerche:
    * Area di ricerca: offre le funzioni di ricerca di film, artisti e utenti
* Accounts:
    * Accesso:
        * Form di accesso: consente di autenticarsi in un account esistente
    * Registrazione:
        * Form di registrazione: richiede l'inserimento delle informazioni necessarie alla creazione di un nuovo account
        * Conferma registrazione: notifica l'avvenuta registrazione dell'account
    * Cambio password:
        * Form di cambio password: richiede l'inserimento della password attuale e nuova per aggiornarla
        * Conferma cambio password: notifica l'avvenuto aggiornamento della password
* Amicizie:
    * Conferma richiesta amicizia inviata: notifica l'avvenuta richiesta di amicizia
    * Conferma richiesta amicizia cancellata: notifica l'avvenuta cancellazione di una richiesta di amicizia da parte
    dell'iniziale richiedente
    * Conferma richiesta amicizia accettata: notifica l'avvenuta accettazione di una richiesta di amicizia
    * Conferma richiesta amicizia rifiutata: notifica l'avvenuto rifiuto di una richiesta di amicizia
    * Conferma amicizia cancellata: notifica l'avvenuta cancellazione di un'amicizia precedente
    * Pagina amici: mostra tutte le informazioni sulle amicizie (accettate o in attesa) che coinvolgono l'utente che la
    visualizza
* Film:
    * Pagina genere: mostra le informazioni di un genere e tutti i film di quel genere
    * Giudizi:
        * Form di aggiunta giudizio: richiede l'inserimento del giudizio da salvare
        * Form di modifica giuizio: richiede l'inserimento del giudizio da aggiornare
        * Pagina giudizi: mostra i giudizi dell'utente che la visualizza
    * Pagina promemoria: mostra i promemoria dell'utente che la visualizza
    * Classifica film: mostra i film più votati dall'utenza del sito
    * Pagina suggerimenti: suggerisce alcuni film in linea con le preferenze dell'utente che la visualizza

### Control objects
* Visualizza film: preleva le informazioni di un film per presentarle
* Visualizza artista: preleva le informazioni di un artista per presentarle
* Visualiza profilo: preleva le informazioni riguardanti un utente per presentarle
* Ricerche:
    * Ricerca: permette di ricercare un testo solo tra film, artisti, utenti, o tra tutti questi
* Accounts:
    * Accesso: permette di autenticare un account se si conoscono e-mail e password annessi
    * Registrazione: permette di registrare un account, controllando prima la correttezza dei campi inseriti
    * Cambio password: effettua un cambio di password
    * Uscita: effettua la deautenticazione dell'utente
    * Visualizza pagina iniziale: se l'utente è autenticato, preleva i giudizi suoi e dei suoi amici e li presenta,
    altrimenti suggerisce all'utente ospite di effettuare l'accesso o la registrazione
* Amicizie:
    * Richiedi amicizia: invia una richiesta di amicizia
    * Cancella richiesta amicizia: cancella una richiesta di amicizia da parte dell'iniziale richiedente
    * Accetta richiesta amicizia: accetta una richiesta di amicizia
    * Rifiuta richiesta amicizia: rifiuta una richiesta di amicizia
    * Cancella amicizia: cancella un'amicizia precedente
    * Visualizza amici: preleva le informazioni riguardo le amicizie (accettate o in attesa) che coinvolgono l'utente
    autenticato
* Film:
    * Visualizza genere: preleva le informazioni di un genere e dei suoi film
    * Giudizi:
        * Aggiungi giudizio: aggiunge un giudizio
        * Modifica giudizio: modifica un giudizio esistente
        * Rimuovi giudizio: rimuove un giudizio esistente
        * Visualizza giudizi: preleva le informazioni dei giudizi dell'utente autenticato per presentarle
    * Promemoria:
        * Aggiungi promemoria: aggiunge un promemoria
        * Rimuovi promemoria: rimuove un promemoria esistente
        * Visualizza promemoria: preleva le informazioni dei promemoria dell'utente autenticato per presentarle
    * Visualizza classifica film: preleva i film più votati dall'utenza del sito e le mostra
    * Suggerimenti automatici: suggerisce alcuni film ad un account in base alle sue preferenze cinematografiche

### Entity objects
* Film Manager:
    * preleva il film con un determinato id (se esiste)
    * preleva tutti i film di un determinato genere
    * cerca film tramite fulltext
    * suggerisce automaticamente alcuni film ad un utente
* Artista Manager:
    * preleva l'artista con un determinato id (se esiste)
    * cerca artisti tramite fulltext
* Account Manager:
    * controlla l'esistenza di un utente con un determinato indirizzo e-mail
    * crea un account (composto da: nome, cognome, indirizzo e-mail e password)
    * preleva l'account con un determinato id (se esiste)
    * aggiorna le informazioni di un account
    * autentica un account
    * cerca utenti tramite fulltext
* Amicizia Manager
    * verifica l'esistenza di qualche relazione tra due account
    * crea una richiesta di amicizia tra due account
    * verifica l'esistenza di una richiesta di amicizia tra due account
    * rimuove una richiesta di amicizia esistente
    * accetta una richiesta di amicizia esistente
    * rifiuta una richiesta di amicizia esistente
    * verifica l'esistenza di un'amicizia tra due account
    * cancella un'amicizia esistente tra due account
    * preleva le amicizie accettate che coinvolgono un determinato account
    * preleva le amicizie in attesa che coinvolgono un determinato account
* Giudizio Manager:
    * preleva il giudizio di un determinato utente ad un determinato film
    * aggiunge un giudizio
    * modifica un giudizio esistente
    * rimuove un giudizio esistente
* Promemoria Manager:
    * preleva tutti i promemoria di un utente
    * aggiunge un promemoria
    * rimuove un promemoria
* Recitazione Manager:
    * preleva la recitazione di tutti gli attori in un determinato film
    * preleva la recitazione di un determinato attore in tutti i film
* Regia Manager:
    * preleva le regie di tutti i registi in un determinato film
    * preleva le regie di un determinato regista in tutti i film
* Genere Manager:
    * preleva il genere con un determinato id (se esiste)
    * preleva tutti i generi di un determinato film
* Auth Manager:
    * autentica un utente salvandolo nella sessione
    * preleva l'utente autenticato nella sessione (se presente)
    * rimuove l'utente autenticato dalla sessione
* Film: rappresenta le informazioni di un film
* Artista: rappresenta le informazioni di un artista
* Utente: rappresenta i dati di un utente
* Amicizia: rappresenta le informazioni di una richiesta di amicizia
* Amicizia Accettata: specializza una amicizia integrando le informazioni di accettazione di questa
* Giudizio: rappresenta il giudizio dato da un account ad un film in un dato orario
* Promemoria: rappresenta il promemoria di un film fatto da un account in un dato orario
* Genere: rappresenta le informazioni di un genere cinematografico
* Recitazione: rappresenta la partecipazione di un attore ad un film e il personaggio che ha interpretato
* Regia: rappresenta la partecipazione di un artista ad un film nel ruolo di regista

## Class diagrams
![](Class%20diagrams/Main%20class%20diagram.jpg)

### Ricerche
![](Class%20diagrams/Ricerche.jpg)

### Accounts
![](Class%20diagrams/Accounts.jpg)

### Amicizie
![](Class%20diagrams/Amicizie.jpg)

### Film
![](Class%20diagrams/Film.jpg)

## Sequence diagrams

### Ricerche

![](Sequence%20diagrams/UC_RIC_1%20Ricerca%20di%20un%20film.jpg)

![](Sequence%20diagrams/UC_RIC_2%20Ricerca%20di%20un%20artista.jpg)

![](Sequence%20diagrams/UC_RIC_3%20Ricerca%20di%20un%20utente.jpg)

### Accounts

![](Sequence%20diagrams/UC_ACC_1%20Creare%20un%20account.jpg)

![](Sequence%20diagrams/UC_ACC_2%20Autenticare%20un%20account.jpg)

![](Sequence%20diagrams/UC_ACC_3%20Cambiare%20password.jpg)

![](Sequence%20diagrams/UC_ACC_4%20Deautenticare%20un%20account.jpg)

![](Sequence%20diagrams/UC_ACC_5%20Visualizzare%20un%20profilo.jpg)

![](Sequence%20diagrams/UC_ACC_6%20Visualizzare%20la%20pagina%20iniziale.jpg)

### Amicizie

![](Sequence%20diagrams/UC_AMI_1%20Inviare%20richiesta%20di%20amicizia.jpg)

![](Sequence%20diagrams/UC_AMI_2%20Cancellare%20richiesta%20di%20amicizia.jpg)

![](Sequence%20diagrams/UC_AMI_3%20Accettare%20richiesta%20di%20amicizia.jpg)

![](Sequence%20diagrams/UC_AMI_4%20Rifiutare%20richiesta%20di%20amicizia.jpg)

![](Sequence%20diagrams/UC_AMI_5%20Cancellare%20amicizia.jpg)

![](Sequence%20diagrams/UC_AMI_6%20Visualizzare%20gli%20amici.jpg)

### Film

![](Sequence%20diagrams/UC_FILM_1%20Visualizzare%20un%20film.jpg)

![](Sequence%20diagrams/UC_FILM_2%20Visualizzare%20un%20artista.jpg)

![](Sequence%20diagrams/UC_FILM_3%20Visualizzare%20un%20genere.jpg)

![](Sequence%20diagrams/UC_FILM_4%20Aggiungere%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_FILM_5%20Modificare%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_FILM_6%20Rimuovere%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_FILM_7%20Visualizzare%20i%20giudizi.jpg)

![](Sequence%20diagrams/UC_FILM_8%20Aggiungere%20un%20promemoria.jpg)

![](Sequence%20diagrams/UC_FILM_9%20Rimuovere%20un%20promemoria.jpg)

![](Sequence%20diagrams/UC_FILM_10%20Visualizzare%20i%20promemoria.jpg)

![](Sequence%20diagrams/UC_FILM_11%20Suggerimenti%20automatici%20di%20film.jpg)

![](Sequence%20diagrams/UC_FILM_12%20Visualizzare%20la%20classifica%20dei%20film.jpg)

## Statechart diagrams
![](Statechart%20diagrams/Utente.jpg)
![](Statechart%20diagrams/Amicizia.jpg)

## Navigational paths

![](Navigational%20paths/Utente%20ospite.jpg)

![](Navigational%20paths/Utente%20autenticato.jpg)

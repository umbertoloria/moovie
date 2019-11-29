# Requirements Analysis Document
| Versione |    Data    | Descrizione                   | Autori                   |
|----------|------------|-------------------------------|--------------------------|
| 0.1      | 30/9/2019  | Prima stesura                 | Umberto Loria            |
| 0.2      | 10/10/2019 | Più tecnicismi                | Team                     |
| 0.3      | 17/10/2019 | Primi casi d'uso              | Michelantonio Panichella |
| 0.4      | 22/10/2019 | Estensione casi d'uso         | Gianluca Pirone          |
| 0.5      | 24/10/2019 | Semplificazione funzionalità  | Team                     |
| 0.6      | 11/11/2019 | Introduzione Markdown         | Umberto Loria            |
| 0.7      | 19/11/2019 | Sequence Diagrams su GitHub   | Team                     |
| 0.8      | 25/11/2019 | Riorganizzazione sottosistemi | Umberto Loria            |

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
            1. [UC_1: Ricerca di un film](#uc_1-ricerca-di-un-film)
            2. [UC_1.1: Ricerca di un film fallita](#uc_11-ricerca-di-un-film-fallita)
            3. [UC_2: Ricerca di un artista](#uc_2-ricerca-di-un-artista)
            4. [UC_2.1: Ricerca di un artista fallita](#uc_21-ricerca-di-un-artista-fallita)
            5. [UC_3: Ricerca di un utente](#uc_3-ricerca-di-un-utente)
            6. [UC_3.1: Ricerca di un utente fallita](#uc_31-ricerca-di-un-utente-fallita)
        2. [Accounts](#accounts)
            1. [UC_4: Creare un account](#uc_4-creare-un-account)
            2. [UC_4.1: Registrazione fallita](#uc_41-registrazione-fallita)
            3. [UC_5: Autenticare un account](#uc_5-autenticare-un-account)
            4. [UC_6: Richiesta di cambio password](#uc_6-richiesta-di-cambio-password)
            5. [UC_6.1: Richiesta di cambio password fallita](#uc_61-richiesta-di-cambio-password-fallita)
            6. [UC_7: Conferma di cambio password](#uc_7-conferma-di-cambio-password)
            7. [UC_7.1: Conferma di cambio password fallita](#uc_71-conferma-di-cambio-password-fallita)
        3. [Amicizie](#amicizie)
            1. [UC_8: Richiedere amicizia tra due account](#uc_8-richiedere-amicizia-tra-due-account)
            2. [UC_8.1: Confermare amicizia tra due account](#uc_81-confermare-amicizia-tra-due-account)
            3. [UC_8.2: Rifiutare amicizia tra due account](#uc_82-rifiutare-amicizia-tra-due-account)
            4. [UC_9: Suggerire un film a un account amico](#uc_9-suggerire-un-film-a-un-account-amico)
        3. [Film](#film)
            1. [UC_10: Aggiungere un giudizio](#uc_10-aggiungere-un-giudizio)
            2. [UC_11: Modificare un giudizio](#uc_11-modificare-un-giudizio)
            3. [UC_12: Rimuovere un giudizio](#uc_12-rimuovere-un-giudizio)
            1. [UC_13: Suggerimento automatico di un film](#uc_13-suggerimento-automatico-di-un-film)
        4. [Liste](#liste)
            1. [UC_14: Creare una lista](#uc_14-creare-una-lista)
            2. [UC_15: Modificare una lista](#uc_15-modificare-una-lista)
            3. [UC_16: Eliminare una lista](#uc_16-eliminare-una-lista)
            4. [UC_17: Aggiornare la presenza di film nelle liste](#uc_17-aggiornare-la-presenza-di-film-nelle-liste)
            5. [UC_18: Seguire liste altrui](#uc_18-seguire-liste-altrui)
    6. [Object model](#object-model)
    7. [Class diagrams](#class-diagrams)
        1. Ricerche
        2. Accounts
        3. Amicizie
        4. Film
        5. Liste
    8. [Sequence diagrams](#sequence-diagrams)
        1. Ricerche
        2. Accounts
        3. Amicizie
        4. Film
        5. Liste
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
L'obiettivo di Moovie è di realizzare una piattaforma per **condividere informazioni cinematografiche**. Gli utenti del sistema potranno registrarsi e **condividere le proprie informazioni con gli amici**, e utilizzare le funzionalità di suggerimento del sito per **scoprire nuovi film da guardare**.

# Soluzioni attuali
Senza l'utilizzo di Moovie, l'utente interessato al mondo del cinema attualmente utilizza più servizi per reperire le
informazioni di suo interesse.
* Per scoprire la filmografia di un artista è possibile consultare siti come [Wikipedia](https://wikipedia.org),
[MYmovies](https://www.mymovies.it) e altri.
* Per conteggiare i film già visti, si potrebbero utilizzare le funzionalità dell'applicazione mobile
[TV Time](https://tvtime.com). Essendo però un'app orientata sulle serie TV, al momento le funzionalità relative al
cinema sono profondamente inferiori. Inoltre, molti film sono addirittura assenti.
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
**M_RF_1** | Ricerche | Alta
RF_1.1 | Ricerca di un film
RF_1.2 | Ricerca di un artista
RF_1.3 | Ricerca di un utente
**M_RF_2** | Account | Alta
RF_2.1 | Creare un account
RF_2.2 | Autenticare un account
RF_2.3 | Richiesta di cambio password
RF_2.4 | Conferma di cambio password
**M_RF_3** | Amicizie | Media
RF_3.1 | Richiedere amicizia tra due account
RF_3.2 | Confermare amicizia tra due account
RF_3.3 | Rifiutare amicizia tra due account
RF_3.4 | Suggerire un film a un account amico
**M_RF_4** | Film | Alta
RF_4.1 | Aggiungere un giudizio
RF_4.2 | Modificare un giudizio
RF_4.3 | Rimuovere un giudizio
RF_4.4 | Suggerimento automatico di un film
**M_RF_5** | Liste | Media
RF_5.1 | Creare una lista
RF_5.2 | Modificare una lista
RF_5.3 | Eliminare una lista
RF_5.4 | Aggiornare la presenza di film nelle liste
RF_5.5 | Seguire una lista altrui

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
“**Accesso**”, si presenta una schermata di input che richiede alcuni campi. Alla voce “e-mail” scrive
“michele@pippo.pluto”, e alla voce “password” scrive “adnam”. Clicca “Accesso” ma il sistema notifica “I dati immessi
non corrispondono”. Si accorge di aver sbagliato e scrive “adnama”. Clicca “Accesso”, e il sistema accede. A questo
punto, per scegliere il prossimo film da guardare, Michele può:

* consultare le proprie liste, aprire la lista “Guarda più tardi”, e scegliere un film;

* cercare il profilo della sua amica Amanda, aprire la sua lista “Migliori film del secolo” (può vedere le sue liste
solo avendo l’amicizia), scegliere un film dalla lista ed aggiungerlo nella propria lista “Guarda più tardi”;

* cliccare su “Suggerisci” e scegliere un film tra i suggerimenti automatici presenti nella schermata successiva.

Una volta scelto il film, lo noleggia, torna a casa e lo guarda.

### Ho guardato uno splendido film
Michele ha appena finito di guardare “Eternal Sunshine of the Spotless Mind”. Gli è piaciuto talmente tanto che
vorrebbe consigliarlo ai suoi amici, specialmente Amanda. Qualche mese prima avrebbe mandato molti messaggi a questi
ultimi, oppure ne avrebbe parlato a lavoro con i colleghi, ma da quando ha cominciato a usare Moovie, i suoi giudizi li
esprime direttamente lì.

Michele allora prende il suo cellulare, va su www.moovie.me, e cerca la voce “Accesso” ma risulta già loggato, visto che
aveva effettuato l’accesso poche ore prima. Sulla pagina iniziale, trova già i film presenti nella sua lista “Guarda più
tardi”, trova quello che ha appena visto e ci clicca sopra. Arrivato alla pagina del film e clicca su “Ho già visto
questo film”. Si aprirà una schermata popup che chiederà un voto da 1 a 10. Michele scrive 9 e clicca “Applica”.

La schermata si chiude, e Michele si troverà sempre sulla pagina del film. In questo modo, Michele sta aggiungendo
informazioni riguardo i suoi gusti sulla piattaforma, che sarà in grado di suggerirgli film ancora più in linea con i
suoi gusti.

Clicca su “Aggiungi ad una lista…”, si apre una schermata popup contenente tutte le sue liste, sceglie “Film che
consiglio”, e la schermata si chiude, mostrando sempre la pagina del film. In questo modo, tutti gli utenti che
“seguono” questa lista saranno notificati del nuovo aggiornamento.

Se quel film fosse già stato votato, e Michele avesse voluto modificare quel giudizio, sarebbe potuto andare sulla lista
“Film guardati”, scegliere il film, e cliccare su “Modifica giudizio”, per poi inserire il nuovo voto, sempre da 1 a 10.

### Suggerire dei film ad un amico che non è registrato su Moovie
A Stefano piacciono molto i film, mai però quanto a Michele. Quest’ultimo ha capito i gusti di Stefano, e vuole
consigliargli tanti di quei film che quasi non gli vengono in mente. Proprio per questo motivo, Michele consiglia a
Stefano di crearsi un account su Moovie, per poter consultare la sua lista “migliori film biografici”.

Stefano allora apre una nuova scheda sul browser, va su www.moovie.me e clicca su “Registrazione”. Gli si presenta una
schermata che chiede in input alcuni campi: nella voce “nome completo” inserisce “Stefano Bisettrice”, nella voce
“indirizzo e-mail” inserisce “stefano@pippo.pluto”, nella voce “password” inserisce “ciaociao”. Appena clicca al di
fuori del campo “password” appare una scritta che suggerisce “La password non è valida: devi inserire almeno un numero”.
Allora Stefano sostituisce la password con “ciaociao1”. Nella voce “conferma password” inserisce “ciaociao1”.

Stefano, a questo punto, clicca su “Registrati”. La nuova pagina che si presenta mostra il testo “Benvenuto nel
fantastico mondo di Moovie”. Stefano sarà riportato alla pagina iniziale, dove potrà usare il suo nuovo account Moovie.

### Voglio informazioni su un attore, sceneggiatore o regista
Amanda vuole vedere un altro film diretto da “Tarantino”, visto che ha particolarmente apprezzato il film “Pulp Fiction”
che lei e Michele hanno visto il giorno prima. Allora prende il suo tablet, apre il browser, va su www.moovie.me, accede
alle funzionalità di ricerca raggiungibili nel menu del sito (autenticazione non necessaria). In realtà le basterebbe
accedere al suo account e andare nella lista “film guardati”. Nello spazio di ricerca, Amanda inserisce “Pulp Fiction” e
preme Invio. La nuova pagina che si presenta conterrà i risultati della ricerca, e tra questi clicca sulla voce “Pulp
Fiction”. Giunta alla scheda del film, ricca di informazioni riguardo gli attori, il regista, e le saghe di cui potrebbe
far parte, clicca sulla voce “Quentin Tarantino”, e finalmente arriva alla pagina delle informazioni del noto regista.
In questa pagina ci sono tutti i film diretti, scritti e recitati da Tarantino. Amanda si accorge che “Pulp Fiction”,
oltre ad essere stato girato, è stato anche scritto da “Tarantino”!

### Voglio aggiungere un film ad una mia lista
Amanda si trova sulla pagina di “Quentin Tarantino” su Moovie. Interessata, comincia a sbirciare tra tutti i lavori di
questo artista, per poter cercare il prossimo film da vedere. La pagina dell’artista mostra tutti i film in cui
Tarantino ha partecipato. Nel caso specifico, ci saranno tanti film nel reparto “regie”, e alcuni film nel reparto
“recitazioni”. Una volta scelto il film, Amanda raggiunge la sua scheda informativa, e clicca su “Guarda più tardi“. Il
sito adesso saprà che tra i film da guardare c’è “Kill Bill: Volume 1”.

### Suggerire un film ad un amico che è registrato su Moovie
Stefano ha una scheda di browser aperta sul suo computer al sito www.moovie.me, e dopo aver effettuato l’accesso, si è
subito reso conto di aver trovato un sito davvero valido.

Allora raggiunge l’area di ricerca presente nel menu, e cerca il proprio amico Michele. La pagina successiva mostra i
vari risultati della ricerca, e tra questi è presente l’account di Michele. Cliccandoci sopra, la nuova pagina mostra il
profilo di Michele, tutte le liste e attività pubbliche. Stefano trova quindi la voce “Aggiungi agli amici”, e
cliccandoci sopra, viene notificato dell’invio della richiesta di amicizia. Intanto Michele, che stava usando Moovie,
trova la richiesta di amicizia di Stefano nella sezione delle notifiche. Allora, Michele clicca sulla notifica, che lo
porta sul profilo di Stefano. Quando lo riconosce, clicca su “Accetta richiesta” (situata nello stesso punto dove c’era
“Aggiungi agli amici” sul computer di Stefano). Fatto questo, la pagina prima mostra un popup contenente il messaggio
“Amicizia accettata”, e successivamente si aggiorna, mostrando di nuovo il profilo di Stefano.

Stefano, intanto, ha notato la notifica della conferma dell’amicizia (sempre nella sezione notifiche), e clicca su
questa notifica, arrivando sul profilo di Michele. A questo punto, Stefano sbircia nella lista “film guardati” di
Michele. Cliccando su questa lista, la pagina cambia mostrando i film presenti nella lista. Tra questi, Stefano nota
subito che non è presente “Forrest Gump”, il suo film preferito. Sconcertato che un appassionato di cinema come Michele
non abbia mai visto questo famosissimo film, glielo suggerisce immediatamente. Accede alle funzionalità di ricerca,
cerca “Forrest Gump”, arriva alla pagina dei risultati, e tra questi clicca sulla scheda del film. Arrivato alla scheda
del film, Stefano prima aggiunge il film alla propria lista dei “film guardati” (con voto 10), e poi clicca su
“Suggerisci a un amico”. Sul popup che si è appena aperto, Stefano vede tutti i suoi amici (in questo caso solo
Michele), seleziona questa voce, preme “Suggerisci”, il popup si chiude, e se ne apre un altro che contiene la scritta
“Film suggerito”.

Intanto Michele, che è ancora collegato su Moovie, trova una nuova notifica che dice “Stefano ti consiglia Forrest
Gump”. Michele allora clicca sul film, arriva sulla sua scheda, e lo aggiunge subito alla lista “film guardati” (con
voto 10), perché ovviamente lui lo aveva già visto, ma prima di conoscere Moovie.

## Use case models
![](Use%20case%20diagrams/Moovie's%20User%20Tasks.jpg)

### Ricerche
![](Use%20case%20diagrams/Ricerche.jpg)

#### UC_1: Ricerca di un film
**Nome** | **Ricerca di un film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente inserisce il titolo, genere, attori partecipanti di un film<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca<li>L’utente seleziona il film cercato<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa del film cercato</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa del film.
Eccezioni | Ricerca di un film fallita.

#### UC_1.1: Ricerca di un film fallita
**Nome** | **Ricerca di un film fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un film non presente.
Flusso di eventi | Moovie non trova il film cercato.
Condizione di uscita | Moovie comunica che il film non è presente.

#### UC_2: Ricerca di un artista
**Nome** | **Ricerca di un artista**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome di un artista<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca<li>L’utente seleziona l’artista cercato<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’artista cercato</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’artista.

#### UC_2.1: Ricerca di un artista fallita
**Nome** | **UC_2.1: Ricerca di un artista fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un artista non presente.
Flusso di eventi | Moovie non trova l’artista cercato.
Condizione di uscita | Moovie comunica che l’artista non è presente.

#### UC_3: Ricerca di un utente
**Nome** | **Ricerca di un utente**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome, cognome, e-mail (se visibile) di un utente<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca<li>L’utente seleziona l’utente cercato<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’utente cercato</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’utente.
Eccezioni | Se l’utente cercato non è presente, vai a [UC_3.1](#uc_31-ricerca-di-un-utente-fallita).

#### UC_3.1: Ricerca di un utente fallita
**Nome** | **Ricerca di un utente fallita**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente cerca un altro utente non esistente.
Flusso di eventi | Moovie non trova l’account cercato.
Condizione di uscita | Moovie comunica che l’account non esiste.

### Accounts
![](Use%20case%20diagrams/Accounts.jpg)

#### UC_4: Creare un account
**Nome** | **Creare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail e password (due volte)<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati.</ol>
Condizione di uscita | Il sistema comunica che l'account è stato creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a [UC_4.1](#uc_41-registrazione-fallita).

#### UC_4.1: Registrazione fallita
**Nome** | **Registrazione fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente ha inserito dati non accettabili durante la registrazione.
Flusso di eventi | <br/><ol><li>Il sistema si accorge che uno dei campi inseriti non è valido e avvisa l'utente<li>L'utente inserisce dei dati corretti<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati.</ol>
Condizione di uscita | Il sistema comunica che l'account è stato creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a [UC_4.1](#uc_41-registrazione-fallita).

#### UC_5: Autenticare un account
**Nome** | **Autenticare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di accesso.
Flusso di eventi | <br/><ol><li>L’utente inserisce e-mail e password del suo account e prosegue<li>Moovie verifica la correttezza dei dati inseriti e autentica l'account</ol>
Condizione di uscita | Il sistema comunica che l'accesso è stato effettuato.
Eccezioni | Se i dati sono sbagliati, effettua questo caso d'uso:<br/>**Condizione di entrata**: l'utente ha inserito i dati sbagliati<br/>**Flusso di eventi**: <br/><br/><ol><li>Il sistema comunica che i dati sono sbagliati.<li>L'utente inserisce di nuovo i dati.<li>Il sistema verifica la correttezza dei dati e autentica l'account.</ol>**Condizione di uscita**: L'accesso è stato effettuato.

#### UC_6: Richiesta di cambio password
**Nome** | **Richiesta di cambio password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente comincia la richiesta di cambio password.
Flusso di eventi | <br/><ol><li>L’utente inserisce la sua vecchia password<li>Il sistema controlla che la password corrisponda, ed invia una e-mail all’utente per effettuare il cambio di password</ol>
Condizione di uscita | Il sistema comunca di segure le istruzioni della e-mail inviata.
Eccezioni | L’utente non fornisce i dati corretti. Vai a [UC_6.1](#uc_61-richiesta-di-cambio-password-fallita).

#### UC_6.1: Richiesta di cambio password fallita
**Nome** | **Richiesta di cambio password fallita**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente fornisce una password che non è la sua.
Flusso di eventi | <br/><ol><li>Il sistema afferma che la password fornita è sbagliata.<li>L'utente inserisce la propria password<li>Il sistema controlla che la password corrisponda, ed invia una e-mail all’utente per effettuare il cambio di password</ol>
Condizione di uscita | Il sistema comunca di segure le istruzioni della e-mail inviata.
Eccezioni | L’utente non fornisce i dati corretti. Vai a [UC_6.1](#uc_61-richiesta-di-cambio-password-fallita).

#### UC_7: Conferma di cambio password
**Nome** | **Conferma di cambio password**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nella pagina di conferma di cambio password.
Flusso di eventi | <br/><ol><li>L’utente inserisce la password vecchia e due volte la nuova<li>Il sistema aggiorna la password</ol>
Condizione di uscita | Il sistema comunica che la password è stata aggiornata.
Eccezioni | Se la nuova password non è valida, oppure la vecchia non corrisponde, vai a [UC_7.1](#uc_71-conferma-di-cambio-password-fallita).

#### UC_7.1: Conferma di cambio password fallita
**Nome** | **Conferma di cambio password fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente inserisce come password attuale sbagliata, oppure inserisce una nuova password non valida.
Flusso di eventi | <br/><ol><li>Il sistema comunica che i dati non sono validi<li>L'utente inserisce dei dati giusti<li>Il sistema aggiorna la password</ol>
Condizione di uscita | Il sistema comunica che la password è stata aggiornata.
Eccezioni | Se la nuova password non è valida, oppure la vecchia non corrisponde, vai a [UC_7.1](#uc_71-conferma-di-cambio-password-fallita).

### Amicizie
![](Use%20case%20diagrams/Amicizie.jpg)

#### UC_8: Richiedere amicizia tra due account
**Nome** | **Richiedere amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dell’account a cui vuole richiedere l’amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca su “Aggiungi agli amici”<li>Moovie invia la richiesta al destinatario</ol>
Condizione di uscita | Il sistema comunica l'invio della richiesta

#### UC_8.1: Confermare amicizia tra due account
**Nome** | **Confermare amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto la sua amicizia.
Flusso di eventi | <br/><ol><li>L’utente accetta la richiesta<li>Il sistema attiva l’amicizia</ol>
Condizione di uscita | Il sistema comunica che gli utenti sono diventati amici.

#### UC_8.2: Rifiutare amicizia tra due account
**Nome** | **Rifiutare amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto la sua amicizia.
Flusso di eventi | <br/><ol><li>L’utente rifiuta la richiesta<li>Il sistema cancella la richiesta</ol>
Condizione di uscita | Il sistema comunica che la richiesta è stata rifiutata.

#### UC_9: Suggerire un film a un account amico
**Nome** | **Suggerire un film a un account amico**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sulla pagina del film che vuole consigliare.
Flusso di eventi | <br/><ol><li>L’utente clicca su “Suggerisci”<li>Il sistema presenta tutti gli amici a cui è possibile suggerire il film<li>L’utente sceglie gli account a cui consigliare il film<li>Il sistema invia il suggerimento agli utenti</ol>
Condizione di uscita | Il sistema conferma che il film è stato suggerito.

### Film
![](Use%20case%20diagrams/Film.jpg)

#### UC_10: Aggiungere un giudizio
**Nome** | **Aggiungere un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell'area di aggiunta di un giudizio.
Flusso di eventi | <br/><ol><li>L’utente inserisce un giudizio<li>Moovie aggiungerà il film (col voto relativo) alla lista “Film guardati”, e sarà in grado di suggerire meglio i film all’utente</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

#### UC_11: Modificare un giudizio
**Nome** | **Modificare un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei film guardati.
Flusso di eventi | <br/><ol><li>L’utente seleziona il giudizio da modificare e inserisce il nuovo giudizio<li>Moovie modificherà il giudizio sul film presente nella lista “Film guardati”</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

#### UC_12: Rimuovere un giudizio
**Nome** | **Rimuovere un giudizio**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei film guardati.
Flusso di eventi | <br/><ol><li>L’utente seleziona il giudizio da rimuovere<li>Moovie rimuoverà il film (e il voto) dalla lista “Film guardati”</ol>
Condizione di uscita | Il film verrà rimosso dai “Film guardati”.

#### UC_13: Suggerimento automatico di un film
**Nome** | **Suggerimento automatico di un film**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di suggerimento film<li>Il sistema seleziona un film in linea con i gusti dell’utente</ol>
Condizione di uscita | Il sistema suggerisce il film che è stato selezionato.

### Liste
![](Use%20case%20diagrams/Liste.jpg)

#### UC_14: Creare una lista
**Nome** | **Creare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina di creazione di una lista.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome della lista nel campo apposito<li>L’utente sceglie i film che desidera inserire all’interno della propria lista<li>L’utente sceglie la visibilità della propria lista (tutti, amici, solo io)<li>Il sistema crea la lista e notifica l’utente</ol>
Condizione di uscita | La lista viene creata.
Eccezioni | L’utente non ha selezionato nessun film da inserire.<br/>L’utente ha inserito un nome già esistente tra le sue liste.

#### UC_15: Modificare una lista
**Nome** | **Modificare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina della sua lista da modificare.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nuovo nome della lista che vuole modificare<li>L’utente modifica i privilegi della lista (tutti, amici, solo io)<li>Il sistema riceve le nuove informazioni, le applica alla lista (rifacendo il controllo di sicurezza) e invia una notifica di avvenuta modifica all’utente</ol>
Condizione di uscita | Il sistema conferma che la lista è stata modificata.

#### UC_16: Eliminare una lista
**Nome** | **Eliminare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina della sua lista da eliminare.
Flusso di eventi | <br/><ol><li>L’utente elimina la lista<li>Il sistema cancella la lista</ol>
Condizione di uscita | Il sistema conferma che la lista è stata cancellata.

#### UC_17: Aggiornare la presenza di film nelle liste
**Nome** | **Aggiornare la presenza di film nelle liste**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente deve selezionare le liste in cui inserire un film, e deselezionare le liste in cui rimuovere un film, nell'area di aggiornamento presenza film in liste.
Flusso di eventi | <br/><ol><li>L’utente seleziona le liste in cui inserire il film, e deseleziona le liste in cui rimuovere il film se già presente (quindi già selezionate)<li>Il sistema aggiunge il film alle liste selezionate, e rimuove il film dalle liste deselezionate</ol>
Condizione di uscita | Il film viene aggiunto/rimosso dalle liste selezionate/deselezionate.

#### UC_18: Seguire liste altrui
**Nome** | **Seguire liste altrui**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sulla pagina di una lista altrui (che può visualizzare).
Flusso di eventi | <br/><ol><li>L’utente vede tutti i film contenuti nella lista e inizia a seguire la lista che ha scelto<li>Il sistema verifica che l’utente abbia i privilegi per poterla seguire, e lo aggiunge alla liste dei seguaci</ol>
Condizione di uscita | Il sistema conferma che l'utente ha iniziato a seguire la lista desiderata.

## Object model

### Boundary objects
* Pagine generiche:
    * Pagina iniziale: mostra informazioni rilevanti per l'utente
        * Se l'utente è autenticato, mostra film da guardare, ultime attività degli amici e altri contenuti suggeriti
        * Se l'utente è ospite, la pagina mostra altre informazioni di tendenza
    * Pagina film: mostra le informazioni di un film
    * Pagina artista: mostra le informazioni di un artista
    * Pagina utente: mostra le informazioni di un utente (basandosi sulla visibilità di queste)
    * Pagina lista: mostra le informazioni di una lista
* Ricerche:
    * Area di ricerca: offre le funzioni di ricerca di film, artisti e utenti
    * Risultati di ricerca: presenta i risultati elaborati dopo una ricerca
* Accounts:
    * Accesso:
        * Form di accesso: consente di autenticarsi in un account esistente
    * Registrazione:
        * Form di registrazione: richiede l'inserimento di informazioni necessarie alla creazione di un nuovo account
        * Conferma registrazione: notifica l'avvenuta registrazione dell'account
    * Cambio password:
        * Form di richiesta cambio password: richiede l'inserimento della password attuale per cominciare la procedura
        di aggiornamento della stessa
        * Conferma richiesta cambio password: notifica l'avvenuta richiesta di cambio password
        * Form di conferma cambio password: richiede l'inserimento delle password corrente e nuova per poi aggiornarla
        * Conferma cambio password: notifica l'avvenuto aggiornamento della password
* Amicizie:
    * Conferma amicizia inviata: notifica l'avvenuta richiesta di amicizia
    * Conferma amicizia accettata: notifica l'avvenuta conferma di amicizia
    * Conferma amicizia rifiutata: notifica l'avvenuto rifiuto di amicizia
    * Form di selezione amici da suggerire: richiede la selezione di almeno uno tra i propri amici
    * Conferma amici suggeriti: notifica l'avvenuto suggerimento di film agli amici selezionati
* Film:
    * Form di aggiunta giudizio: richiede l'inserimento del giudizio da salvare
    * Pagina di film guardati: mostra i giudizi
    * Form di modifica giuizio: richiede l'inserimento del giudizio da aggiornare
    * Pagina di suggerimento automatico: permette di richiedere il suggerimento automatico di un film sconosciuto
    * Area di presentazione film suggerito: suggerisce un film
* Liste:
    * Form di creazione lista: richiede l'inserimento delle informazioni necessarie alla creazione di una nuova lista
    * Conferma lista modificata: notifica l'avvenuta modifica di una lista
    * Conferma lista eliminata: notifica l'avvenuta rimozione di una lista
    * Form di aggiornamento presenza film in liste: richiede la selezione delle sole proprie liste in cui un determinato
    film deve essere presente
    * Conferma lista seguita: notifica che si riceveranno aggiornamenti riguardo i cambiamenti di una lista

### Control objects
* Ricerche:
    * Ricerca: permette di ricercare film, artisti e utenti
    * Redirect: offre servizi di redirect via browser
* Accounts:
    * Accesso: permette di autenticare un account se si conoscono e-mail e password annessi
    * Registrazione: permette di registrare un account, controllando prima la correttezza dei campi inseriti
    * Cambio password: richiede o effettua un cambio di password
* Amicizie:
    * Amicizie: richiede, accetta e rifiuta le amicizie
    * Suggerimenti amici: permette ad un account di suggerire un film a uno o più account amici
* Film:
    * Film guardati: aggiunge, modifica e rimuove il giudizio di un film
    * Suggerimenti automatici: suggerisce un film ad un account in base alle sue preferenze cinematografiche
* Liste:
    * Liste: crea, modifica, cancella una lista. Permette a un account di seguire una lista. Inoltre, fornendo un film
    e una collezione di liste possedute da un account, inserisce questo film solo nelle liste fornite, rimuovendolo (se
    presente) in tutte le altre.

### Manager objects
* Film Manager:
    * cerca film tramite fulltext e criteri avanzati
    * suggerisce automaticamente un film ad un utente
* Artista Manager:
    * cerca artisti tramite fulltext e criteri avanzati
* Account Manager:
    * cerca utenti tramite fulltext e criteri avanzati
    * controlla l'esistenza di un utente con un determinato indirizzo e-mail
    * crea account composto da: nome, cognome, indirizzo e-mail e password
    * autentica un account
    * controlla che un account abbia una determinata password
    * aggiorna la password di un account
* Amicizia Manager
    * crea una richiesta di amicizia
    * accetta una richiesta di amicizia
    * rifiuta una richiesta di amicizia
    * fornisce una collezione contenente gli amici di un account
    * suggerisce un film ad un insieme di account
* E-Mail Manager: permette di inviare e-mail
* Film Guardati Manager:
    * aggiunge un giudizio su un film guardato
    * modifica il giudizio di un film guardato
    * rimuove il giudizio di un film guardato
* Lista Manager
    * verifica se un utente possiede una lista con un determinato nome
    * crea una lista composta da: nome, visibilità (pubblica, amici, privata **(va messo qui?)**) ed almeno un film
    * comunica se un utente è proprietario di una lista
    * modifica nome e visibilità di una lista
    * cancella una lista
    * inserisce un film solo nelle liste fornite da un utente, rimuovendolo in tutte le altre liste di sua proprietà
    * permette ad un account di seguire una lista

### Entity objects
* Film: rappresenta le informazioni di un film
* Artista: rappresenta le informazioni di un artista
* Utente: rappresenta i dati di un utente
* Lista: rappresenta le informazioni di una lista e film che contiene
* Amicizia: rappresenta le informazioni di una richiesta di amicizia
* Amicizia Accettata: specializza una amicizia integrando le informazioni di accettazione di questa
* E-Mail cambio password: descrive la procedura per cambiare la password

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

### Liste
![](Class%20diagrams/Liste.jpg)

## Sequence diagrams

### Ricerche

![](Sequence%20diagrams/UC_1%20Ricerca%20di%20un%20film.jpg)

![](Sequence%20diagrams/UC_2%20Ricerca%20di%20un%20artista.jpg)

![](Sequence%20diagrams/UC_3%20Ricerca%20di%20un%20utente.jpg)

### Accounts

![](Sequence%20diagrams/UC_4%20Creare%20un%20account.jpg)

![](Sequence%20diagrams/UC_5%20Autenticare%20un%20account.jpg)

![](Sequence%20diagrams/UC_6%20Richiesta%20di%20cambio%20password.jpg)

![](Sequence%20diagrams/UC_7%20Conferma%20di%20cambio%20password.jpg)

### Amicizie

![](Sequence%20diagrams/UC_8%20Richiedere%20amicizia%20tra%20due%20account.jpg)

![](Sequence%20diagrams/UC_8.1%20Accettare%20amicizia%20tra%20due%20account.jpg)

![](Sequence%20diagrams/UC_8.2%20Rifiutare%20amicizia%20tra%20due%20account.jpg)

![](Sequence%20diagrams/UC_9%20Suggerire%20un%20film%20a%20un%20account%20amico.jpg)

### Film

![](Sequence%20diagrams/UC_10%20Aggiungere%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_11%20Modificare%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_12%20Rimuovere%20un%20giudizio.jpg)

![](Sequence%20diagrams/UC_13%20Suggerimento%20automatico%20di%20un%20film.jpg)

### Liste

![](Sequence%20diagrams/UC_14%20Creare%20una%20lista.jpg)

![](Sequence%20diagrams/UC_15%20Modificare%20una%20lista.jpg)

![](Sequence%20diagrams/UC_16%20Eliminare%20una%20lista.jpg)

![](Sequence%20diagrams/UC_17%20Aggiornare%20la%20presenza%20di%20film%20nelle%20liste.jpg)

![](Sequence%20diagrams/UC_18%20Seguire%20liste%20altrui.jpg)

## Statechart diagrams
![](Statechart%20diagrams/Utente.jpg)
![](Statechart%20diagrams/Amicizia.jpg)

## Navigational paths

![](Navigational%20paths/Utente%20ospite.jpg)

![](Navigational%20paths/Utente%20autenticato.jpg)

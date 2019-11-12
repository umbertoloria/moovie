# Requirements Analysis Documents
1. Introduction
    1. Purpose of the system
    2. Scope of the system
    3. Objectives and success criteria of the project
    4. Definitions, acronyms, and abbreviations
    5. References
    6. Overview
2. [Sistema attuale](#sistema-attuale)
    1. Overview
    2. [Requisiti funzionali](#requisiti-funzionali)
    3. Requisiti non-funzionali
        1. Usability
        2. Reliability
        3. Performance
        4. Supportability
        5. Implementation
        6. Interface
        7. Packaging
        8. Legal
    4. [System models](#system-models)
        1. [Scenari](#scenari)
        2. [Use case models](#use-case-models)
            1. [Ricerca e consulazione](#ricerca-e-consultazione)
                1. [UC_1: Ricerca di un film](#uc_1-ricerca-di-un-film)
                2. [UC_1.1: Ricerca di un film fallita](#uc_11-ricerca-di-un-film-fallita)
                3. [UC_2: Ricerca di un artista](#uc_2-ricerca-di-un-artista)
                4. [UC_2.1: Ricerca di un artista fallita](#uc_21-ricerca-di-un-artista-fallita)
                5. [UC_3: Ricerca di un utente](#uc_3-ricerca-di-un-utente)
                6. [UC_3.1: Utente non trovato](#uc_31-utente-non-trovato)
            2. [Gestione account](#gestione-account)
                1. [UC_4: Creare un account](#uc_4-creare-un-account)
                2. [UC_4.1: Registrazione fallita](#uc_41-registrazione-fallita)
                3. [UC_5: Attivare un account](#uc_5-attivare-un-account)
                4. [UC_6: Autenticare un account](#uc_6-autenticare-un-account)
                5. [UC_6.1: Autenticazione fallita](#uc_61-autenticazione-fallita)
                6. [UC_7: Richiesta di cambio password](#uc_7-richiesta-di-cambio-password)
                7. [UC_7.1: Utente non fornisce dati corretti](#uc_71-utente-non-fornisce-dati-corretti)
                8. [UC_7.2: Conferma di cambio password](#uc_72-conferma-di-cambio-password)
                9. [UC_7.3: Verifica password corretta](#uc_73-verifica-password-corretta)
                10. [UC_8: Richiede amicizia tra due account](#uc_8-richiede-amicizia-tra-due-account)
                11. [UC_8.1: Conferma amicizia tra due account](#uc_81-conferma-amicizia-tra-due-account)
            3. [Gestione dei film guardati](#gestione-dei-film-guardati)
                1. [UC_9: Aggiungere giudizio su un film aggiungendolo in “Film guardati”](#uc_9-aggiungere-giudizio-su-un-film-aggiungendolo-in-film-guardati)
                2. [UC_10: Modificare giudizio su un film](#uc_10-modificare-giudizio-su-un-film)
                3. [UC_11: Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)](#uc_11-rimuovere-giudizio-su-un-film-rimuovendo-il-film-da-film-guardati)
            4. [Gestione delle liste](#gestione-delle-liste)
                1. [UC_12: Creare una lista](#uc_12-creare-una-lista)
                2. [UC_13: Modificare una lista](#uc_13-modificare-una-lista)
                3. [UC_14: Eliminare una lista](#uc_14-eliminare-una-lista)
                4. [UC_15: Aggiungere o rimuovere un film a una lista](#uc_15-aggiungere-o-rimuovere-un-film-a-una-lista)
                5. [UC_16: Seguire liste altrui](#uc_16-seguire-liste-altrui)
            5. [Suggerimenti](#suggerimenti)
                1. [UC_17: Suggerire un film a un account amico](#uc_17-suggerire-un-film-a-un-account-amico)
                2. [UC_18: Suggerimento automatico di un film](#uc_18-suggerimento-automatico-di-un-film)
        3. Object model
        4. Dynamic model
        5. User interface-navigational paths and screen mock-ups
3. Proposed system
4. Glossary

# Sistema attuale

## Requisiti funzionali
Identificativo | Descrizione | Priorità
:-------------:|-------------|:-------:
**M_RF_1** | Ricerca e consultazione | Alta
RF_1.1 | Ricerca di un film
RF_1.2 | Ricerca di un artista
RF_1.3 | Ricerca di un utente
**M_RF_2** | Gestione account | Alta
RF_2.1 | Creare un account
RF_2.2 | Attivare un account
RF_2.3 | Autenticare un account
RF_2.4 | Richiesta del cambio password
RF_2.5 | Conferma del cambio password
RF_2.6 | Richiedere amicizia tra due account
RF_2.7 | Confermare amicizia tra due account
**M_RF_3** | Gestione dei film guardati | Alta
RF_3.1 | Aggiungere giudizio su un film aggiungendolo in “Film guardati”
RF_3.2 | Modificare giudizio su un film
RF_3.3 | Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)
**M_RF_4** | Gestione delle liste | Media
RF_4.1 | Creare una lista
RF_4.2 | Modificare una lista
RF_4.3 | Eliminare una lista
RF_4.4 | Aggiungere o rimuovere un film a una lista
RF_4.5 | Seguire una lista altrui
**M_RF_5** | Suggerimenti | Bassa
RF_5.1 | Suggerire un film a un account amico
RF_5.2 | Suggerimento automatico di un film

## System models
...

### Scenari
...

### Use case models
Ecco tutti gli use case models.

#### Ricerca e consultazione

##### UC_1: Ricerca di un film
**Nome** | **Ricerca di un film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente inserisce il titolo, genere, attori partecipanti di un film;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona il film cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa del film cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa del film.
Eccezioni | Ricerca di un film fallita.

##### UC_1.1: Ricerca di un film fallita
**Nome** | **Ricerca di un film fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un film non presente.
Flusso di eventi | Moovie non trova il film cercato.
Condizione di uscita | Moovie comunica che il film non è presente.

##### UC_2: Ricerca di un artista
**Nome** | **Ricerca di un artista**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome di un artista;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona l’artista cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’artista cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’artista.

##### UC_2.1: Ricerca di un artista fallita
**Nome** | **UC_2.1: Ricerca di un artista fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un artista non presente.
Flusso di eventi | Moovie non trova l’artista cercato.
Condizione di uscita | Moovie comunica che l’artista non è presente.

##### UC_3: Ricerca di un utente
**Nome** | **Ricerca di un utente**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome, cognome, e-mail (se visibile) di un utente;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona l’utente cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’utente cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’utente.
Eccezioni | Se l’utente cercato non è presente, vai a UC_3.1.

##### UC_3.1: Utente non trovato
**Nome** | **Utente non trovato**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente cerca un altro utente non esistente.
Flusso di eventi | Moovie non trova l’account cercato.
Condizione di uscita | Moovie comunica che l’account non esiste.

#### Gestione account

##### UC_4: Creare un account
**Nome** | **Creare un account**
---------|---
Attori | Utente non registrato.
Condizione di entrata | L’utente si trova sulla pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail, password (due volte), e-mail utente che ha suggerito la registrazione (opzionale);<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati. Se è stato fornito anche l’indirizzo e-mail dell’account che ha suggerito la registrazione, e questo è il quinto account che lo fa, allora quell’account diventa account pro. Il sistema invierà in ogni caso una e-mail di attivazione dell’account.</ol>
Condizione di uscita | L’account viene creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a UC_4.1.

##### UC_4.1: Registrazione fallita
**Nome** | **Registrazione fallita**
---------|---
Attori | Utente non registrato.
Condizione di entrata | L’utente si trova nella pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail, password (due volte), e-mail utente che ha suggerito la registrazione (opzionale);<li>Il sistema si accorge che uno dei campi inseriti non è valido e reindirizza l’utente verso la pagina di Registrazione.</ol>
Condizione di uscita | L’utente deve rifare il UC_4.

##### UC_5: Attivare un account
**Nome** | **Attivare un account**
---------|---
Attori | Utente registrato ma non attivato.
Condizione di entrata | L’utente riceve la e-mail di attivazione.
Flusso di eventi | <br/><ol><li>L’utente segue le istruzioni della e-mail, e arriva sul sito;<li>Il sistema attiva l’account ed obbliga l’utente a effettuare i “primi passi”;<li>L’utente deve scegliere minimo 5 massimo 10 film che ha già guardato (con relativi voti, perché questi verranno messi nei “Film guardati”). Infine, conferma.<li>Il sistema allora inserisce i film selezionati nei Film guardati, sblocca l’account, e reindirizza l’utente nella Home Page.</ol>
Condizione di uscita | L’account verrà attivato.

##### UC_6: Autenticare un account
**Nome** | **Autenticare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente deve essere sulla pagina di Login
Flusso di eventi | <br/><ol><li>L’utente inserisce e-mail e password dell’account e prosegue;<li>Moovie verifica la correttezza dei dati inseriti e reindirizza l’utente.</ol>
Condizione di uscita | L’utente si trova autenticato nella pagina principale.
Eccezioni | Indirizzo e-mail o password non corretti. Vai a UC_6.1.<br/>L’utente non possiede un account. Vai a UC_4.1.

##### UC_6.1: Autenticazione fallita
**Nome** | **Autenticazione fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente ha inseriti i dati sbagliati nella pagina di login.
Flusso di eventi | Il sistema comunica che i dati sono sbagliati.
Condizione di uscita | L’utente deve rifare il caso d’uso UC_6.

##### UC_7: Richiesta di cambio password
**Nome** | **Richiesta di cambio password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente comincia la richiesta di cambio password.
Flusso di eventi | <br/><ol><li>L’utente inserisce la sua vecchia password;<li>Il sistema controlla che la password corrisponda, ed invia una e-mail all’utente per attivare la effettuare il cambio.</ol>
Condizione di uscita | L’utente riceve l’e-mail di conferma del cambio password.
Eccezioni | L’utente non fornisce i dati corretti. Vai a UC_7.1.

##### UC_7.1: Utente non fornisce dati corretti
**Nome** | **Utente non fornisce dati corretti**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente richiede il cambio password.
Flusso di eventi | Il sistema afferma che la password fornita è sbagliata.
Condizione di uscita | Vai a UC_7.

##### UC_7.2: Conferma di cambio password
**Nome** | **Conferma di cambio password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente riceve una e-mail di conferma di cambio password.
Flusso di eventi | <br/><ol><li>L’utente segue le istruzioni della e-mail, e raggiunge il sito sulla pagina di conferma di cambio password. Deve inserire la nuova password due volte;<li>Il sistema applica i cambiamento nel database.</ol>
Condizione di uscita | La password dell’utente viene aggiornata.
Eccezioni | Se la nuova password non è valida, vai a UC_7.3.

##### UC_7.3: Verifica password corretta
**Nome** | **Verifica password corretta**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente prova a cambiare la password.
Flusso di eventi | Il sistema comunica che la password non è valida.
Condizione di uscita | Ripeti il caso UC_7.2.

##### UC_8: Richiede amicizia tra due account
**Nome** | **Richiedere amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dell’account a cui richiedere l’amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca su “Aggiungi agli amici”;<li>Moovie invia la richiesta al destinatario.</ol>
Condizione di uscita | L’utente riceve la conferma di invio dal sistema.

##### UC_8.1: Conferma amicizia tra due account
**Nome** | **Conferma amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto l’amicizia.
Flusso di eventi | <br/><ol><li> L’utente accetta la richiesta;<li>Il sistema attiva l’amicizia.</ol>
Condizione di uscita | Gli utenti sono diventati amici.

#### Gestione dei film guardati

##### UC_9: Aggiungere giudizio su un film aggiungendolo in “Film guardati”
**Nome** | **Aggiungere giudizio su un film aggiungendolo in “Film guardati”**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella scheda informativa del film.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di film guardato;<li>Moovie chiede l’inserimento di un giudizio sul film;<li>L’utente inserisce un giudizio;<li>Moovie aggiungerà il film (col voto relativo) alla lista “Film guardati”, e sarà in grado di suggerire meglio i film all’utente.</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

##### UC_10: Modificare giudizio su un film
**Nome** | **Modificare giudizio su un film**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei film guardati.
Flusso di eventi | <br/><ol><li>L’utente seleziona il giudizio da modificare;<li>Moovie richiede l’inserimento del nuovo giudizio sul film;<li>L’utente inserisce un nuovo giudizio;<li>Moovie modificherà il giudizio sul film presente nella lista “Film guardati”.</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

##### UC_11: Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)
**Nome** | **Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dei film guardati.
Flusso di eventi | <br/><ol><li>L’utente seleziona il giudizio da rimuovere;<li>Moovie rimuoverà il film (e il voto) dalla lista “Film guardati”.</ol>
Condizione di uscita | Il film verrà rimosso dai “Film guardati”.

#### Gestione delle liste

##### UC_12: Creare una lista
**Nome** | **Creare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina di creazione di una lista.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome della lista nel campo apposito;<li>L’utente sceglie i film che desidera inserire all’interno della propria lista;<li>L’utente sceglie la visibilità della propria lista (tutti, amici, solo io);<li>Il sistema crea la lista e notifica l’utente.</ol>
Condizione di uscita | La lista viene creata.
Eccezioni | L’utente non ha selezionato nessun film da inserire.<br/>L’utente ha inserito un nome già esistente tra le sue liste.

##### UC_13: Modificare una lista
**Nome** | **Modificare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina della sua lista da modificare.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nuovo nome della lista che vuole modificare;<li>L’utente modifica i privilegi della lista (tutti, amici, solo io);<li>Il sistema riceve le nuove informazioni, le applica alla lista (rifacendo il controllo di sicurezza) e invia una notifica di avvenuta modifica all’utente.</ol>
Condizione di uscita | La lista è stata modificata.

##### UC_14: Eliminare una lista
**Nome** | **Eliminare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina della sua lista da eliminare.
Flusso di eventi | <br/><ol><li>L’utente elimina la lista;<li>Il sistema cancella la lista.</ol>
Condizione di uscita | La lista viene cancellata.

##### UC_15: Aggiungere o rimuovere un film a una lista
**Nome** | **Aggiungere o rimuovere un film a una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente deve selezionare le liste in cui inserire un film, e deselezionare le liste in cui rimuovere un film tramite un popup.
Flusso di eventi | <br/><ol><li>L’utente seleziona le liste in cui inserire il film, e deseleziona le liste in cui rimuovere il film se già presente (quindi già selezionate);<li>Il sistema aggiunge il film alle liste selezionate, e rimuove il film dalle liste deselezionate.</ol>
Condizione di uscita | Il film viene aggiunto/rimosso dalle liste selezionate/deselezionate.

##### UC_16: Seguire liste altrui
**Nome** | **Seguire liste altrui**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sulla pagina di una lista altrui (che può visualizzare).
Flusso di eventi | <br/><ol><li>L’utente vede tutti i film contenuti nella lista e inizia a seguire la lista che ha scelto;<li>Il sistema verifica che l’utente abbia i privilegi per poterla seguire, e lo aggiunge alla liste dei seguaci.</ol>
Condizione di uscita | L’utente ha iniziato a seguire la lista desiderata.

#### Suggerimenti

##### UC_17: Suggerire un film a un account amico
**Nome** | **Suggerire un film a un account amico**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sulla pagina del film che vuole consigliare.
Flusso di eventi | <br/><ol><li>L’utente clicca su “Suggerisci”;<li>Il sistema presenta tutti gli amici a cui è possibile suggerire il film;<li>L’utente sceglie gli account a cui consigliare il film;<li>Il sistema invia il suggerimento agli utenti.</ol>
Condizione di uscita | Il film è stato suggerito.

##### UC_18: Suggerimento automatico di un film
**Nome** | **Suggerimento automatico di un film**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente è sul sito.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di suggerimento film;<li>Il sistema seleziona un film in linea con i gusti dell’utente.</ol>
Condizione di uscita | Il film selezionato verrà suggerito.

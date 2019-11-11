Identificativo | Descrizione | Priorità
---------------|-------------|---------
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

# Ricerca e consultazione

## UC_1: Ricerca di un film
**Nome** | **Ricerca di un film**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi |<br/><ol><li>L’utente inserisce il titolo, genere, attori partecipanti di un film;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona il film cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa del film cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa del film.
Eccezioni | Ricerca di un film fallita.

## UC_1.1: Ricerca di un film fallita
**Nome** | **Ricerca di un film fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un film non presente.
Flusso di eventi | Moovie non trova il film cercato.
Condizione di uscita | Moovie comunica che il film non è presente.

## UC_2: Ricerca di un artista
**Nome** | **Ricerca di un artista**
---------|---
Attori | Utente.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome di un artista;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona l’artista cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’artista cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’artista.

## UC_2.1: Ricerca di un artista fallita
**Nome** | **UC_2.1: Ricerca di un artista fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente cerca un artista non presente.
Flusso di eventi | Moovie non trova l’artista cercato.
Condizione di uscita | Moovie comunica che l’artista non è presente.

## UC_3: Ricerca di un utente
**Nome** | **Ricerca di un utente**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nell’area di ricerca.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome, cognome, e-mail (se visibile) di un utente;<li>Moovie elabora i dati inseriti e mostra il risultato della ricerca;<li>L’utente seleziona l’utente cercato;<li>Moovie reindirizza l’utente sulla pagina corrispondente alla scheda informativa dell’utente cercato.</ol>
Condizione di uscita | L’utente potrà visualizzare la scheda informativa dell’utente.
Eccezioni | Se l’utente cercato non è presente, vai a UC_3.1.

## UC_3.1: Utente non trovato
**Nome** | **Utente non trovato**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente cerca un altro utente non esistente.
Flusso di eventi | Moovie non trova l’account cercato.
Condizione di uscita | Moovie comunica che l’account non esiste.

## Gestione account

## UC_4: Creare un account
**Nome** | **Creare un account**
---------|---
Attori | Utente non registrato.
Condizione di entrata | L’utente si trova sulla pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail, password (due volte), e-mail utente che ha suggerito la registrazione (opzionale);<li>Il sistema controlla i dati, verifica che non ci siano account con l’indirizzo e-mail fornito, e salva i dati. Se è stato fornito anche l’indirizzo e-mail dell’account che ha suggerito la registrazione, e questo è il quinto account che lo fa, allora quell’account diventa account pro. Il sistema invierà in ogni caso una e-mail di attivazione dell’account.</ol>
Condizione di uscita | L’account viene creato.
Eccezioni | L’indirizzo e-mail fornito è occupato. Vai a UC_4.1.

## UC_4.1: Registrazione fallita
**Nome** | **Registrazione fallita**
---------|---
Attori | Utente non registrato.
Condizione di entrata | L’utente si trova nella pagina di registrazione.
Flusso di eventi | <br/><ol><li>L’utente inserisce i seguenti dati: nome, cognome, indirizzo e-mail, password (due volte), e-mail utente che ha suggerito la registrazione (opzionale);<li>Il sistema si accorge che uno dei campi inseriti non è valido e reindirizza l’utente verso la pagina di Registrazione.</ol>
Condizione di uscita | L’utente deve rifare il UC_4.

## UC_5: Attivare un account
**Nome** | **Attivare un account**
---------|---
Attori | Utente registrato ma non attivato.
Condizione di entrata | L’utente riceve la e-mail di attivazione.
Flusso di eventi | <br/><ol><li>L’utente segue le istruzioni della e-mail, e arriva sul sito;<li>Il sistema attiva l’account ed obbliga l’utente a effettuare i “primi passi”;<li>L’utente deve scegliere minimo 5 massimo 10 film che ha già guardato (con relativi voti, perché questi verranno messi nei “Film guardati”). Infine, conferma.<li>Il sistema allora inserisce i film selezionati nei Film guardati, sblocca l’account, e reindirizza l’utente nella Home Page.</ol>
Condizione di uscita | L’account verrà attivato.

## UC_6: Autenticare un account
**Nome** | **Autenticare un account**
---------|---
Attori | Utente.
Condizione di entrata | L’utente deve essere sulla pagina di Login
Flusso di eventi | <br/><ol><li>L’utente inserisce e-mail e password dell’account e prosegue;<li>Moovie verifica la correttezza dei dati inseriti e reindirizza l’utente.</ol>
Condizione di uscita | L’utente si trova autenticato nella pagina principale.
Eccezioni | Indirizzo e-mail o password non corretti. Vai a UC_6.1.<br/>L’utente non possiede un account. Vai a UC_4.1.

## UC_6.1: Autenticazione fallita
**Nome** | **Autenticazione fallita**
---------|---
Attori | Utente.
Condizione di entrata | L’utente ha inseriti i dati sbagliati nella pagina di login.
Flusso di eventi | Il sistema comunica che i dati sono sbagliati.
Condizione di uscita | L’utente deve rifare il caso d’uso UC_6.

## UC_7: Richiesta di cambio password
**Nome** | **Richiesta di cambio password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente comincia la richiesta di cambio password.
Flusso di eventi | <br/><ol><li>L’utente inserisce la sua vecchia password;<li>Il sistema controlla che la password corrisponda, ed invia una e-mail all’utente per attivare la effettuare il cambio.</ol>
Condizione di uscita | L’utente riceve l’e-mail di conferma del cambio password.
Eccezioni | L’utente non fornisce i dati corretti. Vai a UC_7.1.

## UC_7.1: Utente non fornisce dati corretti
**Nome** | **Utente non fornisce dati corretti**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente richiede il cambio password.
Flusso di eventi | Il sistema afferma che la password fornita è sbagliata.
Condizione di uscita | Vai a UC_7.

## UC_7.2: Conferma di cambio password
**Nome** | **Conferma di cambio password**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente riceve una e-mail di conferma di cambio password.
Flusso di eventi | <br/><ol><li>L’utente segue le istruzioni della e-mail, e raggiunge il sito sulla pagina di conferma di cambio password. Deve inserire la nuova password due volte;<li>Il sistema applica i cambiamento nel database.</ol>
Condizione di uscita | La password dell’utente viene aggiornata.
Eccezioni | Se la nuova password non è valida, vai a UC_7.3.

## UC_7.3: Verifica password corretta
**Nome** | **Verifica password corretta**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente prova a cambiare la password.
Flusso di eventi | Il sistema comunica che la password non è valida.
Condizione di uscita | Ripeti il caso UC_7.2.

## UC_8: Richiede amicizia tra due account
**Nome** | **Richiedere amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina dell’account a cui richiedere l’amicizia.
Flusso di eventi | <br/><ol><li>L’utente clicca su “Aggiungi agli amici”;<li>Moovie invia la richiesta al destinatario.</ol>
Condizione di uscita | L’utente riceve la conferma di invio dal sistema.

## UC_8.1: Conferma amicizia tra due account
**Nome** | **Conferma amicizia tra due account**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova sulla pagina dell’utente che ha richiesto l’amicizia.
Flusso di eventi | <br/><ol><li> L’utente accetta la richiesta;<li>Il sistema attiva l’amicizia.</ol>
Condizione di uscita | Gli utenti sono diventati amici.

# Gestione dei film guardati

## UC_9: Aggiungere giudizio su un film aggiungendolo in “Film guardati”
**Nome** | **Aggiungere giudizio su un film aggiungendolo in “Film guardati”**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella scheda informativa del film.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di film guardato;<li>Moovie chiede l’inserimento di un giudizio sul film;<li>L’utente inserisce un giudizio;<li>Moovie aggiungerà il film (col voto relativo) alla lista “Film guardati”, e sarà in grado di suggerire meglio i film all’utente.</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

## UC_10: Modificare giudizio su un film
**Nome** | **Modificare giudizio su un film**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina relativa alla scheda informativa del film.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di modifica giudizio;<li>Moovie richiede l’inserimento di un giudizio sul film;<li>L’utente inserisce un nuovo giudizio;<li>Moovie modificherà il giudizio sul film presente nella lista “Film guardati”.</ol>
Condizione di uscita | L’utente vedrà il proprio giudizio all’interno dei “Film guardati”.

## UC_11: Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)
**Nome** | **Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina relativa alla scheda informativa del film.
Flusso di eventi | <br/><ol><li>L’utente accede alla funzionalità di rimuovi giudizio;<li>Moovie rimuoverà il film (e il voto) dalla lista “Film guardati”.</ol>
Condizione di uscita | Il film verrà rimosso dai “Film guardati”.

# Gestione delle liste

## UC_12: Creare una lista
**Nome** | **Creare una lista**
---------|---
Attori | Utente autenticato.
Condizione di entrata | L’utente si trova nella pagina di creazione di una lista.
Flusso di eventi | <br/><ol><li>L’utente inserisce il nome della lista nel campo apposito;<li>L’utente sceglie i film che desidera inserire all’interno della propria lista;<li>L’utente sceglie la visibilità della propria lista (tutti, amici, solo io);<li>Il sistema crea la lista e notifica l’utente.</ol>
Condizione di uscita | La lista viene creata.
Eccezioni | L’utente non ha selezionato nessun film da inserire.<br/>L’utente ha inserito un nome già esistente tra le sue liste.

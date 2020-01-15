# Test Case Specifications
## Descrizione del documento 
In questo documento andremo ad illustrare le specifiche individuate per ogni caso di test analizzato nel documento di "Test Plan". Per ogni singola istanza dei vari Test Case delle funzionalità è stata realizzata una tabella che illustra in modo dettagliato varie informazioni che permettono di osservare il comportamento del test. 
In ogni tabella sono illustrati: 
- "TEST CASE ID" : identificativo (correlato con il documento di "Test Plan") che permette di distinguere le varie istanze di Test Cases
- "PRECONDIZIONI" : condizioni che devono essere soddisfatte prima che venga eseguito il caso di test
- "FLUSSO DI EVENTI": tutta la sequenza di operazioni che l'utente deve compiere per effettuare il test case
- "ORACOLO": L'output atteso dal Caso di Test 
## Test Case Specifications
### Test Cases Specification "Ricerca"
### 1.1 RicercaFilm 
Test Case ID | TC_1.1_1
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "film"<br/> 2. L'utente digita nell'area di ricerca il testo ""<br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra "Nessun risultato trovato"
-------
Test Case ID | TC_1.1_2
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "film"<br/> 2. L'utente digita nell'area di ricerca il testo "Bastardi senza gloria" <br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra il risultato ottenuto.
### 1.2 RicercaArtista
Test Case ID | TC_1.2_1
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "artista"<br/> 2. L'utente digita nell'area di ricerca il testo ""<br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra "Nessun risultato trovato"
-------
Test Case ID | TC_1.2_2
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "artista"<br/> 2. L'utente digita nell'area di ricerca il testo "Leonardo Di Caprio"<br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra il risultato ottenuto.
### 1.3 RicercaUtente
Test Case ID | TC_1.3_1|
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente vuole selezionare il filtro "utente", il quale non è presente dato che non è autenticato nel sito
**ORACOLO** | Il sistema non permette di effettuare la ricerca
-------
Test Case ID | TC_1.3_2
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "utente"<br/> 2. L'utente digita nell'area di ricerca il testo ""<br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra "Nessun risultato trovato"
---
Test Case ID | TC_1.3_3
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di ricerca<br/>
**FLUSSO DI EVENTI** | 1. L'utente ha selezionato il filtro "utente"<br/> 2. L'utente digita nell'area di ricerca il testo "Michelantonio Panichella"<br/> 3. L'utente clicca sul pulsante "Cerca"
**ORACOLO** | Il sistema mostra il risultato ottenuto.
---
### Test Cases Specification "Account"
### 2.1 CreareAccount 
Test Case ID | TC_2.1_1
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_2
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "######", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_3
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_4
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "######", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_5
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_6
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdigmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_7
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "gianluca.pirone9@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente, poichè la e-mail è occupata da un altro utente
-------
Test Case ID | TC_2.1_8
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_9
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_10
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area di registrazione
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Registrati"
**ORACOLO** | Il sistema esegue la registrazione dell'utente
-------
### 2.2 AutenticareAccount
Test Case ID | TC_2.2_1
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "g.", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi"
**ORACOLO** | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_2
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "g.verdigmail.com", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi" 
**ORACOLO** | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_3
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "gianluca.pirone9@gmail.com", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi" 
**ORACOLO** | Il sistema mostra "I dati non corrispondono"
-------
Test Case ID | TC_2.2_4
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "g.verdi@gmail.com", nel campo password "" <br/> 2. L'utente clicca sul pulsante "Accedi" 
**ORACOLO** | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_5
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "g.verdi@gmail.com", nel campo password "140899" <br/> 2. L'utente clicca sul pulsante "Accedi" 
**ORACOLO** | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_6
----|----
**PRECONDIZIONI** | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo email "g.verdi@gmail.com", nel campo password "140898" <br/> 2. L'utente clicca sul pulsante "Accedi" 
**ORACOLO** | Il sistema esegue il login dell'utente
-------
### 2.3 CambiarePassword
**Test Case ID** | TC_2.3_1
----|----
**PRECONDIZIONI** | 1. L'utente sta andando nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'area non è disponbile, dato che l'utente non è autenticato nel sito 
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_2.3_2
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "", nel campo Password Nuova "Verdi09".<br/> 2. L'utente clicca sul pulsante "Cambio Password"
**ORACOLO** | Il sistema comunica che i dati non sono validi
---------
**Test Case ID** | TC_2.3_3
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "140899", nel campo Password Nuova "Verdi09".<br/> 2. L'utente clicca sul pulsante "Cambio Password"
**ORACOLO** | Il sistema comunica che i dati non sono validi (la password vecchia non corrisponde)
---
**Test Case ID** | TC_2.3_4
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "140898", nel campo Password Nuova "".<br/> 2. L'utente clicca sul pulsante "Cambio Password"
**ORACOLO** | Il sistema comunica che i dati non sono validi
---
**Test Case ID** | TC_2.3_5
----|----
**PRECONDIZIONI** | 1. L'utente è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "140898", nel campo Password Nuova "Verdi09".<br/> 2. L'utente clicca sul pulsante "Cambio Password"
**ORACOLO** | Il sistema comunica che la password è stata aggiornata.
-------
### 3.1 InviareRichiestaAmicizia  
Test Case ID | TC_3.1_1  
----|----  
**PRECONDIZIONI** | 1. L'utente sta andando nella pagina di un altro utente a cui inviare la richiesta d'amicizia  
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
Test Case ID | TC_3.1_2  
----|----  
**PRECONDIZIONI** | 1. L'utente sta andando nella pagina di un altro utente a cui inviare la richiesta d'amicizia  
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile
**ORACOLO** | Il sistema mostra pagina non trovata 
-------
Test Case ID | TC_3.1_3  
----|----  
**PRECONDIZIONI** | 1. L'utente è sulla pagina di un altro utente a cui inviare la richiesta d'amicizia 
**FLUSSO DI EVENTI** | 1. L'utente clicca sul pulsante "Invia richiesta di amicizia"
**ORACOLO** | Il sistema invia la richiesta di amicizia, e mostra una pagina di "Richiesta di amicizia inviata"  
-------
### 3.2 AccettareRichiestaAmicizia  
Test Case ID | TC_3.2_1  
----|----  
**PRECONDIZIONI** | 1. L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
Test Case ID | TC_3.2_2
----|----  
**PRECONDIZIONI** | 1. L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile
**ORACOLO** | Il sistema mostra pagina non trovata
-------
Test Case ID | TC_3.2_3  
----|----  
**PRECONDIZIONI** | 1. L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia  
**FLUSSO DI EVENTI** | 1. L'utente clicca sul pulsante "Accetta richiesta di amicizia"
**ORACOLO** | Il sistema crea l'amicizia, e mostra una pagina di "Richiesta di amicizia accettata"  
-------
### 3.3 RifiutareRichiestaAmicizia  
Test Case ID | TC_3.3_1  
----|----  
**PRECONDIZIONI** | 1. L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
Test Case ID | TC_3.3_2
----|----  
**PRECONDIZIONI** | 1. L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile
**ORACOLO** | Il sistema mostra pagina non trovata
-------
Test Case ID | TC_3.3_3  
----|----  
**PRECONDIZIONI** | 1. L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia  
**FLUSSO DI EVENTI** | 1. L'utente clicca sul pulsante "Rifiuta richiesta di amicizia"
**ORACOLO** |  Il sistema rifiuta l'amicizia richiesta, e mostra una pagina di "Richiesta di amicizia rifiutata"
-------
### Test Cases Specification "Film"
### 4.1 AggiungereGiudizio
**Test Case ID** | TC_4.1_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_4.1_2
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente seleziona un valore minore di 1<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non permette di aggiungere il giudizio
-------
**Test Case ID** | TC_4.1_3
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che il film non è presente nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
---
**Test Case ID** | TC_4.1_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente seleziona come valore "8"<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema assegna il voto al film
---
### 4.2 ModificareGiudizio
**Test Case ID** | TC_4.2_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di modifica di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_4.2_2
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di modifica di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente seleziona un valore minore di 1<br/> 2. L'utente clicca sul pulsante "Modifica"
**ORACOLO** | Il sistema non permette di modificare il giudizio
-------
**Test Case ID** | TC_4.2_3
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di modifica di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che il film non è presente nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
---
**Test Case ID** | TC_4.2_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di modifica di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente seleziona come valore "10"<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema assegna il voto al film
---
### 4.3 RimuovereGiudizio
**Test Case ID** | TC_4.3_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di rimozione di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_4.3_2
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di rimozione di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente non può rimuovere il giudizio, dato che non è stato aggiunto in precedenza
**ORACOLO** | Il sistema non permette di rimuovere il giudizio
-------
**Test Case ID** | TC_4.3_3
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di rimozione di un giudizio a un determinato film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che il film non è presente nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
---
**Test Case ID** | TC_4.3_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di rimozione di un giudizio del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente clicca sul pulsante "Drop"
**ORACOLO** | Il sistema rimuove il voto al film
---
### Test Cases Specification "Gestione"
### 5.1 AggiungereFilm
**Test Case ID** | TC_5.1_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.1_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.1_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "####", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_5
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "192", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_6
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Fa", nel campo copertina "copertina.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_7
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg"(size: maggiore di quella consentita) <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_8
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_9
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.gif" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il film
-------
**Test Case ID** | TC_5.1_10
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un film
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema aggiunge il film
-------
### 5.2 AggiungereArtista
**Test Case ID** | TC_5.2_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.2_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.2_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "", nel campo nascita "10-10-1949", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "####", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_5
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "10-10-1949", nel campo descrizione "Fa", nel campo faccia "faccia.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_6
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "10-10-1949", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg"(size: maggiore di quella consentita) <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_7
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "10-10-1949", nel campo descrizione "Famoso attore di cinema", nel campo faccia "" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_8
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "10-10-1949", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.gif" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge l'artista
-------
**Test Case ID** | TC_5.2_9
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un artista
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "10-10-1949", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg" <br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema aggiunge l'artista
-------
### 5.3 AggiungereGenere
**Test Case ID** | TC_5.3_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.3_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiunta di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.3_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo ""<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il genere
-------
**Test Case ID** | TC_5.3_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Drammatico"<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema non aggiunge il genere
-------
**Test Case ID** | TC_5.3_5
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiunta di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Mitologico"<br/> 2. L'utente clicca sul pulsante "Aggiungi"
**ORACOLO** | Il sistema aggiunge il genere
### 5.4 ModificareGenere
**Test Case ID** | TC_5.4_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di modifica di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.4_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di modifica di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.4_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di modifica di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo ""<br/> 2. L'utente clicca sul pulsante "Modifica"
**ORACOLO** | Il sistema non modifica il genere
-------
**Test Case ID** | TC_5.4_4
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di modifica di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Drammatico"<br/> 2. L'utente clicca sul pulsante "Modifica"
**ORACOLO** | Il sistema non modifica il film
-------
**Test Case ID** | TC_5.4_5
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di modifica di un genere
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo nome il testo "Investigativo"<br/> 2. L'utente clicca sul pulsante "Modifica"
**ORACOLO** | Il sistema modifica il genere
### 5.5 RimuovereGenere
**Test Case ID** | TC_5.5_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di rimozione di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.5_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di rimozione di un genere
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.5_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di rimozione di un genere del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente clicca sul pulsante "Drop"
**ORACOLO** | Il sistema rimuove il genere

### 5.6 AggiornareGeneriFilm
**Test Case ID** | TC_5.6_1
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiornamento dei generi di un film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.6_2
----|----
**PRECONDIZIONI** | 1. L’utente sta andando nell'area di aggiornamento dei generi di un film
**FLUSSO DI EVENTI** | 1. La pagina non è disponibile, dato che l'utente non è gestore del sito
**ORACOLO** | Il sistema mostra pagina non trovata
-------
**Test Case ID** | TC_5.6_3
----|----
**PRECONDIZIONI** | 1. L’utente è nell'area di aggiornamento dei generi del film "Bastardi senza Gloria"
**FLUSSO DI EVENTI** | 1. L'utente seleziona i generi "Storico" e "Biografico"<br/> 2. L'utente clicca sul pulsante "Aggiorna"
**ORACOLO** | Il sistema aggiorna i generi del film
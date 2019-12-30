# Test Case Specifications 
## Descrizione del documento 
In questo documento andremo ad illustrare le specifiche individuate per ogni caso di test analizzato nel documento di "Test Plan". Per ogni singola istanza dei vari Test Case delle funzionalità è stata realizzata una tabella che illustra in modo dettagliato varie informazioni che permettono di osservare il comportamento del test. 
In ogni tabella sono illustrati: 
- "TEST CASE ID" : identificativo (correlato con il documento di "Test Plan") che permette di distinguere le varie istanze di Test Cases
- "PRECONDIZIONI" : condizioni che devono essere soddisfatte prima che venga eseguito il caso di test
- "FLUSSO DI EVENTI": tutta la sequenza di operazioni che l'utente deve compiere per effettuare il test case
- "ORACOLO": L'output atteso dal Caso di Test 
## Test Case Specifications
### Test Cases Specification "Ricerche"
### 1.1 RicercaFilm 
Test Case ID | TC_1.1_1
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "film"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra "Nessun risultato trovato"
-------
Test Case ID | TC_1.1_2
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "film"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "Bastardi senza gloria"  <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra il risultato ottenuto.
### 1.2 RicercaArtista
Test Case ID | TC_1.2_1
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "artista"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra "Nessun risultato trovato"
-------
Test Case ID | TC_1.2_2
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "artista"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "Leonardo DiCaprio"  <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra il risultato ottenuto.
### 1.2 RicercaUtente
Test Case ID | TC_1.2_1|
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "utente"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra "Nessun risultato trovato"
-------
Test Case ID | TC_1.2_2
----|----
PRECONDIZIONI | 1. L'utente è nell'area di ricerca <br/> 2. L'utente ha selezionato il filtro "utente"
FLUSSO DI EVENTI | 1. L'utente digita nell'area di ricerca il testo "Leonardo Di Caprio"  <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema mostra il risultato ottenuto.
---
### Test Cases Specification "Accounts"
### 2.1 CreareAccount 
Test Case ID | TC_2.1_1
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "", nel campo cognome "Panichella", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_2
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "######", nel campo cognome "Panichella", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_3
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_4
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "######", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_5
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "Panichella", nel campo email "", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_6
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "Panichella", nel campo email "michelantoniopanichellagmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_7
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "Panichella", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_8
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "Panichella", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
Test Case ID | TC_2.1_9
----|----
PRECONDIZIONI | 1. L'utente è area di registrazione
FLUSSO DI EVENTI | 1. L'utente digita nel campo nome il testo "Michelantonio", nel campo cognome "Panichella", nel campo email "michelantoniopanichella@gmail.com", nel campo passwors "140898", nel campo copassword "140898" <br/> 2. L'utente clicca sul pulsante "Cerca"
ORACOLO | Il sistema non esegue la registrazione dell'utente
-------
### 2.2 AutenticareAccount
Test Case ID | TC_2.2_1
----|----
PRECONDIZIONI | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
FLUSSO DI EVENTI | 1. L'utente digita nel campo email "mich", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi"
ORACOLO | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_2
----|----
PRECONDIZIONI | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
FLUSSO DI EVENTI | 1. L'utente digita nel campo email "michelantoniopanichellagmail.com", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi" 
ORACOLO | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_3
----|----
PRECONDIZIONI | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
FLUSSO DI EVENTI | 1. L'utente digita nel campo email "michelantoniopanichella@gmail.com", nel campo password "" <br/> 2. L'utente clicca sul pulsande "Accedi" 
ORACOLO | Il sistema non esegue il login dell'utente
-------
Test Case ID | TC_2.2_4
----|----
PRECONDIZIONI | 1. L'utente è sulla pagina di accesso di "Moovie" <br/> 2. L'utente possiede un proprio account
FLUSSO DI EVENTI | 1. L'utente digita nel campo email "michelantoniopanichella@gmail.com", nel campo password "140898" <br/> 2. L'utente clicca sul pulsande "Accedi" 
ORACOLO | Il sistema esegue il login dell'utente
-------
### 2.3 CambiarePassword
**Test Case ID** | TC_2.3_1
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "", nel campo Password Nuova "Gianluca".<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema comunica che i dati non sono validi
-------
**Test Case ID** | TC_2.3_2
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "gianluca", nel campo Password Nuova "Luca".<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema comunica che i dati non sono validi
---------
**Test Case ID** | TC_2.3_3
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "gianluca1", nel campo Password Nuova "Luca".<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema comunica che i dati non sono validi(la password vecchia non corrisponde)
---
**Test Case ID** | TC_2.3_4
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "gianluca", nel campo Password Nuova "Gianluca".<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema comunica che i dati non sono validi
---
**Test Case ID** | TC_2.3_5
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per cambiare la propria password
**FLUSSO DI EVENTI** | 1. L'utente digita nel campo Password Vecchia il testo "gianluca", nel campo Password Nuova "Gianluca".<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema comunica che la password è stata aggiornata.
-------
### 3.1 InviareRichiestaAmicizia  
Test Case ID | TC_3.1_1  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina dell'amico a cui inviare l'amicizia  
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Richiedi Amicizia" <br/> 2. Il sistema si accorge che l'utente non è loggato
ORACOLO | Il sistema non invia la richiesta di amicizia  
-------
Test Case ID | TC_3.1_2  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina dell'amico a cui inviare l'amicizia  
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Richiedi Amicizia" <br/> 2. Il sistema si accorge che l'utente a cui si sta cercando di inviare l'amicizia non esiste
ORACOLO | Il sistema non invia la richiesta di amicizia  
-------
Test Case ID | TC_3.1_3  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina dell'amico a cui inviare l'amicizia  
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Richiedi Amicizia"
ORACOLO | Il sistema invia la richiesta di amicizia  
-------
### 3.2 AccettareRichiestaAmicizia  
Test Case ID | TC_3.2_1  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Accetta richiesta di amicizia" <br/> 2. Il sistema si accorge che l'utente non è loggato
ORACOLO | Il sistema non crea l'amicizia
-------
Test Case ID | TC_3.2_2
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Accetta richiesta di amicizia" <br/> 2. Il sistema si accorge che l'utente che hai inviato l'amicizia non esiste
ORACOLO | Il sistema non crea l'amicizia
-------
Test Case ID | TC_3.2_3  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie  
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Accetta richiesta di amicizia"
ORACOLO |  Il sistema crea l'amicizia  
-------
### 3.3 RifiutareRichiestaAmicizia  
Test Case ID | TC_3.3_1  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Rifiuya richiesta di amicizia" <br/> 2. Il sistema si accorge che l'utente non è loggato
ORACOLO | Il sistema non rifiuta l'amicizia richiesta
-------
Test Case ID | TC_3.3_2
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Rifiuta richiesta di amicizia" <br/> 2. Il sistema si accorge che l'utente che hai inviato l'amicizia non esiste
ORACOLO | Il sistema non rifiuta l'amicizia richiesta
-------
Test Case ID | TC_3.3_3  
----|----  
PRECONDIZIONI | 1. L'utente è sulla pagina delle delle amicizie  
FLUSSO DI EVENTI | 1. L'utente clicca sul pulsante "Rifiuta richiesta di amicizia"
ORACOLO |  Il sistema rifiuta l'amicizia richiesta  
-------
### Test Cases Specification "Film"
### 4.1 AggiungereGiudizio
**Test Case ID** | TC_4.1_1
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per aggiungere un giudizio ad un film
**FLUSSO DI EVENTI** | 1. L'utente non seleziona nessun voto possibile al film "Bastardi senza gloria" che non è presente in film guardati.<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema non assegna nessun voto al film, il quale non è aggiunto in film guardati.
-------
**Test Case ID** | TC_4.1_2
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per aggiungere un giudizio ad un film
**FLUSSO DI EVENTI** | 1. L'utente seleziona "8" come voto al film "Bastardi senza gloria" che è non presente in film guardati.<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema assegna il voto al film, il quale è aggiunto in film guardati.
---
### 4.2 ModificareGiudizio
**Test Case ID** | TC_4.2_1
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per modificare un giudizio ad un film
**FLUSSO DI EVENTI** | 1. L'utente non seleziona nessun voto possibile al film "Bastardi senza gloria" che è presente in film guardati.<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema non modifica il voto al film.
-------
**Test Case ID** | TC_4.2_2
----|----
**PRECONDIZIONI** | 1. L'utente è loggato, ed è nell'area apposita per modificare un giudizio ad un film
**FLUSSO DI EVENTI** | 1. L'utente seleziona "8" come voto al film "Bastardi senza gloria" che è non presente in film guardati.<br/> 2. L'utente clicca sul pulsante "Applica"
**ORACOLO** | Il sistema assegna il  nuovo voto al film.
---

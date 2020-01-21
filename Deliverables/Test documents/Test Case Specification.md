# Test Case Specification
| Versione |    Data    | Descrizione                    | Autori                   |
|----------|------------|--------------------------------|--------------------------|
| 0.1      | 12/12/2019 | Prima stesura                  | Michelantonio Panichella |
| 0.2      | 9/1/2020   | Aggiornamento sottosistemi     | Gianluca Pirone          |
| 0.3      | 16/1/2020  | Riformulazione test cases      | Umberto Loria            |
| 0.4      | 19/1/2020  | Esecuzione test                | Team                     |

# Indice
1. [Descrizione del documento](#descrizione-del-documento)
1. [Test Case Specifications](#test-case-specifications)
    1. [Ricerca](#ricerca)
        1. [1.1 RicercaFilm](#11-ricercafilm)
        2. [1.2 RicercaArtista](#12-ricercaartista)
        3. [1.3 RicercaUtente](#13-ricercautente)
    2. [Account](#account)
        1. [2.1 CreareAccount](#21-creareaccount)
        2. [2.2 AutenticareAccount](#22-autenticareaccount)
        3. [2.3 CambiarePassword](#23-cambiarepassword)
    3. [Amicizia](#amicizia)
        1. [3.1 InviareRichiestaAmicizia](#31-inviarerichiestaamicizia)
        2. [3.2 AccettareRichiestaAmicizia](#32-accettarerichiestaamicizia)
        3. [3.3 RifiutareRichiestaAmicizia](#33-rifiutarerichiestaamicizia)
    4. [Film](#film)
        1. [4.1 AggiungereGiudizio](#41-aggiungeregiudizio)
        2. [4.2 ModificareGiudizio](#42-modificaregiudizio)
        3. [4.3 RimuovereGiudizio](#43-rimuoveregiudizio)
    5. [Gestione](#gestione)
        1. [5.1 AggiungereFilm](#51-aggiungerefilm)
        2. [5.2 AggiungereArtista](#52-aggiungereartista)
        3. [5.3 AggiungereGenere](#53-aggiungeregenere)
        4. [5.4 ModificareGenere](#54-modificaregenere)
        5. [5.5 RimuovereGenere](#55-rimuoveregenere)
        6. [5.6 AggiornareGeneriFilm](#56-aggiornaregenerifilm)

# Descrizione del documento
Questo documento illustra le specifiche individuate per ogni caso di test contemplato nel documento di Test Plan.
Per ogni istanza dei vari test case, è stata realizzata una tabella che ne illustra in dettaglio il comportamento.
In ogni tabella sono illustrati:

* Test Case ID: identificativo (correlato con il documento di Test Plan) che identifica le varie istanze di test case
* Precondizioni: condizioni che devono essere soddisfatte prima che venga eseguito il test case
* Flusso di eventi: la sequenza di operazioni che devono essere compiute per realizzare il test case
* Oracolo: output atteso dal test case

# Test Case Specifications

## Ricerca

### 1.1 RicercaFilm

Test Case ID         | TC_1_1_1
---------------------|---------
**Precondizione**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "film"<li>L'utente digita "" nel campo di ricerca<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.

Test Case ID         | TC_1_1_2
---------------------|---------
**Precondizione**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "film"<li>L'utente digita nell'area di ricerca il testo "Bastardi senza gloria"<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | Il sistema mostra il film "Bastardi senza gloria" tra i risultati di ricerca.

### 1.2 RicercaArtista

Test Case ID         | TC_1_2_1
---------------------|---------
**Precondizioni**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "artisti"<li>L'utente digita "" nel campo di ricerca<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.

Test Case ID         | TC_1_2_2
---------------------|---------
**Precondizioni**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "artisti"<li>L'utente digita nell'area di ricerca il testo "Leonardo DiCaprio"<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | Il sistema mostra il film "Leonardo DiCaprio" tra i risultati di ricerca.

### 1.3 RicercaUtente

Test Case ID         | TC_1_3_1
---------------------|---------
**Precondizioni**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | L'utente vuole selezionare il filtro "utente", che però non è presente dato che non è autenticato.
**Oracolo**          | Il sistema non permette di effettuare la ricerca.

Test Case ID         | TC_1_3_2
---------------------|---------
**Precondizioni**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "utenti"<li>L'utente digita "" nel campo di ricerca<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.

Test Case ID         | TC_1_3_3
---------------------|---------
**Precondizioni**    | L'utente è nell'area di ricerca.
**Flusso di eventi** | <br/><ol><li>L'utente ha selezionato il filtro "utenti"<li>L'utente digita nell'area di ricerca il testo "Michelantonio Panichella"<li>L'utente clicca sul pulsante di ricerca</ol>
**Oracolo**          | Il sistema mostra il film "Michelantonio Panichella" tra i risultati di ricerca.

## Account

### 2.1 CreareAccount

Test Case ID         | TC_2_1_1
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_2
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "######", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_3
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_4
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "######", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_5
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_6
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdigmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_7
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "gianluca.pirone9@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente, poichè la e-mail è occupata da un altro utente.

Test Case ID         | TC_2_1_8
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_9
---------------------|---------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword ""<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.

Test Case ID         | TC_2_1_10
---------------------|----------
**Precondizioni**    | L'utente è nell'area di registrazione.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Giuseppe", nel campo cognome "Verdi", nel campo email "g.verdi@gmail.com", nel campo password "140898", nel campo copassword "140898"<li>L'utente clicca sul pulsante "Registrati"</ol>
**Oracolo**          | Il sistema esegue la registrazione dell'utente.

### 2.2 AutenticareAccount
Test Case ID         | TC_2_2_1
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "g.", nel campo password "140898"<li>L'utente clicca sul pulsande "Accedi"</ol>
**Oracolo**          | Il sistema non esegue il login dell'utente.

Test Case ID         | TC_2_2_2
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "g.verdigmail.com", nel campo password "140898"<li>L'utente clicca sul pulsande "Accedi"</ol>
**Oracolo**          | Il sistema non esegue il login dell'utente.

Test Case ID         | TC_2_2_3
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "gianluca.pirone9@gmail.com", nel campo password "140898"<li>L'utente clicca sul pulsande "Accedi"</ol>
**Oracolo**          | Il sistema mostra "I dati non corrispondono".

Test Case ID         | TC_2_2_4
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "g.verdi@gmail.com", nel campo password ""<li>L'utente clicca sul pulsante "Accedi"</ol>
**Oracolo**          | Il sistema non esegue il login dell'utente.

Test Case ID         | TC_2_2_5
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "g.verdi@gmail.com", nel campo password "140899"<li>L'utente clicca sul pulsante "Accedi"</ol>
**Oracolo**          | Il sistema non esegue il login dell'utente.

Test Case ID         | TC_2_2_6
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di accesso di "Moovie".<br/>L'utente possiede un proprio account.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo email "g.verdi@gmail.com", nel campo password "140898"<li>L'utente clicca sul pulsante "Accedi"</ol>
**Oracolo**          | Il sistema esegue il login dell'utente.

### 2.3 CambiarePassword
**Test Case ID**     | TC_2_3_1
---------------------|---------
**Precondizioni**    | L'utente sta andando nell'area apposita per cambiare la propria password.
**Flusso di eventi** | L'area non è disponbile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_2_3_2
---------------------|---------
**Precondizioni**    | L'utente è nell'area apposita per cambiare la propria password.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo Password Vecchia il testo "", nel campo Password Nuova "Verdi09".<li>L'utente clicca sul pulsante "Cambio Password"</ol>
**Oracolo**          | Il sistema comunica che i dati non sono validi.

**Test Case ID**     | TC_2_3_3
---------------------|---------
**Precondizioni**    | L'utente è nell'area apposita per cambiare la propria password.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo Password Vecchia il testo "140899", nel campo Password Nuova "Verdi09".<li>L'utente clicca sul pulsante "Cambio Password"</ol>
**Oracolo**          | Il sistema comunica che i dati non sono validi (la password vecchia non corrisponde).

**Test Case ID**     | TC_2_3_4
---------------------|---------
**Precondizioni**    | L'utente è nell'area apposita per cambiare la propria password.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo Password Vecchia il testo "140898", nel campo Password Nuova "".<li>L'utente clicca sul pulsante "Cambio Password"</ol>
**Oracolo**          | Il sistema comunica che i dati non sono validi.

**Test Case ID**     | TC_2_3_5
---------------------|---------
**Precondizioni**    | L'utente è nell'area apposita per cambiare la propria password.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo Password Vecchia il testo "140898", nel campo Password Nuova "Verdi09".<li>L'utente clicca sul pulsante "Cambio Password"</ol>
**Oracolo**          | Il sistema comunica che la password è stata aggiornata..

## Amicizia

### 3.1 InviareRichiestaAmicizia
Test Case ID         | TC_3_1_1
---------------------|---------
**Precondizioni**    | L'utente sta andando nella pagina di un altro utente a cui inviare la richiesta d'amicizia.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_1_2
---------------------|---------
**Precondizioni**    | L'utente sta andando nella pagina di un altro utente a cui inviare la richiesta d'amicizia.
**Flusso di eventi** | La pagina non è disponibile.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_1_3
---------------------|---------
**Precondizioni**    | L'utente è sulla pagina di un altro utente a cui inviare la richiesta d'amicizia.
**Flusso di eventi** | L'utente clicca sul pulsante "Invia richiesta di amicizia".
**Oracolo**          | Il sistema invia la richiesta di amicizia, e mostra una pagina di "Richiesta di amicizia inviata".

### 3.2 AccettareRichiestaAmicizia
Test Case ID         | TC_3_2_1
---------------------|---------
**Precondizioni**    | L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_2_2
---------------------|---------
**Precondizioni**    | L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | La pagina non è disponibile.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_2_3
---------------------|---------
**Precondizioni**    | L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | L'utente clicca sul pulsante "Accetta richiesta di amicizia".
**Oracolo**          | Il sistema crea l'amicizia, e mostra una pagina di "Richiesta di amicizia accettata".

### 3.3 RifiutareRichiestaAmicizia
Test Case ID         | TC_3_3_1
---------------------|---------
**Precondizioni**    | L'utente sta andando nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_3_2
---------------------|---------
**Precondizioni**    | L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | La pagina non è disponibile.
**Oracolo**          | Il sistema mostra pagina non trovata.

Test Case ID         | TC_3_3_3
---------------------|---------
**Precondizioni**    | L'utente è nella pagina di un altro utente, che ha richiesto la sua amicizia.
**Flusso di eventi** | L'utente clicca sul pulsante "Rifiuta richiesta di amicizia".
**Oracolo**          |  Il sistema rifiuta l'amicizia richiesta, e mostra una pagina di "Richiesta di amicizia rifiutata".
## Film

### 4.1 AggiungereGiudizio
**Test Case ID**     | TC_4_1_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_1_2
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | <br/><ol><li>L'utente seleziona un valore minore di 1<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non permette di aggiungere il giudizio.

**Test Case ID**     | TC_4_1_3
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che il film non è presente nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_1_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | <br/><ol><li>L'utente seleziona come valore "8"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema assegna il voto al film.

### 4.2 ModificareGiudizio
**Test Case ID**     | TC_4_2_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di modifica di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_2_2
---------------------|---------
**Precondizioni**    | L’utente è nell'area di modifica di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | <br/><ol><li>L'utente seleziona un valore minore di 1<li>L'utente clicca sul pulsante "Modifica"</ol>
**Oracolo**          | Il sistema non permette di modificare il giudizio.

**Test Case ID**     | TC_4_2_3
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di modifica di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che il film non è presente nel sito
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_2_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di modifica di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | <br/><ol><li>L'utente seleziona come valore "10"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema assegna il voto al film.

### 4.3 RimuovereGiudizio
**Test Case ID**     | TC_4_3_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di rimozione di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_3_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di rimozione di un giudizio a un determinato film.
**Flusso di eventi** | La pagina non è disponibile, dato che il film non è presente nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_4_3_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di rimozione di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | L'utente clicca sul pulsante "Drop".
**Oracolo**          | Il sistema rimuove il voto al film.

**Test Case ID**     | TC_4_3_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di rimozione di un giudizio del film "Bastardi senza gloria".
**Flusso di eventi** | L'utente non può rimuovere il giudizio, dato che non è stato aggiunto in precedenza.
**Oracolo**          | Il sistema non permette di rimuovere il giudizio.

## Gestione

### 5.1 AggiungereFilm
**Test Case ID**     | TC_5_1_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_1_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_1_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il film.

**Test Case ID**     | TC_5_1_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "####", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il film.

**Test Case ID**     | TC_5_1_5
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "192", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il film.

**Test Case ID**     | TC_5_1_6
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Fa", nel campo copertina "copertina.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il film.

**Test Case ID**     | TC_5_1_7
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina ""<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il film.

**Test Case ID**     | TC_5_1_8
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un film.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo titolo il testo "L'ultimo dei mohicani", nel campo durata "140", nel campo anno "1992", nel campo Descrizione "Famoso film drammatico", nel campo copertina "copertina.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema aggiunge il film.

### 5.2 AggiungereArtista
**Test Case ID**     | TC_5_2_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un artista.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_2_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un artista.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_2_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un artista.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "", nel campo nascita "9-6-1963", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge l'artista.

**Test Case ID**     | TC_5_2_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un artista.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "####", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge l'artista.

**Test Case ID**     | TC_5_2_5
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un artista.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "9-6-1963", nel campo descrizione "Fa", nel campo faccia "faccia.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge l'artista.

**Test Case ID**     | TC_5_2_6
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un artista.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "9-6-1963", nel campo descrizione "Famoso attore di cinema", nel campo faccia ""<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge l'artista.

**Test Case ID**     | TC_5_2_7
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un artista.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Johnny Depp", nel campo nascita "9-6-1963", nel campo descrizione "Famoso attore di cinema", nel campo faccia "faccia.jpg"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema aggiunge l'artista.

### 5.3 AggiungereGenere
**Test Case ID**     | TC_5_3_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_3_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiunta di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_3_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo ""<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il genere.

**Test Case ID**     | TC_5_3_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Drammatico"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema non aggiunge il genere perché il genere "Drammatico" esiste già.

**Test Case ID**     | TC_5_3_5
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiunta di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Inesistente"<li>L'utente clicca sul pulsante "Aggiungi"</ol>
**Oracolo**          | Il sistema aggiunge il genere.

### 5.4 ModificareGenere
**Test Case ID**     | TC_5_4_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di modifica di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_4_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di modifica di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_4_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di modifica di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo ""<li>L'utente clicca sul pulsante "Modifica"</ol>
**Oracolo**          | Il sistema non modifica il genere.

**Test Case ID**     | TC_5_4_4
---------------------|---------
**Precondizioni**    | L’utente è nell'area di modifica di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Drammatico"<li>L'utente clicca sul pulsante "Modifica"</ol>
**Oracolo**          | Il sistema non modifica il genere perché il genere "Drammatico" esiste già.

**Test Case ID**     | TC_5_4_5
---------------------|---------
**Precondizioni**    | L’utente è nell'area di modifica di un genere.
**Flusso di eventi** | <br/><ol><li>L'utente digita nel campo nome il testo "Impensabile"<li>L'utente clicca sul pulsante "Modifica"</ol>
**Oracolo**          | Il sistema modifica il genere.

### 5.5 RimuovereGenere
**Test Case ID**     | TC_5_5_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di rimozione di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_5_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di rimozione di un genere.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_5_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di rimozione di un genere del film "Bastardi senza gloria".
**Flusso di eventi** | L'utente clicca sul pulsante "rimuovi".
**Oracolo**          | Il sistema rimuove il genere.

### 5.6 AggiornareGeneriFilm
**Test Case ID**     | TC_5_6_1
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiornamento dei generi di un film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è autenticato nel sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_6_2
---------------------|---------
**Precondizioni**    | L’utente sta andando nell'area di aggiornamento dei generi di un film.
**Flusso di eventi** | La pagina non è disponibile, dato che l'utente non è gestore del sito.
**Oracolo**          | Il sistema mostra pagina non trovata.

**Test Case ID**     | TC_5_6_3
---------------------|---------
**Precondizioni**    | L’utente è nell'area di aggiornamento dei generi del film "Bastardi senza gloria".
**Flusso di eventi** | <br/><ol><li>L'utente seleziona i generi "Storico" e "Biografico"<li>L'utente clicca sul pulsante "Aggiorna"</ol>
**Oracolo**          | Il sistema aggiorna i generi del film.
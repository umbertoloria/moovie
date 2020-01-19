# Test Execution Report

## Introduzione 
In questo documento andremo a descrivere in modo più dettagliato ogni caso di test, non fermandoci soltanto alla 
specifica dell'elemento testato ma andando ad aggiungere dettagli sulla sua esecuzione.Per ogni Test Case andremo 
ad illustrare il suo nome (in relazione con i documenti di Test Plan e di Test Specification), l'oracolo, la data 
in cui il test è stato effettuato, le eventuali anomalie riscontratee in che tipo di test è stato coinvolto (Unità, 
Integrazione, Sistema). L'attività di testing avrà sucesso solamente se riscontreremo anomalie e quindi discostamento 
da quello che è l'oracolo per ogni caso di test presente nel documento di Test Specificazion, pertanto, il risultato 
inserito nel Test Execution avrà esito “Passed” se l'output del Test è conforme all'output atteso, “Failed” in caso 
negativo.

## Relazione con gli altri documenti 
Le funzionalità da testare sono le stesse indicate negli altri documenti, pertanto, faremo riferimento a:
- Documento di Test Plan;
- Documento di Test Case Specification;
- Documento di Test Log.

## Test Eseguiti 
I test che sono stati scelti per il Testing sono quelli concordati con gli altri membri del team.
Dato che sono stati fatti vari tipi di testing che sono test di unità (in cui abbiamo testatato singolarmente le 
componenti del nostro sito), test di itegrazione (in cui le varie componenti prima testate sono sate testatate insieme) 
e test di sistema (in cui si è testato il sito interfacciandoci con esso), si è deciso di riportare in questo documento,
l'esecuzioni di ognuno di essi andando a specifare per ogni test case in quale tipo di testing è stato coinvolto.
Per quanto riguarda il testing di Unità dei DAO invece Le componenti che sono state testate sono le seguenti e le 
specifiche sull'output ottenuto sono conetnute all'interno del documento di Test Log.
- DBAccountDAO; 
- DBAmiciziaDAO;
- DBArtistaDAO;
- DBFilmDAO;
- DBGenereDAO;
- DBGiudizioDAO;

## Test Execution 
Qui sono sono riportate tutte le esecuzioni dei casi di test elencati nel test plan e nel test case specification 
evidenziando, per ogni caso di test sia eventuali anomalie riscontrate sia (attraverso il campo della tabella "Test", 
in che tipo di testing sono stati coinvolti.

### Ricerca

#### 1.1 RicercaFilm

Test Case ID         | TC_1_1_1
---------------------|---------
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_1_1_2
---------------------|---------
**Oracolo**          | Il sistema mostra il film "Bastardi senza gloria" tra i risultati di ricerca.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

#### 1.2 RicercaArtista

Test Case ID         | TC_1_2_1
---------------------|---------
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_1_2_2
---------------------|---------
**Oracolo**          | Il sistema mostra il film "Leonardo DiCaprio" tra i risultati di ricerca.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 1.3 RicercaUtente

Test Case ID         | TC_1_3_1
---------------------|---------
**Oracolo**          | Il sistema non permette di effettuare la ricerca.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_1_3_2
---------------------|---------
**Oracolo**          | La ricerca non avviene perché il campo di ricerca è vuoto.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_1_3_3
---------------------|---------
**Oracolo**          | Il sistema mostra il film "Michelantonio Panichella" tra i risultati di ricerca.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

### Account

#### 2.1 CreareAccount

Test Case ID         | TC_2_1_1
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_2
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_3
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_4
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_5
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_6
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_7
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente, poichè la e-mail è occupata da un altro utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_8
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_9
---------------------|---------
**Oracolo**          | Il sistema non esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_1_10
---------------------|----------
**Oracolo**          | Il sistema esegue la registrazione dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 2.2 AutenticareAccount

Test Case ID         | TC_2_2_1
---------------------|---------
**Oracolo**          | Il sistema non esegue il login dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_2_2
---------------------|---------
**Oracolo**          | Il sistema non esegue il login dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_2_3
---------------------|---------
**Oracolo**          | Il sistema mostra "I dati non corrispondono".
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_2_4
---------------------|---------
**Oracolo**          | Il sistema non esegue il login dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

Test Case ID         | TC_2_2_5
---------------------|---------
**Oracolo**          | Il sistema non esegue il login dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_2_2_6
---------------------|---------
**Oracolo**          | Il sistema esegue il login dell'utente.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 
 
#### 2.3 CambiarePassword
**Test Case ID**     | TC_2_3_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

**Test Case ID**     | TC_2_3_2
---------------------|---------
**Oracolo**          | Il sistema comunica che i dati non sono validi.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_2_3_3
---------------------|---------
**Oracolo**          | Il sistema comunica che i dati non sono validi (la password vecchia non corrisponde).
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_2_3_4
---------------------|---------
**Oracolo**          | Il sistema comunica che i dati non sono validi.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_2_3_5
---------------------|---------
**Oracolo**          | Il sistema comunica che la password è stata aggiornata..
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 
 
### Amicizia

#### 3.1 InviareRichiestaAmicizia
Test Case ID         | TC_3_1_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_3_1_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_3_1_3
---------------------|---------
**Oracolo**          | Il sistema invia la richiesta di amicizia, e mostra una pagina di "Richiesta di amicizia inviata".
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 3.2 AccettareRichiestaAmicizia
Test Case ID         | TC_3_2_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

Test Case ID         | TC_3_2_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_3_2_3
---------------------|---------
**Oracolo**          | Il sistema crea l'amicizia, e mostra una pagina di "Richiesta di amicizia accettata".
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 3.3 RifiutareRichiestaAmicizia
Test Case ID         | TC_3_3_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 


Test Case ID         | TC_3_3_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

Test Case ID         | TC_3_3_3
---------------------|---------
**Oracolo**          |  Il sistema rifiuta l'amicizia richiesta, e mostra una pagina di "Richiesta di amicizia rifiutata".
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

### Film

#### 4.1 AggiungereGiudizio

**Test Case ID**     | TC_4_1_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_1_2
---------------------|---------
**Oracolo**          | Il sistema non permette di aggiungere il giudizio.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_1_3
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_1_4
---------------------|---------
**Oracolo**          | Il sistema assegna il voto al film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 4.2 ModificareGiudizio
**Test Case ID**     | TC_4_2_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_2_2
---------------------|---------
**Oracolo**          | Il sistema non permette di modificare il giudizio.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_2_3
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_2_4
---------------------|---------
**Oracolo**          | Il sistema assegna il voto al film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

### 4.3 RimuovereGiudizio
**Test Case ID**     | TC_4_3_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_3_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_3_3
---------------------|---------
**Oracolo**          | Il sistema rimuove il voto al film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_4_3_4
---------------------|---------
**Oracolo**          | Il sistema non permette di rimuovere il giudizio.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

### Gestione

#### 5.1 AggiungereFilm
**Test Case ID**     | TC_5_1_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_1_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

**Test Case ID**     | TC_5_1_3
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_1_4
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

**Test Case ID**     | TC_5_1_5
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_1_6
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_1_7
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_1_8
---------------------|---------
**Oracolo**          | Il sistema aggiunge il film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

###à 5.2 AggiungereArtista
**Test Case ID**     | TC_5_2_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

**Test Case ID**     | TC_5_2_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_2_3
---------------------|---------
**Oracolo**          | Il sistema non aggiunge l'artista.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_2_4
---------------------|---------
**Oracolo**          | Il sistema non aggiunge l'artista.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_2_5
---------------------|---------
**Oracolo**          | Il sistema non aggiunge l'artista.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_2_6
---------------------|---------
**Oracolo**          | Il sistema non aggiunge l'artista.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium)  

**Test Case ID**     | TC_5_2_7
---------------------|---------
**Oracolo**          | Il sistema aggiunge l'artista.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 5.3 AggiungereGenere
**Test Case ID**     | TC_5_3_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_3_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_3_3
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il genere.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_3_4
---------------------|---------
**Oracolo**          | Il sistema non aggiunge il genere perché il genere "Drammatico" esiste già.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_3_5
---------------------|---------
**Oracolo**          | Il sistema aggiunge il genere.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 5.4 ModificareGenere
**Test Case ID**     | TC_5_4_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_4_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_4_3
---------------------|---------
**Oracolo**          | Il sistema non modifica il genere.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_4_4
---------------------|---------
**Oracolo**          | Il sistema non modifica il genere perché il genere "Drammatico" esiste già.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_4_5
---------------------|---------
**Oracolo**          | Il sistema modifica il genere.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 5.5 RimuovereGenere
**Test Case ID**     | TC_5_5_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_5_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_5_3
---------------------|---------
**Oracolo**          | Il sistema rimuove il genere.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

#### 5.6 AggiornareGeneriFilm
**Test Case ID**     | TC_5_6_1
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_6_2
---------------------|---------
**Oracolo**          | Il sistema mostra pagina non trovata.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 

**Test Case ID**     | TC_5_6_3
---------------------|---------
**Oracolo**          | Il sistema aggiorna i generi del film.
**Data**             | 18/1/2020
**Anomalie**		 | 
**Risultato**		 | PASSED
**Test**		     | Unità controller(PHPUnit), Integrazione controller(PHPUnit), Sistema (Selenium) 








 


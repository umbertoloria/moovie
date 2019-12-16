
  
    
# Test Plan    
 ## Introduzione 
 Molte volte, anche credendo di aver progettato un softare nel migliore dei modi, ci troviamo di fronte a situazioni nelle quali basta un piccolo evento, una piccola azione fatta da un attore, per portare un malfunzionamento a tutto il sistema. Ma come facciamo a trattare questi errori ?     
Esistono principalmente tre diversi modi per affrontare il problema:    
-Prevenzione di errori(prima che rilasciamo un sistema)    
-Rilevazione di errori(quando un sistema è in esecuzione)    
-Recupero di errori(dopo che un sistema è stato rilasciato)    
Tra tutte queste tecniche, quella utlizzata per costruire nel migliore dei modi Moovie, noi abbiamo scelto quella di "Rilevazione di errori" in cui è presente l'attività di Testing.    
In questo documento infatti, andremo ad illustrare come attraverso questa attività di testing, cercheremo di rilevare tutti gli errori che nel sistema sono presenti.    
Il testing sarà eseguito su queste macro-aree:    
 - Ricerche    
 - Account    
 - Amicizie    
 - Film    
 - Liste    
## Relazioni con gli altri documenti 
Il documento di "Test Plan" è strettamente collegato agli altri documenti che abbiamo sviluppato durante la progettazione del nostro sistema.  
  
### Relazione con il RAD  
Il Test Plan è strettamente collegato al documento di Analisi dei requisiti in quanto dai requisiti funzionali emersi durante l'attività di analisi abbiamo individuato le principali funzionalità che il sistema deve avere. Inoltre, dato che abbiamo diviso di Utilizzare la tecnica di "Category Partition", i parametri scelti sono strettamente correlati agli Use Cases Presenti nel RAD.  
  
### Relazioni con l'SDD  
Il Test Plan è strettamente collegato con il Documento di "System Design" poiché dovra rispettare tutte le funzionalità ottenute dai vari sottosistemi, facendo riferimento anche alla suddivisione fatta: Presentation Layer, Application Layer e Data Layer.  
  
### Relazioni con l'ODD  
Il Test Plan è strattamente collegato con il documento di "Object Design" poiché dovrà essere il quanto più conforme possibile alle interfaccie definite per ogni classe.  
  
    
## Panoramica del sistema 
Per una migliore progettazione della nostra Web-Application, il sistema è stato suddiviso in vari Layer che sono: <b>Presentation Layer </br>, <b>Application Layer </br></b></b> e <b>Data Layer</b> </br>. Questa suddivisione è stata fatta per ottenere basso accoppiamento ( in modo tale che ogni qual volta si modifichi una componente del sistema non c'è la necessità di modificare tutte le altre accoppiate ad essa) ed alta coesione (in moto tale che le classi nel sottosistema svolgono compiti simili e sono correlate tra loro).  
  
## Funzionalità da testare/ da non testare  
  In base alla suddivisione in sottosistemi che si è fatta, per ogni sottosistema abbiamo scelto di testare varie funzionalità, qui di seguito quelle indivisuate:    
- Per il sottosistema Ricerche     
  - RicercaFilm 
  - RicercaArtista
  - RicercaUtente
- Per il sottosistema Accounts    
  - CreareAccount    
  - AutenticareAccount    
  - ConfermaCamboPassword    
- Per il sottosistema Amicizie    
  - RichiestaAmiciziaAccount    
  - ConfermaAmiciziaAccount    
  - RifiutAmiciziaAccount    
- Per il sottosistema Film    
  - AggiungereGiudizio    
  - ModificareGiudizio  
- Per il sottosistema Liste    
  - CreareLista    
  - ModificareLista    
  - AggiornarePresenzaFilm   
       
## Criteri Pass/ Field
 Durante l'attività di testing, cercheremo di rilevare errori nel modo più pianificato possibile. Lo scopo di questà attività non è quello di dimostrare che nel sistema non ci sono "failure" ma quello di mostrane la presenza andando ad esercitare ogni funzionalità che il cliente si aspetta.   
Affinché ogni funzionalità "passi" correttamente lil test, è necessario che l'output derivante da esso sia conforme alle specifiche (ORACOLO) descritte in precedenza dallo sviluppatore.  Nel caso non fosse così, la componente non passerà il test e si dovrà procedere per una correzione. 
## Approccio 
Per procedere all'attività di testing si è deciso deciso di suddividere il test in varie componenti secondo le quali andremo a testare prima le farie funzionalità in modo singolo per poi arrivare a testare l'intero sistema. Le vari componenti individuate sono:     
- Test di unità   
   - Testare i vari sottosistemi individualmente, testare singolarmente le varie funzionalità dei  sottosistemi. La metodologia scelta per questa fase di testing è la Black-Box testing secondo la quale la selezione dei test va fatta sulle specifiche del sottosistema e non sulla implementazione di esso, non sulla logica. Per testare il sistema nel migliore dei modi cercando di avere una senso di test completo, andremo a testare le varie funzionalità previste individuando i paramentri scelti per ogni funzionalità con le relative categorie e le scelte fatte per ognuna di essa.  
- Test di integrazione   
   - Unire alcuni sottosistemi e testarli con tutte le loro funzionalità integrate. Durante questa fase, cercheremo di rilevare gli errori derivanti dalla composizione di alcuni sottosistemi.    
- Test di sistema    
  - Testare l'intero funzionamento del sistema. Durante questa fase cercheremo di rilevare gli errori derivanti dall'intero sistema e dall'integrazione, dunque, di tutti i sottosistemi prima sviluppati.    
## Sospensione e ripresa 
### Sospensione 
Ci sarà una sospensione dell'attività di testing solo nel momento in cui avremo testato ognu funzionalità prevista rispettando nel modo quanto più corretto possibile quelli che sono i tempi e i costi da noi previsti.  
  
### Ripresa 
Ogni qual volta si individueranno dei bag nelle funzionalità sarà necessaria una correzione ad essi. Per verificare che la correzione non abbia portato ulteriori danni al sistema verrà ripresa l'attività di testing, riproponendo gli stessi casi si test che ci hanno condotto al problema.  
## Materiale per il testing Per Testare il sistema abbiamo usato:  
   Un Database  
   Un Client  
   Un Server  
     
## Casi di test 
### Ricerche 
#### RicercaFilm 
**PARAMETRO**: | RicercaFilm
----|---
**Lunghezza[LRicercaFilm]**: | 1. < 1 or > 100[Errore]<br/>2. > 0 & < 101[Successo_LRicercaFilm]
#### Test cases
Codice   | Combinazione   | Esito
---------|----------------|--------
TC_1.1_1 | LRicercaFilm_1 | Errore
TC_1.1_2 | LRicercaFilm_2 | Corretto
---
#### RicercaArtista 
**PARAMETRO**: | RicercaArtista
----|---
**Lunghezza[LRicercaArtista]**: | 1. < 1 or > 100[Errore]<br/>2. > 0 & < 101[Successo_LRicercaArtista]
#### Test cases
Codice   | Combinazione      | Esito
---------|-------------------|--------
TC_1.2_1 | LRicercaArtista_1 | Errore
TC_1.2_2 | LRicercaArtista_2 | Corretto
---
#### RicercaUtente 
**PARAMETRO**: | RicercaUtente
----|---
**Lunghezza[LRicercaUtente]**: | 1. < 1 or > 100[Errore]<br/>2. > 0 & < 101[Successo_LRicercaUtente]
#### Test cases
Codice   | Combinazione     | Esito
---------|------------------|-------
TC_1.3_1 | LRicercaUtente_1 | Errore
TC_1.3_2 | LRicercaUtente_2 | Corretto    
    
### Accounts
#### CreareAccount
**PARAMETRO**: | Nome
  ----|---
  **FORMATO**: | ^[a-zA-Z' àèéìòù]+$
  **Lunghezza[LNome]**: | 1. <5 or >50 [Errore]<br/>2. >5 & <50 [Successo_LNome]
  **Formato[FNome]:** | 1. Non rispecchia il formato [if_LNome_OK][Errore]<br/>2. Rispettail formato[if FNome_OK][Successo_Nome]

**PARAMETRO**: | Cognome
----|---
**FORMATO**: | ^[a-zA-Z' àèéìòù]+$
**Lunghezza[LCognome]**: | 1. <5 or >50 [Errore]<br/>2. >5 & <51 [Successo_LCognome]
**Formato[FNome]:** | >1. Non rispecchia il formato [if_LCognome_OK][Errore]<br/>2. Rispettail formato[if FCognome_OK][Successo_Cognome]

**PARAMETRO**: | Email
----|---
**FORMATO**: | ^[\\w\\.-]+@[\\w\\.-]+\\.\\w{2,4}$
**Lunghezza[LEmail]**: | 1. <5 or >50 [Errore]<br>2. >4 & <51 [Successo_LEmail]
**Formato[FEmail]:** | 1. Non rispecchia il formato [if_LCognome_OK][Errore]<br/>2. Rispettail formato[if FCognome_OK][Successo_Cognome]+

**PARAMETRO**: | Password
----|---
**Lunghezza[LPassword]**: | 1. <6 or >16 [Errore]<br/>2. >5 & <17 [Successo_LPassword]

**PARAMETRO**: | Copassword
----|---
**Lunghezza[LCopassword]**: | 1. <6 or >16 [Errore]<br/>2. >5 & <17 [Successo_LCopassword]   
  
Codice   | Combinazione                                                                           | Esito
---------|----------------------------------------------------------------------------------------|--------
TC_2.1_1 | LNome1                                                                                 | Errore
TC_2.1_2 | LNome2, FNome1                                                                         | Errore
TC_2.1_3 | LNome2,FNome2<br>LCognome1                                                             | Errore
TC_2.1_4 | LNome2,FNome2<br>LCognome2, FCognome1                                                  | Errore
TC_2.1_5 | LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail1                                      | Errore
TC_2.1_6 | LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail1                             | Errore
TC_2.1_7 | LNome2,FNome2<br>LCognome2, FCognome2<br>LEmail2, FEmail2<br> LPassword1               | Errore
TC_2.1_8 | LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail2<br>LPassword2, Copassword1  | Errore
TC_1.3_9 | LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail2<br> LPassword2, Copassword2 | Corretto 
   
    
#### AutenticareAccount 
**PARAMETRO**: | Email
----|---
**FORMATO**: | ^[\\w\\.-]+@[\\w\\.-]+\\.\\w{2,4}$
**Lunghezza[LEmail]**: | 1. <5 or >50 [Errore]<br>2. >4 & <51 [Successo_LEmail]
**Formato[FEmail]:** | 1. Non rispecchia il formato [if_LCognome_OK][Errore]<br/>2. Rispettail formato[if FCognome_OK][Successo_Cognome]+

**PARAMETRO**: | Password
----|---
**Lunghezza[LPassword]**: | 1. <6 or >16 [Errore]<br/>2. >5 & <17 [Successo_LPassword]

Codice   | Combinazione                     | Esito
---------|----------------------------------|---
TC_2.2_1 | LEmail1                          | Errore
TC_2.2_2 | LEmail2, FEmail1                 | Errore
TC_2.2_3 | LEmail2, FEmail2<br/> LPassword1 | Errore
TC_2.2_4 | LEmail2, FEmail2<br/> LPassword2 | Corretto  
#### ConfermaCambioPassword
**PARAMETRO**: | Utente
----|---
**Loggato[LoUtente]**: | 1. L'utente che vuole cambiare la password non è loggato[Errore] <br/> 2. L'utente che vuole cambiare la password è loggato[Successo_LoUtente]
---
**PARAMETRO**: | PasswordVecchia
----|---
**Lunghezza[LPasswordVecchia]**: | 1. < 6 or > 16[Errore]<br/> 2. > 5 & < 17[Successo_LPasswordVecchia]
---
**PARAMETRO**: | PasswordNuova
----|---
**Lunghezza[LPasswordNuova]**: | 1. < 6 or > 16[Errore]<br/> 2. > 5 & < 17[Successo_LPasswordNuova]
---
**PARAMETRO**: | Copassword
----|---
**Lunghezza[LCopassword]**: | 1. < 6 or > 16[Errore]<br/> 2. > 5 & < 17[Successo_Copassword]
---
#### Test cases
Codice   | Combinazione                                                    | Esito
---------|-----------------------------------------------------------------|--------
TC_2.3_1 | LoUtente_1                                                      | Errore
TC_2.3_2 | LoUtente_2, LPasswordVecchia_1                                  | Errore
TC_2.3_3 | LoUtente_2, LPasswordVecchia_2, LPasswordNuova_1                | Errore
TC_2.3_4 | LoUtente_2, LPasswordVecchia_2, LPasswordNuova_2, LCopassword_1 | Errore
TC_2.3_5 | LoUtente_2, LPasswordVecchia_2, LPasswordNuova_2, LCopassword_2 | Corretto    
    
### Amicizia
#### RichiestaAmiciziaAccount
**PARAMETRO**: | UtenteFrom
----|---
**Loggato[LoUtenteFrom]:**| 1. L'utente che invia l'amicizia non è loggato[Errore] <br/> 2. L'utente che invia l'amicizia è loggato [Successo_LoUtenteFrom]

**PARAMETRO**: | UtenteTo
----|---
**Esistenza[EUtenteTo]:**| 1. L'utente a cui inviare l'amicizia non esiste[Errore]<br> 2. L'utente a cui inviare l'amicizia esiste[Successo_EUtenteTo]

#### Test cases 
Codice   | Combinazione                | Esito
---------|-----------------------------|-------
TC_3.1_1 | LoUtenteFrom_1              | Errore
TC_3.1_2 | LoUtenteFrom_2, EUtenteTo_1 | Errore
TC_3.1_3 | LoUtenteFrom_2, EUtenteTo_2 | Corretto
 

#### ConfermaAmiciziaAccount
**PARAMETRO**: | UtenteTo
----|---
**Loggato[LoUtenteTo]:**| 1. L'utente che invia l'amicizia non è loggato[Errore] <br/> 2. L'utente che invia l'amicizia è loggato [Successo_LoUtenteTo]

**PARAMETRO**: | UtenteFrom
----|---
**Esistenza[EUtenteFrom]:**| 1. L'utente a cui inviare l'amicizia non esiste[Errore]<br> 2. L'utente a cui inviare l'amicizia esiste[Successo_EUtenteFrom]

#### Test cases 
Codice   | Combinazione                | Esito
---------|-----------------------------|---
TC_3.2_1 | LoUtenteTo_1                | Errore
TC_3.2_2 | LoUtenteTo_2, EUtenteFrom_1 | Errore
TC_3.2_3 | LoUtenteTo_2, EUtenteFrom_2 | Corretto

#### RifiutaAmiciziaAccount
**PARAMETRO**: | UtenteTo
----|---
**Loggato[LoUtenteTo]:**| 1. L'utente che invia l'amicizia non è loggato[Errore] <br/> 2. L'utente che invia l'amicizia è loggato [Successo_LoUtenteTo]

**PARAMETRO**: | UtenteFrom
----|---
**Esistenza[EUtenteFrom]:**| 1. L'utente a cui inviare l'amicizia non esiste[Errore]<br> 2. L'utente a cui inviare l'amicizia esiste[Successo_EUtenteFrom]

#### Test cases 
Codice   | Combinazione                | Esito
---------|-----------------------------|--------
TC_3.3_1 | LoUtenteTo_1                | Errore
TC_3.3_2 | LoUtenteTo_2, EUtenteFrom_1 | Errore
TC_3.3_3 | LoUtenteTo_2, EUtenteFrom_2 | Corretto
    
###  Film   
#### AggiungereGiudizio 
**PARAMETRO**: | Voto
----|---
**Selezione[SVoto]:**| 1. L'Utente non ha selezionato alcun valore[Errore]<br/> 2. L'Utente ha selezionato uno dei dieci voti possibili[Successo_SVoto]

**PARAMETRO**: | Film
----|---
**Presenza[PFilm]:**| 1. Il film è gia presente in film guardati dell'utente[Errore]<br/> 2. Il film non è presente in film guardati dell'utente[Successo_PFilm] 

#### Test cases  
Codice   | Combinazione     | Esito
---------|------------------|-------
TC_4.1_1 | SVoto_1          | Errore
TC_4.1_2 | SVoto_2, PFilm_1 | Errore
TC_4.1_3 | SVoto_2, PFilm_2 | Corretto
  
#### ModificareGiudizio

**PARAMETRO**: | Voto
----|---
**Selezione[SVoto]:**| 1. L'Utente non ha selezionato alcun valore[Errore]<br/> 2. L'Utente ha selezionato uno dei dieci voti possibili[Successo_SVoto]

**PARAMETRO**: | Film
----|---
**Presenza[PFilm]:**| 1. 1. Il film non è presente in film guardati dell'utente[Errore]<br/> 2. Il film è presente in film guardati dell'utente[Successo_PFilm]

  
#### Test cases  
Codice   | Combinazione     | Esito
---------|------------------|-------
TC_4.2_1 | SVoto_1          | Errore
TC_4.2_2 | SVoto_2, PFilm_1 | Errore
TC_4.2_3 | SVoto_2, PFilm_2 | Corretto 
    
### Liste
#### CreareLista
**PARAMETRO**: | Utente
----|---
**Loggato[LoUtente]**: | 1. L'utente che vuole creare una lista non è loggato[Errore] <br/> 2. L'utente che vuole creare una lista è loggato[Successo_LoUtente]
---
**PARAMETRO**: | Nome
----|---
**Lunghezza[LNome]**: | 1.  < 5 or >50[Errore]<br> 2. >4 & <51[Successo_LNome]
**Esistenza[ENome]**: | 1. Il nome della lista è gia presente nelle liste dell'utente [if_LNome_OK][Errore]<br> 2. Il nome della lista non è presente nelle liste già in possesso [if ENome_OK][Successo_Nome]
---
**PARAMETRO**: | Visibiltà
----|---
**Selezione[SVisibilità]**: | 1. L'Utente non ha selezionato alcun valore[Errore]<br/> 2. L'Utente ha selezionato una delle tre visibilità possibili[Successo_SVisibilità]

#### Test cases  
Codice   | Combinazione                               | Esito
---------|--------------------------------------------|---
TC_5.1_1 | LoUtente_1                                 | Errore
TC_5.1_2 | LoUtente_2, Nome_1                         | Errore
TC_5.1_3 | LoUtente_2, Nome_2, ENome_1                | Errore
TC_5.1_4 | LoUtente_2, Nome_2, ENome_2, SVisibilità_1 | Errore
TC_5.1_5 | LoUtente_2, Nome_2, ENome_2, SVisibilità_2 | Corretto
    
#### ModificareLista
**PARAMETRO**: | Utente
----|---
**Loggato[LoUtente]**: | 1. L'utente che vuole modificare una lista non è loggato[Errore] <br/> 2. L'utente che vuole modificare una lista è loggato[Successo_LoUtente]
---
**PARAMETRO**: | Nome
----|---
**Lunghezza[LNome]**: | 1.  < 5 or >50[Errore]<br> 2. >4 & <51[Successo_LNome]
**Esistenza[ENome]**: | 1. Il nome della lista non è presente nelle liste dell'utente [if_LNome_OK][Errore]<br> 2. Il nome della lista è presente nelle liste già in possesso [if ENome_OK][Successo_Nome]
---
**PARAMETRO**: | Visibiltà
----|---
**Selezione[SVisibilità]**: | 1. L'Utente non ha selezionato alcun valore o ha selezionato lo stesso valore precedente[Errore]<br/> 2. L'Utente ha selezionato una visibilità possibile[Successo_SVisibilità]

#### Test cases  
Codice   | Combinazione                               | Esito
---------|--------------------------------------------|-------
TC_5.2_1 | LoUtente_1                                 | Errore
TC_5.2_2 | LoUtente_2, Nome_1                         | Errore
TC_5.2_3 | LoUtente_2, Nome_2, ENome_1                | Errore
TC_5.2_4 | LoUtente_2, Nome_2, ENome_2, SVisibilità_1 | Errore
TC_5.2_5 | LoUtente_2, Nome_2, ENome_2, SVisibilità_2 | Corretto

#### AggiornarePresenzaFilm
**PARAMETRO:**| Lista
----|---
**Esistenza[ELista]:**| 1. La lista selezionata/ non selezionata non esiste[Errore]<br/>2. La lista selezionata/ non selezionata esiste[Successo_ELista]

PARAMETRO: | Film
----|---
**Esistenza[EFilm]:**| 1. Il film selezionato non esiste[Errore]<br/>2. Il film selezionato esiste [Successo_EFilm]
#### Test cases
Codice   | Combinazione     | Esito
---------|------------------|--------
TC_4.3_1 | ELista1          | Errore
TC_4.3_2 | ELista2, EFilm1  | Errore
TC_4.3_3 | ELista2, EFilm2  | Corretto





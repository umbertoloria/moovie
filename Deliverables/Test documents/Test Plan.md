
  
    
# Test Plan    
 ## Introduzione 
 Molte volte, anche credendo di aver progettato un softare nel migliore dei modi, ci troviamo di fronte a situazioni nelle quali basta un piccolo evento, una piccola azione fatta da un attore, per portare un malfunzionamento a tutto il sistema. Ma come facciamo a trattare questi errori ?     
Esistono principalmente 3 diversi modi per affrontare il problema:    
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
Il Test Plan è strettamente collegato con il Documento di "System Design" poiché dovra rispettare tutti le funzionalità ottenute dai vari sottosistemi, facendo riferimento anche alla suddivisione fatta: Presentation Layer, Application Layer e Data Layer.  
  
### Relazioni con l'ODD  
Il Test Plan è strattamente collegato con il documento di "Object Design" poiché dovrà essere il quanto più conforme possibile alle interfaccie definite per ogni classe.  
  
    
## Panoramica del sistema 
Per una migliore progettazione della nostra Web-Application, il sistema è stato suddiviso in vari Layer che sono: <b>Presentation Layer </br>, <b>Application Layer </br></b></b> e <b>Data Layer</b> </br>. Questa suddivisione è stata fatta per ottenere basso accoppiamento ( in modo tale che ogni qual volta si modifichi una componente del sistema non c'è la necessità di modificare tutte le altre accoppiate ad essa) ed alta coesione (in moto tale che le classi nel sottosistema svolgono compiti simili e sono correlate tra loro).  
  
## Funzionalità da testare/ da non testare  
  
  In base alla suddivisione in sottosistemi che si è fatta, per ogni sottosistema abbiamo scelto di testare varie funzionalità, qui di seguito quelle indivisuate:    
- Per il sottosistema Ricerche     
  - Ricerca di un artista/ film/ Utente    
- Per il sottosistema Account    
  - Registrazione    
  - Autenticazione    
  - Modifica    
- Per il sottosistema Amicizia    
  - Richiedere amicizia account    
  - Conferma amicizia account    
  - Rifiuta amicizia account    
- Per il sottosistema Film    
  - Aggiungere un giudizio    
  - Modificare un giudizio     
  - Farsi suggerire un film    
- Per il sottosistema Liste    
  - Creare una lista    
  - Modificare una lista    
  - Aggiornare la presenza di film nelle liste    
  - Seguire liste altrui    
       
## Criteri Pass/ Field
 Durante l'attività di testing, cercheremo di rilevare errori nel modo più pianificato possibile. Lo scopo di questà attività non è quello di dimostrare che nel sistema non ci sono "failure" ma quello di mostrane la presenza andando ad esercitare ognu funzionalità che il cliente si aspetta.   
Affinché ogni funzionalità "passi" correttamente lil test, è necessario che l'output derivante da esso sia conforme alle specifiche (ORACOLO) descritte in precedenza dallo sviluppatore.  Nel caso non fosse così, la comonente non passerà il test e si dovrà procedere per una correzione. 
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
#### Ricerca di un film 
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Ricerca-film</td>    
   </tr>    
   <tr>    
      <td>FORMATO: </td>    
      <td>^[0-9a-zA-Z' àèéìòù]+$</td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LRicercaFilm]:</td>    
      <td>1.  < 1 or >100[Errore]<br> 2. >0 & <101[Successo_LRicercaFilm]</td>    
   </tr>    
   <tr>    
      <td>Formato[FRicercaFilm]:</td>    
      <td>1. Non rispecchia il formato [if_LRicercaFilm_OK][Errore]<br>2. Rispetta il formato[if FRicercaFilm_OK][Successo_RicercaFilm]</td>    
   </tr>    
</table>    
    
#### Test cases    
 <table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_1.1_1</td>    
      <td>LRicercaFilm_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.1_2</td>    
      <td>LRicercaFilm_2, FRicercaFilm_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.1_3</td>    
      <td>LRicercaFilm_2, FRicercaFilm_2</td>    
      <td>Corretto</td>    
   </tr>    
</table>    
    
#### Ricerca di un artista 
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Ricerca-artista</td>    
   </tr>    
   <tr>    
      <td>FORMATO: </td>    
      <td>^[0-9a-zA-Z' àèéìòù]+$</td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LRicercaArtista]:</td>    
      <td>1.  < 1 or >100[Errore]<br> 2. >0 & <101[Successo_LRicercaArtista]</td>    
   </tr>    
   <tr>    
      <td>Formato[FRicercaArtista]:</td>    
      <td>1. Non rispecchia il formato [if_LRicercaArtista_OK][Errore]<br>2. Rispetta il formato[if FRicercaArtista_OK][Successo_RicercaArtista]</td>    
   </tr>    
</table>    
    
#### Test cases    
 <table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_1.2_1</td>    
      <td>LRicercaArtista_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.2_2</td>    
      <td>LRicercaArtista_2, FRicercaArtista_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.2_3</td>    
      <td>LRicercaArtista_2, FRicercaArtista_2</td>    
      <td>Corretto</td>    
   </tr>    
</table>    
    
    
#### Ricerca di un utente
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Ricerca-utente</td>    
   </tr>    
   <tr>    
      <td>FORMATO: </td>    
      <td>^[0-9a-zA-Z' àèéìòù]+$</td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LRicercaUtente]:</td>    
      <td>1.  < 1 or >100[Errore]<br> 2. >0 & <101[Successo_LRicercaUtente]</td>    
   </tr>    
   <tr>    
      <td>Formato[FRicercaUtente]:</td>    
      <td>1. Non rispecchia il formato [if_LRicercaUtente_OK][Errore]<br>2. Rispetta il formato[if FRicercaUtente_OK][Successo_RicercaUtente]</td>    
   </tr>    
</table>    
    
#### Test cases    
 <table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_1.3_1</td>    
      <td>LRicercaUtente_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.3_2</td>    
      <td>LRicercaUtente_2, FRicercaUtente_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_1.3_3</td>    
      <td>LRicercaUtente_2, FRicercaUtente_2</td>    
      <td>Corretto</td>    
   </tr>    
</table>    
    
### Accounts 
#### Creare un account    
 <table>    
<tr><td>PARAMETRO:       </td><td>Nome                                              </td></tr>    
<tr><td>FORMATO:         </td><td>^[a-zA-Z' àèéìòù]+$                               </tr>    
<tr><td>Lunghezza[LNome]:</td><td>1. <5 or >50 [Errore]                             <br>2. >5 & <50 [Successo_LNome]</td></tr>    
<tr><td>Formato[FNome]:  </td><td>1. Non rispecchia il formato [if_LNome_OK][Errore]<br>2. Rispettail formato[if FNome_OK][Successo_Nome]</td></tr>    
</table>    
<br>    
<table>    
<tr><td>PARAMETRO:       </td><td>Cognome                                             </td></tr>    
<tr><td>FORMATO:         </td><td>^[a-zA-Z' àèéìòù]+$                              </tr>    
<tr><td>Lunghezza[LCognome]:</td><td>1. <5 or >50 [Errore]                             <br>2. >5 & <51 [Successo_LCognome]</td></tr>    
<tr><td>Formato[FCognome]:  </td><td>1. Non rispecchia il formato [if_LCognome_OK][Errore]<br>2. Rispettail formato[if FCognome_OK][Successo_Cognome]</td></tr>    
</table>    
<br>    
<table>    
<tr><td>PARAMETRO:       </td><td>Email                                           </td></tr>    
<tr><td>FORMATO:         </td><td>^[\\w\\.-]+@[\\w\\.-]+\\.\\w{2,4}$                             </tr>    
<tr><td>Lunghezza[LEmail]:</td><td>1. <5 or >50 [Errore]                             <br>2. >4 & <51 [Successo_LEmail]</td></tr>    
<tr><td>Formato[FEmail]:  </td><td>1. Non rispecchia il formato [if_LEmail_OK][Errore]<br>2. Rispettail formato[if FEmail_OK][Successo_Email]</td></tr>    
</table>    
<br>    
<table>    
<tr><td>PARAMETRO:       </td><td>password                                     </td></tr>    
<tr><td>FORMATO:         </td><td>                            </tr>    
<tr><td>Lunghezza[LPassword]:</td><td>1. <6 or >16 [Errore]                             <br>2. >5 & <17 [Successo_LPassword]</td></tr>    
    
<br>    
<table>    
<tr><td>PARAMETRO:       </td><td>Copassword                                         </td></tr>    
<tr><td>FORMATO:         </td><td>                          </tr>    
<tr><td>Lunghezza[LCopassword]:</td><td>1. <6 or >16 [Errore]                             <br>2. >5 & <17 [Successo_LCopassord]</td></tr>    
</table>    
<br>    
<table>    
<tr><th>Codice     </td><th>Combinazione     </th> <th>Esito</th></tr>    
<tr><td>TC_2.1_1        </td><td> LNome1 </td><td> Errore </td></tr>    
<tr><td>TC_2.1_2        </td><td> LNome2, FNome1 </td><td> Errato </td></tr>    
<tr><td>TC_2.1_3        </td><td> LNome2,FNome2<br>LCognome1  </td>                                    <td>  Errore</td></tr>    
<tr><td>TC_2.1_4        </td><td>  LNome2,FNome2<br>LCognome2, FCognome1 </td><td>      Errore        </td></tr>    
<tr><td>TC_2.1_5        </td><td>  LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail1 </td><td>      Errore        </td></tr>    
<tr><td>TC_2.1_6        </td><td>  LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail1  </td><td>      Errore        </td></tr>    
<tr><td>TC_2.1_7        </td><td>  LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail1  </td><td>      Errore        </td></tr>    
<tr><td>TC_2.1_8       </td><td>  LNome2,FNome2<br>LCognome2, FCognome2<br>LEmail2, FEmail2<br> LPassword1       </td><td>      Erroe        </td></tr>    
<tr><td>TC_2.1_9        </td><td>LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail2<br>LPassword2, Copassword1        </td><td>     Errore         </td></tr>    
<tr><td>TC_2.1_10        </td><td>LNome2,FNome2<br>LCognome2, FCognome2<br> LEmail2, FEmail2<br> LPassword2, Copassword2         </td><td>     Corretto         </td></tr>    
</table>    
    
#### Autenticare un account 
<table> <tr><td>PARAMETRO:       </td><td>Email                                           </td></tr>    
<tr><td>FORMATO:         </td><td>^[\\w\\.-]+@[\\w\\.-]+\\.\\w{2,4}$                             </tr>    
<tr><td>Lunghezza[LEmail]:</td><td>1. <5 or >50 [Errore]                             <br>2. >4 & <51 [Successo_LEmail]</td></tr>    
<tr><td>Formato[FEmail]:  </td><td>1. Non rispecchia il formato [if_LEmail_OK][Errore]<br>2. Rispettail formato[if FEmail_OK][Successo_Femail]</td></tr>    
</table>    
<br>    
<table>    
<tr><td>PARAMETRO:       </td><td>password                                     </td></tr>    
<tr><td>FORMATO:         </td><td>                            </tr>    
<tr><td>Lunghezza[LPassword]:</td><td>1. <6 or >16 [Errore]                             <br>2. >5 & <17 [Successo_LPassword]</td></tr>    
    
<table>    
<tr><th>Codice     </td><th>Combinazione     </th> <th>Esito</th></tr>    
<tr><td>TC_2.2_1        </td><td> LEmail1 </td><td> Errore </td></tr>    
<tr><td>TC_2.2_2        </td><td> LEmail2, FEmail1 </td><td> Errato </td></tr>    
<tr><td>TC_2.2_3        </td><td>LEmail2, FEmail2<br> LPassword1, LCognome1  </td>                                    <td>  Errore</td></tr>    
<tr><td>TC_2.2_4        </td><td>  LEmail2, FEmail2, LPassword2</td><td>      Corretto        </td></tr>    
</table>    
  
#### Conferma di Cambio Password 
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Password-vecchia</td>    
   </tr>    
   <tr>    
      <td>FORMATO:</td>    
      <td></td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LPasswordVecchia]:</td>    
      <td>1.  < 6 or >16[Errore]<br> 2. >5 & <17[Successo_LPasswordVecchia]</td>    
   </tr>    
</table>
<br>
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Password</td>    
   </tr>    
   <tr>    
      <td>FORMATO:</td>    
      <td></td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LPassword]:</td>    
      <td>1.  < 6 or >16[Errore]<br> 2. >5 & <17[Successo_LPassword]</td>    
   </tr>    
</table>    
    
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Copassword</td>    
   </tr>    
   <tr>    
      <td>FORMATO:</td>    
      <td></td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LCopassword]:</td>    
      <td>1.  < 6 or >16[Errore]<br> 2. >5 & <17[Successo_LCopassword]</td>    
   </tr>    
</table>    
  
    
    
#### Test cases 
<table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_2.3_1</td>    
      <td>LPasswordVecchia_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_2.3_2</td>    
      <td>LPasswordVecchia_2, LPassword_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_2.3_3</td>    
      <td>LPasswordVecchia_2, LPassword_2, LCopassword_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_2.3_4</td>    
      <td>LPasswordVecchia_2, LPassword_2, LCopassword_2</td>    
      <td>Corretto</td>    
   </tr>    
</table>    
    
### Amicizia
#### Richiesta amicizia account

<table>    
   <tr>    
      <td>PARAMETRO:</td>    
      <td>UtenteFrom</td>    
   </tr>      
   <tr>    
      <td>Loggato[LoUtenteFrom]:</td>    
      <td>1. L'utente che invia l'amicizia non è loggato[Errore] <br> 2. L'utente che invia l'amicizia è loggato [Successo_LoUtenteFrom] </td>    
   </tr>    
</table> 

<table>    
   <tr>    
      <td>PARAMETRO:</td>    
      <td>UtenteTo</td>    
   </tr>       
   <tr>    
      <td>Esistenza[EUtenteTo]:</td>    
      <td>1. L'utente a cui inviare l'amicizia non esiste[Errore]<br> 2. L'utente a cui inviare l'amicizia esiste[Successo_EUtenteTo]</td>    
   </tr>    
</table> 

#### Test cases 
<table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_3.1_1</td>    
      <td>LoUtenteFrom_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_3.1_2</td>    
      <td>LoUtenteFrom_2, EUtenteTo_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_3.1_3</td>    
      <td>LoUtenteFrom_2, EUtenteTo_2</td>    
      <td>Corretto</td>    
   </tr>   
</table> 

#### Confermare amicizia tra due account
<table>    
   <tr>    
      <td>PARAMETRO:</td>    
      <td>UtenteTo</td>    
   </tr>      
   <tr>    
      <td>Loggato[LoUtenteTo]:</td>    
      <td>1. L'utente che ha ricevuto l'amicizia non è loggato[Errore] <br> 2. L'utente che ha ricevuto l'amicizia è loggato [Successo_LoUtenteFrom] </td>    
   </tr>    
</table> 

<table>    
   <tr>    
      <td>PARAMETRO:</td>    
      <td>UtenteFrom</td>    
   </tr>       
   <tr>    
      <td>Esistenza[EUtenteFrom]:</td>    
      <td>1. L'utente che ha inviato l'amicizia non esiste[Errore]<br> 2. L'utente che ha inviato l'amicizia esiste[Successo_EUtenteFrom]</td>    
   </tr>    
</table> 

#### Test cases 
<table>    
   <tr>    
      <td>Codice</td>    
      <td>Combinazione</td>    
      <td>Esito</td>    
   </tr>    
   <tr>    
      <td>TC_3.2_1</td>    
      <td>LoUtenteTo_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_3.2_2</td>    
      <td>LoUtenteTo_2, EUtenteFrom_1</td>    
      <td>Errore</td>    
   </tr>    
   <tr>    
      <td>TC_3.2_3</td>    
      <td>LoUtenteTo_2, EUtenteFrom_2</td>    
      <td>Corretto</td>    
   </tr>   
</table>
    
###  Film   
 #### Aggiungere un giudizio  
  
<table>  
   <tr>  
      <td>PARAMETRO: </td>  
      <td>Voto</td>  
   </tr>  
   <tr>  
      <td>FORMATO: </td>  
      <td></td>  
   </tr>  
   <tr>  
      <td>Selezione[SVoto]:</td>  
      <td>1. L'Utente non ha selezionato alcun valore[Errore]<br> 2. L'Utente ha selezionato uno dei dieci voti possibili[Successo_SVoto]</td>  
   </tr>  
</table>  
  
<table>  
   <tr>  
      <td>PARAMETRO: </td>  
      <td>Film</td>  
   </tr>  
   <tr>  
      <td>FORMATO:</td>  
      <td></td>  
   </tr>  
   <tr>  
      <td>Presenza[PFilm]:</td>  
      <td>1. Il film è gia presente in film guardati dell'utente[Errore]<br> 2. Il film non è presente in film guardati dell'utente[Successo_PFilm]</td>  
   </tr>  
</table>  
  
#### Test cases  
  
<table>  
   <tr>  
      <td>Codice</td>  
      <td>Combinazione</td>  
      <td>Esito</td>  
   </tr>  
   <tr>  
      <td>TC_4.1_1</td>  
      <td>SVoto_1</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
      <td>TC_4.1_2</td>  
      <td>SVoto_2, PFilm_1</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
      <td>TC_4.1_3</td>  
      <td>SVoto_2, PFilm_2</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
</table>  
  
#### Modificare un giudizio  
  
<table>  
   <tr>  
      <td>PARAMETRO: </td>  
      <td>Voto</td>  
   </tr>  
   <tr>  
      <td>FORMATO: </td>  
      <td></td>  
   </tr>  
   <tr>  
      <td>Selezione[SVoto]:</td>  
      <td>1. L'Utente non ha selezionato alcun valore[Errore]<br> 2. L'Utente ha selezionato uno dei dieci voti possibili[Successo_SVoto]</td>  
   </tr>  
</table>  
  
<table>  
   <tr>  
      <td>PARAMETRO: </td>  
      <td>Film</td>  
   </tr>  
   <tr>  
      <td>FORMATO:</td>  
      <td></td>  
   </tr>  
   <tr>  
      <td>Presenza[PFilm]:</td>  
      <td>1. Il film non è presente in film guardati dell'utente[Errore]<br> 2. Il film è presente in film guardati dell'utente[Successo_PFilm]</td>  
   </tr>  
</table>  
  
#### Test cases  
  
<table>  
   <tr>  
      <td>Codice</td>  
      <td>Combinazione</td>  
      <td>Esito</td>  
   </tr>  
   <tr>  
      <td>TC_4.2_1</td>  
      <td>SVoto_1</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
      <td>TC_4.2_2</td>  
      <td>SVoto_2, PFilm_1</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
      <td>TC_4.2_3</td>  
      <td>SVoto_2, PFilm_2</td>  
      <td>Errore</td>  
   </tr>  
   <tr>  
</table>  
    
### Liste  
#### Creare una lista
 <table>    
   <tr>
      <td>PARAMETRO: </td>
      <td>Nomelista</td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LNomelista]:</td>  
      <td>1.  < 5 or >50[Errore]<br> 2. >4 & <51[Successo_LNomelista]</td>    
   </tr>    
   <tr>    
      <td>Esistenza:</td> 
      <td>1. Il nome della lista è gia presente nelle liste dell'utente [if_LNomeLista_OK][Errore]<br>2. Il nome della lista non è presente nelle liste già in possesso [if ENomeLista_OK][Successo_NomeLista]</td>    
   </tr>    
</table>    
<br>    
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Visibiltà[VLista]</td>
   </tr>
   <tr>    
      <td>Selezione</td>    
      <td>1. L'Utente non ha selezionato alcun valore[Errore]<br> 2. L'Utente ha selezioneto una delle tre visibilità [Successo_VLista] </td>    
   </tr>    
    
</table>    
      
    
<table>    
<tr><th>Codice </th> <th>Combinazione     </th> <th>Esito</th></tr>    
<tr><td>TC_5.1_1        </td><td> LNomeLista1 </td><td> Errore </td></tr>    
<tr><td>TC_5.1_2        </td><td> LNomeLista2, VLista1 </td><td> Errato </td></tr>    
<tr><td>TC_2.2_3        </td><td>LNomeLista2, VLista2  </td><td> Corretto </td></tr>    
</table>

#### Modifica lista
 <table>    
   <tr>
      <td>PARAMETRO: </td>
      <td>Nomelista</td>    
   </tr>    
   <tr>    
      <td>Lunghezza[LNomelista]:</td>  
      <td>1.  < 5 or >50[Errore]<br> 2. >4 & <51[Successo_LNomelista]</td>    
   </tr>    
   <tr>    
      <td>Esistenza:</td> 
      <td>1. Il nome della lista è gia presente nelle liste dell'utente [if_LNomeLista_OK][Errore]<br>2. Il nome della lista non è presente nelle liste già in possesso [if ENomeLista_OK][Successo_NomeLista]</td>    
   </tr>    
</table>    
<br>    
<table>    
   <tr>    
      <td>PARAMETRO: </td>    
      <td>Visibiltà[VLista]</td>
   </tr>
   <tr>    
      <td>Selezione</td>    
      <td>1. L'Utente non ha selezionato alcun valore[Errore]<br> 2. L'Utente ha selezioneto una delle tre visibilità [Successo_VLista] </td>    
   </tr>    
    
</table>    
      
    
<table>    
<tr><th>Codice </th> <th>Combinazione     </th> <th>Esito</th></tr>    
<tr><td>TC_5.2_1        </td><td> LNomeLista1 </td><td> Errore </td></tr>    
<tr><td>TC_5.2_2        </td><td> LNomeLista2, VLista1 </td><td> Errato </td></tr>    
<tr><td>TC_5.2_3        </td><td>LNomeLista2, VLista2  </td><td> Corretto </td></tr>    
</table>




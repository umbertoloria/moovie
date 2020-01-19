# Test Summary Report

## Panoramica generale
In questo documento viene mostrata una panoramica generale su quella che è l'attività di testing fatta sul sito "Moovie".
Questa attività ha un'importanza enorme ai fini del corretto funzionamento della web application e dunque merita di 
essere commentata.
Il testing da noi effettuato può essere diviso in 3 diverse categorie che sono: 
- Test di unità;
- Test di integrazione;
- Test di sistema. 

Il test di unità è stato effettuato attraverso il framework "PHPUnit" con il quale siamo andati a testare non solo alcuni
DAO di Moovie ma anche alcuni selezionati controller. Uno degli strumenti usati per effettuare il testing di Unità è lo 
stub, ossia un'implementazione fittizia del nostro database in modo tale che le unità nel momento in cui venivano testate, 
non andavano ad operare direttamente sul nostro database ma operavano su strutture dati create appositamente per gestire 
alcuni tipi di dat. 

Dopo il Test di Unità è stato eseguito il test di Integrazione dei controller con i DAO (eseguito con PHOUnit) in cui 
tutte le funzionalità che i controller andavano ad eseguire, si interfacciavano direttamente con i DAO e non più con 
gli stub.

L'ultimo test effettuato è il test di Sistema in cui è stata testato l'interfacciamento dell'utente verso il sito e 
dunque, se le funzionalità del sito operavano correttamente.

## Test Execution 
Durante l'attività di testing, molti sono stati i casi di test eseguiti ma nessuno di essi ha dato esito negativo.
Il sito Moovie ha mostrato un funzionamento coerente con le specifiche in possesso e quindi, l'attività di testing 
effettuata non ci ha permesso ri rilevare alcun tipo di errore. 


# Moovie
Progetto di **Ingegneria del Software** per il **Corso di Laurea in Informatica** dell'*Università degli Studi di Salerno*.

Studente | Matricola
---------|----------
Umberto Loria | 0512105102
Michelantonio Panichella | 0512105402
Gianluca Pirone | 0512105456

Supervisore | Ruolo
------------|------
Andrea De Lucia | Docente
Manuel De Stefano | Tutor

# Indice
1. [Problem Domain](#problem-domain)
2. [Scenari](#scenari)
    1. [Voglio vedere un bel film sabato sera](#voglio-vedere-un-bel-film-sabato-sera)
    2. [Ho guardato uno splendido film](#ho-guardato-uno-splendido-film)
    3. [Suggerire dei film ad un amico non è registrato su Moovie](#suggerire-dei-film-ad-un-amico-che-non--registrato-su-moovie)
    4. [Voglio informazioni su un attore, sceneggiatore o regista](#voglio-informazioni-su-un-attore-sceneggiatore-o-regista)
    5. [Voglio aggiungere un film ad una mia lista](#voglio-aggiungere-un-film-ad-una-mia-lista)
    6. [Suggerire un film ad un amico che è registrato su Moovie](#suggerire-un-film-ad-un-amico-che--registrato-su-moovie)
3. [Requisiti](#requisiti)
    1. [Requisiti funzionali](#requisiti-funzionali)
    2. [Requisiti non-funzionali](#requisiti-non-funzionali)
    3. [Piano del progetto](#piano-del-progetto)
    4. [Ambiente di esecuzione](#ambiente-di-esecuzione)

# Problem Statement

## Problem Domain
Oggigiorno ci sono talmente tanti film da vedere ma è difficile capire se la visione di uno nuovo ne varrà la pena. In altre parole, come trovo un film del quale innamorarmi come ho fatto per tanti altri? Potrei provare a vedere tutti i film di un determinato attore, ma probabilmente non mi piaceranno tutti. Potrei vedere tutti i film di un regista/sceneggiatore che mi piace, ma spesso nel cinema d’autore il numero di film girati dallo stesso regista si contano sulle dita delle mani (stesso vale per uno sceneggiatore). Posso provare a farmi consigliare qualche altro film dai miei amici appassionati di cinema. Che succede quando mi sembra di averli davvero visti tutti?

Moovie è una piattaforma fornita di un enorme catalogo di film, che contiene una grande e dettagliata quantità di dati riguardanti film, e che è pronta a fornire decine e decine di film sulla base dei tuoi gusti. Moovie ti suggerisce una lista di film imperdibili selezionati appositamente per te, film che magari non avresti mai preso in considerazione.

Tutto quello che devi fare è registrarti e parlarci un po’ dei tuoi gusti personali in fatto di cinema. Dopodiché, ti basterà effettuare una ricerca per trovare il film perfetto per questa sera. Oltre a questo, sarai in grado di leggere approfondimenti riguardo la carriera dei tuoi attori, registi e sceneggiatori preferiti, oltre che tenere traccia dei film che hai già visto.

Se lo vorrai, potrai essere maggiormente connesso con le persone che condividono il tuo stesso interesse per il cinema, amici o magari persone nuove, e condividere la tua attività con loro.

# Scenari

## Voglio vedere un bel film sabato sera
Dopo una settimana di lavoro, Michele non vede l’ora di guardare un bel film il sabato sera, in televisione accanto alla sua fornitissima collezione di Blu Ray. Se un film manca nella collezione, lo noleggia e se gli piace lo compra.
Mentre è in autobus verso il noleggio Blu Ray, prende il suo cellulare e va sul sito web www.moovie.me. Cliccando su “**Accesso**”, si presenta una schermata di input che richiede alcuni campi. Alla voce “e-mail” scrive “michele@pippo.pluto”, e alla voce “password” scrive “adnam”. Clicca “Accesso” ma il sistema notifica “I dati immessi non corrispondono”. Si accorge di aver sbagliato e scrive “adnama”. Clicca “Accesso”, e il sistema accede.
A questo punto, per scegliere il prossimo film da guardare, Michele può:

* consultare le proprie liste, aprire la lista “Guarda più tardi”, e scegliere un film;

* cercare il profilo della sua amica Amanda, aprire la sua lista “Migliori film del secolo” (può vedere le sue liste solo avendo l’amicizia), scegliere un film dalla lista ed aggiungerlo nella propria lista “Guarda più tardi”;

* cliccare su “Suggerisci” e scegliere un film tra i suggerimenti automatici presenti nella schermata successiva.

Una volta scelto il film, lo noleggia, torna a casa e lo guarda.

## Ho guardato uno splendido film
Michele ha appena finito di guardare “Eternal Sunshine of the Spotless Mind”. Gli è piaciuto talmente tanto che vorrebbe consigliarlo ai suoi amici, specialmente Amanda. Qualche mese prima avrebbe mandato molti messaggi a questi ultimi, oppure ne avrebbe parlato a lavoro con i colleghi, ma da quando ha cominciato a usare Moovie, i suoi giudizi li esprime direttamente lì.

Michele allora prende il suo cellulare, va su www.moovie.me, e cerca la voce “Accesso” ma risulta già loggato, visto che aveva effettuato l’accesso poche ore prima. Sulla pagina iniziale, trova già i film presenti nella sua lista “Guarda più tardi”, trova quello che ha appena visto e ci clicca sopra. Arrivato alla pagina del film e clicca su “Ho già visto questo film”. Si aprirà una schermata popup che chiederà un voto da 1 a 10. Michele scrive 9 e clicca “Applica”. 

La schermata si chiude, e Michele si troverà sempre sulla pagina del film. In questo modo, Michele sta aggiungendo informazioni riguardo i suoi gusti sulla piattaforma, che sarà in grado di suggerirgli film ancora più in linea con i suoi gusti.

Clicca su “Aggiungi ad una lista…”, si apre una schermata popup contenente tutte le sue liste, sceglie “Film che consiglio”, e la schermata si chiude, mostrando sempre la pagina del film. In questo modo, tutti gli utenti che “seguono” questa lista saranno notificati del nuovo aggiornamento.

Se quel film fosse già stato votato, e Michele avesse voluto modificare quel giudizio, sarebbe potuto andare sulla lista “Film guardati”, scegliere il film, e cliccare su “Modifica giudizio”, per poi inserire il nuovo voto, sempre da 1 a 10.

## Suggerire dei film ad un amico che non è registrato su Moovie
A Stefano piacciono molto i film, mai però quanto a Michele. Quest’ultimo ha capito i gusti di Stefano, e vuole consigliargli tanti di quei film che quasi non gli vengono in mente. Proprio per questo motivo, Michele consiglia a Stefano di crearsi un account su Moovie, per poter consultare la sua lista “migliori film biografici”.

Stefano allora apre una nuova scheda sul browser, va su www.moovie.me e clicca su “Registrazione”. Gli si presenta una schermata che chiede in input alcuni campi: nella voce “nome completo” inserisce “Stefano Bisettrice”, nella voce “indirizzo e-mail” inserisce “stefano@pippo.pluto”, nella voce “password” inserisce “ciaociao”. Appena clicca al di fuori del campo “password” appare una scritta che suggerisce “La password non è valida: devi inserire almeno un numero”. Allora Stefano sostituisce la password con “ciaociao1”. Nella voce “conferma password” inserisce “ciaociao1”.

Michele potrebbe anche chiedere a Stefano di inserire la sua e-mail, durante la sua fase di registrazione, nella voce “consigliato da”, per poter sbloccare le funzionalità dell’Account Pro, ma ovviamente Michele ha già queste funzionalità da tempo, avendo consigliato il sito a tanti amici. In particolare, Michele ha dovuto consigliare questo sito ad almeno 5 utenti per poter usufruire delle funzionalità dell’Account Pro. Se Stefano indica un account nella suddetta voce, questo account sarà automaticamente amico dell’account di Stefano.

Stefano, a questo punto, clicca su “Registrati”. La nuova pagina che si presenta mostra il testo “attiva l’account tramite la e-mail che ti abbiamo inviato”. Dopo un po’, sulla casella e-mail di Stefano arriva una nuova e-mail inviata da Moovie. In questa mail viene spiegata la procedura di attivazione dell’account appena creato. Questa procedura prevede di cliccare sul link di attivazione presente nella e-mail.

Appena Stefano clicca sul link di Moovie, la pagina che si apre presenta la fase “Primi passi”. Questa pagina contiene un titolo “Quali film hai già visto?” e una griglia di film, e Stefano deve scegliere quelli che ha già visto. Se ha inserito nel campo “consigliato da” la mail di un utente, i film presenti nella pagina saranno film simili a quelli dell’account amico (visto che quell’account è amico dell’account di Stefano). Stefano, in ogni caso, deve selezionare almeno 5 film, e inserire un voto (da 1 a 10) per ogni film, altrimenti il sistema non lo farà continuare. Una volta aver scelto il numero minimo di film, il pulsante “Entra nel fantastico mondo di Moovie” si abiliterà, e una volta cliccato, Stefano sarà riportato alla pagina iniziale, dove potrà usare il suo account Moovie in piena libertà.

## Voglio informazioni su un attore, sceneggiatore o regista
Amanda vuole vedere un altro film diretto da “Tarantino”, visto che ha particolarmente apprezzato il film “Pulp Fiction” che lei e Michele hanno visto il giorno prima. Allora prende il suo tablet, apre il browser, va su www.moovie.me, accede alle funzionalità di ricerca raggiungibili nel menu del sito (autenticazione non necessaria). In realtà le basterebbe accedere al suo account e andare nella lista “film guardati”. Nello spazio di ricerca, Amanda inserisce “Pulp Fiction” e preme Invio. La nuova pagina che si presenta conterrà i risultati della ricerca, e tra questi clicca sulla voce “Pulp Fiction”. Giunta alla scheda del film, ricca di informazioni riguardo gli attori, il regista, e le saghe di cui potrebbe far parte, clicca sulla voce “Quentin Tarantino”, e finalmente arriva alla pagina delle informazioni del noto regista. In questa pagina ci sono tutti i film diretti, scritti e recitati da Tarantino. Amanda si accorge che “Pulp Fiction”, oltre ad essere stato girato, è stato anche scritto da “Tarantino”!

## Voglio aggiungere un film ad una mia lista
Amanda si trova sulla pagina di “Quentin Tarantino” su Moovie. Interessata, comincia a sbirciare tra tutti i lavori di questo artista, per poter cercare il prossimo film da vedere. La pagina dell’artista mostra tutti i film in cui Tarantino ha partecipato. Nel caso specifico, ci saranno tanti film nel reparto “regie”, e alcuni film nel reparto “recitazioni”. Una volta scelto il film, Amanda raggiunge la sua scheda informativa, e clicca su “Guarda più tardi“. Il sito adesso saprà che tra i film da guardare c’è “Kill Bill: Volume 1”.

## Suggerire un film ad un amico che è registrato su Moovie
Stefano ha una scheda di browser aperta sul suo computer al sito www.moovie.me, e dopo aver effettuato l’accesso, si è subito reso conto di aver trovato un sito davvero valido.

Allora raggiunge l’area di ricerca presente nel menu, e cerca il proprio amico Michele. La pagina successiva mostra i vari risultati della ricerca, e tra questi è presente l’account di Michele. Cliccandoci sopra, la nuova pagina mostra il profilo di Michele, tutte le liste e attività pubbliche. Stefano trova quindi la voce “Aggiungi agli amici”, e cliccandoci sopra, viene notificato dell’invio della richiesta di amicizia. Intanto Michele, che stava usando Moovie, trova la richiesta di amicizia di Stefano nella sezione delle notifiche. Allora, Michele clicca sulla notifica, che lo porta sul profilo di Stefano. Quando lo riconosce, clicca su “Accetta richiesta” (situata nello stesso punto dove c’era “Aggiungi agli amici” sul computer di Stefano). Fatto questo, la pagina prima mostra un popup contenente il messaggio “Amicizia accettata”, e successivamente si aggiorna, mostrando di nuovo il profilo di Stefano.

Stefano, intanto, ha notato la notifica della conferma dell’amicizia (sempre nella sezione notifiche), e clicca su questa notifica, arrivando sul profilo di Michele. A questo punto, Stefano sbircia nella lista “film guardati” di Michele. Cliccando su questa lista, la pagina cambia mostrando i film presenti nella lista. Tra questi, Stefano nota subito che non è presente “Forrest Gump”, il suo film preferito. Sconcertato che un appassionato di cinema come Michele non abbia mai visto questo famosissimo film, glielo suggerisce immediatamente. Accede alle funzionalità di ricerca, cerca “Forrest Gump”, arriva alla pagina dei risultati, e tra questi clicca sulla scheda del film. Arrivato alla scheda del film, Stefano prima aggiunge il film alla propria lista dei “film guardati” (con voto 10), e poi clicca su “Suggerisci a un amico”. Sul popup che si è appena aperto, Stefano vede tutti i suoi amici (in questo caso solo Michele), seleziona questa voce, preme “Suggerisci”, il popup si chiude, e se ne apre un altro che contiene la scritta “Film suggerito”.

Intanto Michele, che è ancora collegato su Moovie, trova una nuova notifica che dice “Stefano ti consiglia Forrest Gump”. Michele allora clicca sul film, arriva sulla sua scheda, e lo aggiunge subito alla lista “film guardati” (con voto 10), perché ovviamente lui lo aveva già visto, ma prima di conoscere Moovie.

# Requisiti
I requisiti descritti sono catalogati secondo il modello **F.U.R.P.S.**

## Requisiti funzionali

**M_RF_1**: Ricerca e consultazione

* RF_1.1: Ricerca di un film
* RF_1.2: Ricerca di un artista
* RF_1.3: Ricerca di un utente

**M_RF_2**: Gestione account

* RF_2.1: Creare un account
* RF_2.2: Attivare un account
* RF_2.3: Autenticare un account
* RF_2.4: Richiesta del cambio password
* RF_2.5: Conferma del cambio password
* RF_2.6: Richiedere amicizia tra due account
* RF_2.7: Confermare amicizia tra due account

**M_RF_3**: Gestione dei film guardati

* RF_3.1: Aggiungere giudizio su un film aggiungendolo in “Film guardati”
* RF_3.2: Modificare giudizio su un film
* RF_3.3: Rimuovere giudizio su un film (rimuovendo il film da “Film guardati”)

**M_RF_4**: Gestione delle liste

* RF_4.1: Creare una lista
* RF_4.2: Modificare una lista
* RF_4.3: Eliminare una lista
* RF_4.4: Aggiungere o rimuovere un film a una lista
* RF_4.5: Seguire una lista altrui

**M_RF_5**: Suggerimenti
* RF_5.1: Suggerire un film a un account amico
* RF_5.2: Suggerimento automatico di un film

## Requisiti non-funzionali
### Usability:
* L’utente non deve sentirsi smarrito durante l’uso delle interfacce di Moovie
* L’utente deve sempre poter raggiungere la home e login/logout
* Il sito si adatterà alle dimensioni del dispositivo su cui si naviga
* Sarà totalmente gratuito

### Reliability:
* Moovie dovrà sempre garantire la consistenza dei dati memorizzati

### Performance:
* Il tempo di attesa di pagina su laptop moderno e rete in fibra sarà minore di 1s
* Moovie sarà scalabile in numero di utenti

### Supportability:
* Sarà supportato dai browser Google Chrome, Mozilla Firefox, Safari

### Vincoli (pseudo requisiti)
*. Il sito prevede l’utilizzo delle seguenti tecnologie: Apache, MySQL, PHP

## Piano del progetto
- [x] Problem Statement: 11 ottobre 2019;
- [x] Requisiti e casi d’uso: 25 ottobre 2019;
- [x] Requirements Analysis Document: 8 novembre 2019;
- [ ] System Design Document: 29 novembre 2019;
- [ ] Specifica delle interfacce dei moduli del sottosistema da implementare: 13 dicembre 2019;
- [ ] Piano di test di sistema e specifica dei casi di test per il sottosistema da implementare: 13 dicembre 2019.
- [ ] Rilascio del sito Moovie: 10 Gennaio 2020

## Ambiente di esecuzione
Il sito sarà fruibile sui browser Google Chrome, Mozilla Firefox, Safari, Opera e Microsoft Edge. Sia su versioni desktop che su versioni mobile di questi.

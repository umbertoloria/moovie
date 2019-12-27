# FILMS

create table films
(
    id     int auto_increment
        primary key,
    titolo varchar(100) not null,
    durata int          not null,
    anno   year         not null,
    fulltext (titolo)
);

INSERT INTO films (id, titolo, durata, anno)
VALUES (1, 'La grande scommessa', 130, 2015);
INSERT INTO films (id, titolo, durata, anno)
VALUES (2, 'American Sniper', 134, 2014);
INSERT INTO films (id, titolo, durata, anno)
VALUES (3, 'The Wolf of Wall Street', 180, 2013);
INSERT INTO films (id, titolo, durata, anno)
VALUES (4, 'Revenant - Redivivo', 156, 2015);
INSERT INTO films (id, titolo, durata, anno)
VALUES (5, 'Shutter Island', 138, 2010);
INSERT INTO films (id, titolo, durata, anno)
VALUES (6, 'Prova a prendermi', 141, 2002);
INSERT INTO films (id, titolo, durata, anno)
VALUES (7, 'Interstellar', 169, 2014);
INSERT INTO films (id, titolo, durata, anno)
VALUES (8, 'Avengers: Infinity War', 160, 2018);
INSERT INTO films (id, titolo, durata, anno)
VALUES (9, 'Venom', 140, 2018);
INSERT INTO films (id, titolo, durata, anno)
VALUES (10, 'A Star Is Born', 134, 2018);
INSERT INTO films (id, titolo, durata, anno)
VALUES (11, 'A proposito di Davis', 110, 2013);
INSERT INTO films (id, titolo, durata, anno)
VALUES (12, 'X-Men', 104, 2000);
INSERT INTO films (id, titolo, durata, anno)
VALUES (13, 'X-Men 2', 134, 2003);
INSERT INTO films (id, titolo, durata, anno)
VALUES (14, 'Bastardi senza gloria', 153, 2009);
INSERT INTO films (id, titolo, durata, anno)
VALUES (15, 'Bohemian Rhapsody', 134, 2018);
INSERT INTO films (id, titolo, durata, anno)
VALUES (16, 'L''uomo senza sonno', 102, 2004);
INSERT INTO films (id, titolo, durata, anno)
VALUES (17, 'C''era una volta a... Hollywood', 161, 2019);
INSERT INTO films (id, titolo, durata, anno)
VALUES (18, 'Il grande Gatsby', 142, 2013);
INSERT INTO films (id, titolo, durata, anno)
VALUES (19, 'Django Unchained', 165, 2012);
INSERT INTO films (id, titolo, durata, anno)
VALUES (20, 'Inception', 148, 2010);
INSERT INTO films (id, titolo, durata, anno)
VALUES (21, 'The Irishman', 209, 2019);
INSERT INTO films (id, titolo, durata, anno)
VALUES (22, 'Toro scatenato', 129, 1980);
INSERT INTO films (id, titolo, durata, anno)
VALUES (23, 'Taxi Driver', 113, 1976);
INSERT INTO films (id, titolo, durata, anno)
VALUES (24, 'The Social Network', 121, 2010);
INSERT INTO films (id, titolo, durata, anno)
VALUES (25, 'Se mi lasci ti cancello', 108, 2004);

# FILMS DESCRIZIONI

create table films_descrizioni
(
    film        int  not null
        primary key,
    descrizione text not null,
    fulltext (descrizione),
    foreign key (film) references films (id) on update cascade on delete cascade
);

INSERT INTO films_descrizioni (film, descrizione)
VALUES (1,
        'Narra di un gruppo di investitori che avevano intuito cosa stesse per succedere sul mercato prima dello scoppio della crisi finanziaria del 2007-2008.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (2,
        'Chris Kyle è un giovane ragazzo del Texas, amante della caccia, dei rodeo, della sua famiglia e della patria. Decide di arruolarsi nei Navy SEAL, il famoso corpo d''élite della Marina degli Stati Uniti.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (3,
        'La pellicola narra l''ascesa e la caduta di Jordan Belfort, spregiudicato broker newyorkese. Fulcro della pellicola è la sua vita fatta di eccessi che lo porteranno poi a una rovinosa caduta.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (4,
        'La pellicola è parzialmente ispirata alla vita del cacciatore di pelli Hugh Glass, vissuto a cavallo tra il Settecento e l''Ottocento e che, nel 1823, durante una spedizione commerciale lungo il Missouri, fu abbandonato in fin di vita dai suoi compagni, riuscendo a sopravvivere.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (5,
        'Nel 1954, gli agenti federali Edward "Teddy" Daniels e la sua spalla Chuck Aule vengono mandati all''Ashecliff Hospital, su Shutter Island, specializzato nella cura di criminali malati di mente. I due agenti devono investigare sulla scomparsa di Rachel Solando, una paziente rinchiusa in una stanza blindata e svanita nel nulla.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (6,
        'Un agente dell''FBI è sulle tracce di un giovane artista del travestimento, che è riuscito ad estorcere più di sei milioni di dollari in varie frodi, impersonando di volta in volta un personaggio diverso.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (7,
        'In un futuro non precisato, un drastico cambiamento climatico colpisce duramente l''agricoltura. Il granturco è l''unica coltivazione ancora in grado di crescere ed un gruppo di scienziati è intenzionato ad attraversare lo spazio per trovare nuovi luoghi adatti a coltivarlo.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (8,
        'Iron Man, Thor, Hulk egli Avengers si uniscono per combattere ancora il loro più potente nemico: il malvagio Thanos. Il destino del pianeta e dell''umanità non sono mai stati più incerti.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (9,
        'Nel laboratorio dell''ambigua Life Foundation, Carlton Drake, leader senza scrupoli, tenta di innestare il simbionte che ha riportato da una missione spaziale dentro un organismo umano. Le cavie però muoiono una dopo l''altra. Il giornalista d''inchiesta Eddie Brock, che a causa del suo ultimo incontro con Drake ha perso il lavoro e la fidanzata, non può stare a guardare e s''intrufola nel laboratorio. Ma è proprio in Eddie che il parassita alieno Venom troverà l''ospite perfettamente compatibile di cui andava in cerca.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (10,
        'In questa nuova rivisitazione della tormentata storia d''amore, Cooper interpreta Jackson Maine, musicista di successo che si sta però avviando sul viale del tramonto che scopre, e si innamora della squattrinata artista Ally.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (11,
        'Nella New York degli anni 60, Lewin Davis, un cantante folk di talento con qualche problema economico, lotta per guadagnarsi da vivere come musicista e affronta degli ostacoli che sembrano insormontabili.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (12,
        'Uomini nati con differenze genetiche che li rendono superiori e osteggiati dagli altri esseri umani e che nonostante tutto, tentano di coabitare in pace.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (13,
        'Mentre Magneto è rinchiuso nella prigione di plastica, un mutante attenta alla vita del presidente degli Stati Uniti e una misteriosa cospirazione del governo rischia di cancellare per sempre l''esistenza degli X Men.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (14,
        'Francia, Seconda Guerra Mondiale: un gruppo di soldati americani di origine ebraica viene paracadutato sul suolo francese per una missione speciale. L''intenzione del gruppo è anche quella di uccidere il maggior numero possibile di tedeschi. Per riuscire nell''impresa, i soldati si avvaloreranno anche di una serie di armi non convenzionali.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (15,
        'La pellicola segue i primi quindici anni del celebre gruppo rock dei Queen, dalla nascita della formazione nel 1970 fino al concerto Live Aid del 1985.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (16,
        'Da esattamente un anno, il metalmeccanico Trevor Reznik è consumato da un''implacabile insonnia che gli impedisce di ragionare lucidamente. In più, la presenza incombente del misterioso Ivan scatena in lui una confusa ossessione.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (17,
        'Il film, con protagonisti Leonardo DiCaprio, Brad Pitt e Margot Robbie, è ambientato nella Los Angeles del 1969 e segue le vicende di un attore televisivo e della sua controfigura, intenti, sullo sfondo dei fatti legati alla famiglia Manson, a entrare nell''industria cinematografica hollywoodiana.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (18,
        'Il film è tratto dal romanzo omonimo di Francis Scott Fitzgerald. Questa pellicola è la quarta trasposizione cinematografica del romanzo, dopo una versione muta del 1926 andata perduta, una seconda del 1949 e una terza, più famosa, del 1974.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (19,
        'È un omaggio al film del 1966 Django diretto da Sergio Corbucci e interpretato da Franco Nero, che in questo film compare in un cameo. Con i suoi 165 minuti di durata complessiva, è il secondo film più lungo diretto da Tarantino dopo The Hateful Eight.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (20,
        'Nel 2011 ha vinto 4 Premi Oscar: miglior fotografia, miglior sonoro, miglior montaggio sonoro e migliori effetti speciali; è stato inoltre candidato al miglior film, migliore sceneggiatura originale, migliore scenografia e migliore colonna sonora.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (21,
        'La pellicola, con protagonisti Robert De Niro, Al Pacino e Joe Pesci, è l''adattamento cinematografico del saggio del 2004 L''irlandese. Ho ucciso Jimmy Hoffa (I Heard You Paint Houses) scritto da Charles Brandt, basato sulla vita di Frank Sheeran, rieditato in Italia da Fazi Editore nel 2019 col titolo The Irishman.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (22,
        'È fra le opere più importanti nate dalla collaborazione tra il regista Scorsese e l''attore Robert De Niro, nonché uno dei massimi storici del regista stesso. Ispirato dall''autobiografia del pugile Jake LaMotta, Raging Bull: My Story, adattata da Paul Schrader e Mardik Martin, il film fu quasi interamente girato in bianco e nero.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (23,
        'Taxi Driver è un film del 1976 diretto da Martin Scorsese, scritto da Paul Schrader e interpretato da Robert De Niro. Ambientato dopo la guerra del Vietnam a New York, tratta di un giustiziere con elementi neo-noir e da giallo psicologico.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (24,
        'The Social Network è un film del 2010 diretto da David Fincher, incentrato sui fondatori di Facebook e sul fenomeno popolare che ha creato. La pellicola ha vinto 4 Golden Globe, tra cui il più importante, miglior film drammatico, e ha ottenuto 8 candidature agli Oscar 2011, vincendone 3, ossia quello per la miglior sceneggiatura non originale, quello per la miglior colonna sonora e quello per il miglior montaggio.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (25,
        'Il film è stato un successo sia di pubblico che di critica ed è considerato uno dei film più belli del XXI secolo.');
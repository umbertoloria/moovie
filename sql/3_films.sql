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
INSERT INTO films (id, titolo, durata, anno)
VALUES (26, 'Rush', 123, 2013);
INSERT INTO films (id, titolo, durata, anno)
VALUES (27, 'La La Land', 128, 2016);
INSERT INTO films (id, titolo, durata, anno)
VALUES (28, 'Mamma, ho perso l''aereo', 99, 1990);
INSERT INTO films (id, titolo, durata, anno)
VALUES (29, 'Mamma, ho riperso l''aereo: mi sono smarrito a New York', 120, 1992);
INSERT INTO films (id, titolo, durata, anno)
VALUES (30, 'Il lato positivo', 122, 2012);
INSERT INTO films (id, titolo, durata, anno)
VALUES (31, 'Salvate il soldato Ryan', 169, 1998);
INSERT INTO films (id, titolo, durata, anno)
VALUES (32, 'Quo Vado?', 86, 2016);
INSERT INTO films (id, titolo, durata, anno)
VALUES (33, 'Il postino', 108, 1994);
INSERT INTO films (id, titolo, durata, anno)
VALUES (34, 'Ricomincio da tre', 108, 1981);
INSERT INTO films (id, titolo, durata, anno)
VALUES (35, 'Non ci resta che piangere', 167, 1984);
INSERT INTO films (id, titolo, durata, anno)
VALUES (36, 'Forrest Gump', 142, 1994);
INSERT INTO films (id, titolo, durata, anno)
VALUES (37, 'Memento', 113, 2000);
INSERT INTO films (id, titolo, durata, anno)
VALUES (38, 'The Hateful Eight', 187, 2015);
INSERT INTO films (id, titolo, durata, anno)
VALUES (39, 'Pulp Fiction', 154, 1994);
INSERT INTO films (id, titolo, durata, anno)
VALUES (40, 'Kill Bill - Volume 1', 106, 2003);
INSERT INTO films (id, titolo, durata, anno)
VALUES (41, 'Kill Bill: Volume 2', 137, 2004);
INSERT INTO films (id, titolo, durata, anno)
VALUES (42, 'Il caso Spotlight', 127, 2015);
INSERT INTO films (id, titolo, durata, anno)
VALUES (43, 'Half Nelson', 106, 2006);
INSERT INTO films (id, titolo, durata, anno)
VALUES (44, 'Lo sciacallo - Nightcrawler', 117, 2014);
INSERT INTO films (id, titolo, durata, anno)
VALUES (45, 'Southpaw - L''ultima sfida', 124, 2015);
INSERT INTO films (id, titolo, durata, anno)
VALUES (46, 'A Christmas Carol', 92, 2009);
INSERT INTO films (id, titolo, durata, anno)
VALUES (47, 'Don''t Worry', 113, 2018);
INSERT INTO films (id, titolo, durata, anno)
VALUES (48, 'Joker', 123, 2019);
INSERT INTO films (id, titolo, durata, anno)
VALUES (49, 'Lars e una ragazza tutta sua', 106, 2007);
INSERT INTO films (id, titolo, durata, anno)
VALUES (50, 'Fight Club', 139, 1999);

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
INSERT INTO films_descrizioni (film, descrizione)
VALUES (26,
        'L''austriaco Niki Lauda e l''inglese James Hunt s''incontrano per la prima volta sui circuiti di Formula 3. Uno è metodico, razionale, non particolarmente simpatico; l''altro è un donnaiolo che si gode la vita e corre come se non ci fosse un domani. La loro rivalità diventa storica e segna una stagione incredibile dell''automobilismo, fatta di drammi indelebili e miracolose riprese.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (27,
        'Il film racconta la storia d''amore tra un musicista jazz e un''aspirante attrice, interpretati rispettivamente da Ryan Gosling ed Emma Stone, realizzato come un musical contemporaneo che omaggia i classici film musicali prodotti a cavallo fra gli anni ''50 e ''60. Il titolo del film è sia un riferimento alla città di Los Angeles sia al significato di essere nel "mondo dei sogni" o "fuori dalla realtà"');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (28,
        'Il piccolo Kevin viene lasciato in casa da solo a Natale e deve difendere la casa da due malintenzionati che vogliono entrare. Per farlo impiega tutta la sua astuzia ed una serie apparentemente interminabile di trappole e di espedienti mirati a far desistere i due malcapitati ladri.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (29,
        'La numerosa famiglia McCallister decide di passare le vacanze natalizie in Florida, ma all''aeroporto il piccolo Kevin si perde e sbaglia aereo, ritrovandosi così a New York. Mentre i genitori lo cercano, il ragazzino occupa, grazie alla carta di credito del padre, una suite al grand hotel e fa amicizia con una barbona.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (30,
        'Pat, affetto da sindrome bipolare, ha passato otto mesi in un istituto per malattie mentali dopo aver compiuto un gesto insensato. Dimesso in seguito a un patteggiamento della pena che avrebbe dovuto scontare, è ora affidato alla custodia dei suoi genitori, che, nel tentativo di aiutarlo a rimettersi in sesto cercano di condividere con lui la passione di famiglia per la squadra di football dei Philadelphia Eagles. Nel frattempo, però, conosce una ragazza con cui decide di accettare una sfida.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (31,
        'Nei giorni seguenti lo sbarco in Normandia, una madre americana sta per ricevere nello stesso giorno la notizia della morte di tre dei suoi figli su diversi fronti della guerra. Il comandante in capo generale Marshall dà ordine che il quarto fratello, Ryan, sbarcato in Normandia, venga rintracciato e portato a casa.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (32,
        'Un uomo che vive ancora con la famiglia, per timore dell''indipendenza, viene costretto a cambiare la propria vita e doversi adattare ad ogni lavoro, anche i più improbabili e pericolosi.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (33,
        '1948. Il poeta cileno Pablo Neruda viene esiliato su un''isola del sud d''Italia. L''uomo vi si rifugia con la giovane ed affezionata consorte Matilde. Al disoccupato Mario viene affidato l''incarico di consegnare al poeta una nutrita corrispondenza. Giorno dopo giorno i due uomini così diversi diventano amici.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (34,
        'Gaetano è un ragazzo napoletano in cerca di nuovi stimoli e decide così di lasciare casa, lavoro e amici per trasferirsi a Firenze dalla zia. Tra situazioni divertenti, il giovane conosce Marta e iniziA con lei un nuovo capitolo della propria vita.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (35,
        'Un maestro elementare e un bidello si ritrovano, per uno strano scherzo del caso, nel 1492. Decidono di recarsi a Palos, in Andalusia, per fermare Cristoforo Colombo e impedirgli di scoprire le Americhe.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (36,
        'Forrest Gump è un film del 1994 diretto da Robert Zemeckis e interpretato da Tom Hanks. Liberamente ispirato all''omonimo romanzo di Winston Groom del 1986, il film narra l''intensa vita di Forrest Gump, un uomo dotato di uno sviluppo cognitivo inferiore alla norma, nato negli Stati Uniti d''America a metà degli anni quaranta e, grazie a una serie di coincidenze favorevoli, diretto testimone di importanti avvenimenti della storia statunitense.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (37,
        'La sceneggiatura è fondata sul racconto del fratello del regista, Jonathan Nolan, Memento Mori, pubblicato però successivamente alla realizzazione del film. Il film è stato candidato ai Premi Oscar 2002 come migliore sceneggiatura originale e miglior montaggio.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (38,
        'Si tratta del secondo western di Tarantino dopo Django Unchained. Il film è stato annunciato nel novembre 2013, per poi venire cancellato pochi mesi dopo, quando la sua sceneggiatura è trapelata in rete. In seguito Tarantino ha riscritto parte della sceneggiatura, modificandone il finale, e ha dato il via alla produzione, le cui riprese sono iniziate l''8 dicembre 2014 presso Telluride, in Colorado.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (39,
        'La pellicola rilanciò John Travolta, ormai in ombra da anni, e consacrò la giovane e già quotata Uma Thurman. Le interpretazioni di entrambi meritarono una candidatura all''Oscar rispettivamente per miglior attore protagonista e miglior attrice non protagonista. Anche Samuel L. Jackson ricevette la candidatura come miglior attore non protagonista.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (40,
        'Kill Bill - Volume 1 è un film del 2003, scritto e diretto da Quentin Tarantino. È la prima parte di Kill Bill, cui ha fatto seguito Kill Bill - Volume 2 nel 2004.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (41,
        'Kill Bill - Volume 2 è un film del 2004 scritto e diretto da Quentin Tarantino e interpretato da Uma Thurman, David Carradine, Michael Madsen, Daryl Hannah, Gordon Liu, Michael Parks e Perla Haney-Jardine nella sua prima apparizione cinematografica. Si tratta della seconda parte di Kill Bill - Volume 1.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (42,
        'Il caso Spotlight (Spotlight) è un film del 2015 co-scritto e diretto da Tom McCarthy, premiato come miglior film e miglior sceneggiatura originale ai premi Oscar 2016.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (43,
        'Half Nelson è un film del 2006 diretto da Ryan Fleck e interpretato da Ryan Gosling, che per il ruolo del professore di storia tossicodipendente ha vinto svariati premi ed ha ottenuto la nomination all''Oscar come miglior attore protagonista.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (44,
        'Lo sciacallo - Nightcrawler (Nightcrawler) è un film del 2014 scritto e diretto da Dan Gilroy, al suo debutto come regista, con protagonista Jake Gyllenhaal.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (45,
        'Southpaw - L''ultima sfida (Southpaw) è un film del 2015 diretto e prodotto da Antoine Fuqua, con protagonista Jake Gyllenhaal.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (46,
        'A Christmas Carol è un film fantastico del 2009 scritto e diretto da Robert Zemeckis, adattamento cinematografico del racconto Canto di Natale di Charles Dickens. È stato prodotto dalla ImageMovers Digital e dalla Walt Disney Pictures e realizzato in CGI utilizzando la tecnica della performance capture.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (47,
        'Il film è basato sulla biografia Don''t Worry, He Won''t Get Far on Foot del vignettista satirico John Callahan, interpretato nel film da Joaquin Phoenix. Fanno parte del cast principale anche Jonah Hill, Rooney Mara e Jack Black.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (48,
        'La pellicola, basata sull''omonimo personaggio dei fumetti DC Comics ma scollegata dai film del DC Extended Universe, vede Joaquin Phoenix interpretare il protagonista affiancato nel cast da Robert De Niro, Zazie Beetz, Frances Conroy e Brett Cullen.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (49, 'Lars e una ragazza tutta sua (Lars and the Real Girl) è un film del 2007 diretto da Craig Gillespie.');
INSERT INTO films_descrizioni (film, descrizione)
VALUES (50,
        'Fight Club è un film del 1999 diretto da David Fincher, basato sull''omonimo romanzo di Chuck Palahniuk. È stato sceneggiato da Jim Uhls e prodotto da Art Linson e Arnon Milchan.');
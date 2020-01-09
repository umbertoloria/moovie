# ARTISTI

create table artisti
(
    id      int auto_increment primary key,
    nome    varchar(100) not null,
    nascita date         not null,
    fulltext (nome)
);

INSERT INTO artisti (id, nome, nascita)
VALUES (1, 'Christian Bale', '1974-01-30');
INSERT INTO artisti (id, nome, nascita)
VALUES (2, 'Bradley Cooper', '1975-01-05');
INSERT INTO artisti (id, nome, nascita)
VALUES (3, 'Leonardo DiCaprio', '1974-11-11');
INSERT INTO artisti (id, nome, nascita)
VALUES (4, 'Clint Eastwood', '1930-05-31');
INSERT INTO artisti (id, nome, nascita)
VALUES (5, 'Martin Scorsese', '1942-11-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (6, 'Mark Ruffalo', '1967-11-22');
INSERT INTO artisti (id, nome, nascita)
VALUES (7, 'Tom Hardy', '1977-09-15');
INSERT INTO artisti (id, nome, nascita)
VALUES (8, 'Tom Hanks', '1956-07-09');
INSERT INTO artisti (id, nome, nascita)
VALUES (9, 'Ben Kingsley', '1943-12-31');
INSERT INTO artisti (id, nome, nascita)
VALUES (10, 'Steve Carell', '1962-08-16');
INSERT INTO artisti (id, nome, nascita)
VALUES (11, 'Ryan Gosling', '1980-11-12');
INSERT INTO artisti (id, nome, nascita)
VALUES (12, 'Brad Pitt', '1963-12-18');
INSERT INTO artisti (id, nome, nascita)
VALUES (13, 'Margot Robbie', '1990-07-02');
INSERT INTO artisti (id, nome, nascita)
VALUES (14, 'Matthew McConaughey', '1969-11-04');
INSERT INTO artisti (id, nome, nascita)
VALUES (15, 'Anne Hathaway', '1982-11-12');
INSERT INTO artisti (id, nome, nascita)
VALUES (16, 'Matt Damon', '1970-10-08');
INSERT INTO artisti (id, nome, nascita)
VALUES (17, 'Christopher Nolan', '1970-07-30');
INSERT INTO artisti (id, nome, nascita)
VALUES (18, 'Adam McKay', '1968-04-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (19, 'Steven Spielberg', '1946-12-18');
INSERT INTO artisti (id, nome, nascita)
VALUES (20, 'Alejandro González Iñárritu', '1963-08-15');
INSERT INTO artisti (id, nome, nascita)
VALUES (21, 'Anthony Russo', '1970-02-03');
INSERT INTO artisti (id, nome, nascita)
VALUES (22, 'Joe Russo', '1971-07-08');
INSERT INTO artisti (id, nome, nascita)
VALUES (23, 'Ruben Fleischer', '1974-10-31');
INSERT INTO artisti (id, nome, nascita)
VALUES (24, 'Oscar Isaac', '1979-03-09');
INSERT INTO artisti (id, nome, nascita)
VALUES (25, 'Joel Coen', '1954-11-29');
INSERT INTO artisti (id, nome, nascita)
VALUES (26, 'Ethan Coen', '1957-09-21');
INSERT INTO artisti (id, nome, nascita)
VALUES (27, 'Lady Gaga', '1986-03-28');
INSERT INTO artisti (id, nome, nascita)
VALUES (28, 'Bryan Singer', '1965-09-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (29, 'Hugh Jackman', '1968-10-12');
INSERT INTO artisti (id, nome, nascita)
VALUES (30, 'Patrick Stewart', '1940-07-13');
INSERT INTO artisti (id, nome, nascita)
VALUES (31, 'Ian McKellen', '1939-05-25');
INSERT INTO artisti (id, nome, nascita)
VALUES (32, 'Rami Malek', '1981-05-12');
INSERT INTO artisti (id, nome, nascita)
VALUES (33, 'Quentin Tarantino', '1963-03-27');
INSERT INTO artisti (id, nome, nascita)
VALUES (34, 'Michael Fassbender', '1977-04-02');
INSERT INTO artisti (id, nome, nascita)
VALUES (35, 'Diane Kruger', '1976-07-15');
INSERT INTO artisti (id, nome, nascita)
VALUES (36, 'Brad Anderson', '1964-05-02');
INSERT INTO artisti (id, nome, nascita)
VALUES (37, 'Tobey Maguire', '1975-06-27');
INSERT INTO artisti (id, nome, nascita)
VALUES (38, 'Jamie Foxx', '1967-12-13');
INSERT INTO artisti (id, nome, nascita)
VALUES (39, 'Christoph Waltz', '1956-10-04');
INSERT INTO artisti (id, nome, nascita)
VALUES (40, 'Joseph Gordon-Levitt', '1981-02-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (41, 'Robert De Niro', '1943-08-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (42, 'Al Pacino', '1940-04-25');
INSERT INTO artisti (id, nome, nascita)
VALUES (43, 'Baz Luhrmann', '1962-09-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (44, 'Jesse Eisenberg', '1983-10-05');
INSERT INTO artisti (id, nome, nascita)
VALUES (45, 'David Fincher', '1962-08-28');
INSERT INTO artisti (id, nome, nascita)
VALUES (46, 'Jim Carrey', '1962-01-17');
INSERT INTO artisti (id, nome, nascita)
VALUES (47, 'Kate Winslet', '1975-10-05');
INSERT INTO artisti (id, nome, nascita)
VALUES (48, 'Ron Howard', '1954-03-01');
INSERT INTO artisti (id, nome, nascita)
VALUES (49, 'Daniel Bruhl', '1978-06-16');
INSERT INTO artisti (id, nome, nascita)
VALUES (50, 'Chris Hemsworth', '1983-08-11');
INSERT INTO artisti (id, nome, nascita)
VALUES (51, 'Damien Chazelle', '1985-01-19');
INSERT INTO artisti (id, nome, nascita)
VALUES (52, 'Emma Stone', '1988-11-06');
INSERT INTO artisti (id, nome, nascita)
VALUES (53, 'Chris Columbus', '1958-09-10');
INSERT INTO artisti (id, nome, nascita)
VALUES (54, 'Macaulay Carson Culkin', '1980-08-26');
INSERT INTO artisti (id, nome, nascita)
VALUES (55, 'David O. Russell', '1958-08-20');
INSERT INTO artisti (id, nome, nascita)
VALUES (56, 'Jennifer Lawrence', '1990-08-15');
INSERT INTO artisti (id, nome, nascita)
VALUES (57, 'Tom Sizemore', '1961-11-29');
INSERT INTO artisti (id, nome, nascita)
VALUES (58, 'Gennaro Nunziante', '1963-10-30');
INSERT INTO artisti (id, nome, nascita)
VALUES (59, 'Luca Pasquale Medici (Checco Zalone)', '1977-06-03');
INSERT INTO artisti (id, nome, nascita)
VALUES (60, 'Massimo Troisi', '1953-01-19');
INSERT INTO artisti (id, nome, nascita)
VALUES (61, 'Michael Radford', '1946-02-24');
INSERT INTO artisti (id, nome, nascita)
VALUES (62, 'Maria Grazia Cucinotta', '1968-09-27');
INSERT INTO artisti (id, nome, nascita)
VALUES (63, 'Philippe Noirette', '1930-10-01');
INSERT INTO artisti (id, nome, nascita)
VALUES (64, 'Lello Arena', '1953-11-01');
INSERT INTO artisti (id, nome, nascita)
VALUES (65, 'Fiorenza Marchegiani', '1953-07-31');
INSERT INTO artisti (id, nome, nascita)
VALUES (66, 'Roberto Benigni', '1952-10-27');
INSERT INTO artisti (id, nome, nascita)
VALUES (67, 'Robert Zemeckis', '1952-05-14');
INSERT INTO artisti (id, nome, nascita)
VALUES (68, 'Guy Pearce', '1967-10-05');
INSERT INTO artisti (id, nome, nascita)
VALUES (69, 'Samuel L. Jackson', '1948-12-21');
INSERT INTO artisti (id, nome, nascita)
VALUES (70, 'Uma Thurman', '1970-04-29');
INSERT INTO artisti (id, nome, nascita)
VALUES (71, 'Jake Gyllenhaal', '1980-12-19');
INSERT INTO artisti (id, nome, nascita)
VALUES (72, 'Joaquin Phoenix', '1974-10-28');
INSERT INTO artisti (id, nome, nascita)
VALUES (73, 'Edward Norton', '1969-08-18');

# ARTISTI DESCRIZIONI

create table artisti_descrizioni
(
    artista     int  not null primary key,
    descrizione text not null,
    fulltext (descrizione),
    foreign key (artista) references artisti (id) on update cascade on delete cascade
);

INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (1, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (2, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (3, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (4, 'Famoso protagonista del cinema classico e moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (5,
        'Noto regista del cinema moderno. Colleziona diverse opere cinematografiche realizzate in compagnia di Leonardo DiCaprio.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (6, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (7, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (8, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (9, 'Famoso protagonista del cinema classico e moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (10, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (11, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (12, 'All''anagrafe William Bradley Pitt. Ha ricevuto numerosi riconoscimeti, incluso un premio Oscar.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (13, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (14, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (15, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (16, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (17, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (18, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (19, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (20, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (21, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (22, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (23, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (24, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (25, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (26, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (27, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (28, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (29, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (30, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (31, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (32, 'Famoso protagonista del cinema moderno.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (33, 'Uno dei migliori registi al mondo!');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (34, 'Il suo esordio cinematografico risale al 2007 in 300 di Zack Snyder.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (35, 'Vincitrice di numerosi riconoscimenti.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (36,
        'Ha iniziato a lavorare nel mondo del cinema come montatore e cameraman, dirigendo anche alcuni cortometraggi. Nel 2001 dirige Session 9, divenuto in piccolo cult per gli amanti del genere horror.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (37, 'È noto per aver interpretato Peter Parker nella trilogia di Spider-Man di Sam Raimi.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (38,
        'Jamie Foxx, pseudonimo di Eric Marlon Bishop (Terrell, 13 dicembre 1967), è un attore, cantante, comico e pianista statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (39,
        'È vincitore di vari riconoscimenti, compresi due premi Oscar, due premi Golden Globe, due premi BAFTA, due Critics'' Choice Awards, due Screen Actors Guild Awards ed un Prix d''interprétation masculine al Festival di Cannes.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (40,
        'Joseph Leonard Gordon-Levitt (Los Angeles, 17 febbraio 1981) è un attore, regista, sceneggiatore e produttore cinematografico statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (41,
        'Attore prolifico e versatile, è considerato uno dei maggiori interpreti del cinema soprattutto per l''importante produzione a cavallo tra gli anni settanta e gli anni novanta del Novecento, in cui ebbe modo di lavorare con celebri e rinomati registi in pellicole di enorme successo.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (42,
        'Considerato uno dei migliori attori della storia del cinema, Al Pacino ha vinto il Premio Oscar nel 1993 (su 8 nomination totali) per l''interpretazione del tenente colonnello Frank Slade in Scent of a Woman - Profumo di donna. Nel corso degli anni ha interpretato personaggi rimasti impressi nella storia del cinema moderno e nella cultura popolare, tra cui gangster quali Michael Corleone nella trilogia de Il padrino (1972-1974-1990) di Francis Ford Coppola, Tony Montana in Scarface (1983) e Carlito Brigante in Carlito''s Way (1993), entrambi i film per la regia di Brian De Palma, e Benjamin "Lefty" Ruggiero in Donnie Brasco (1997) di Mike Newell.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (43,
        'Mark Anthony "Baz" Luhrmann (Sydney, 17 settembre 1962) è un regista, sceneggiatore, produttore cinematografico ed ex attore australiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (44, 'Jesse Adam Eisenberg (New York, 5 ottobre 1983) è un attore statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (45,
        'Ritenuto uno dei più capaci e poliedrici cineasti statunitensi della sua generazione e più in generale uno tra i migliori registi al mondo, tra le sue opere spiccano numerose pellicole di successo, tra cui Fight Club, Seven e il pluripremiato The Social Network.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (46,
        'Jim Carrey, all''anagrafe James Eugene Redmond Carrey (Newmarket, 17 gennaio 1962), è un attore, comico, cabarettista, imitatore, produttore cinematografico e produttore televisivo canadese naturalizzato statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (47, 'Kate Elizabeth Winslet è una famosa attrice britannica.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (48,
        'Ronald William "Ron" Howard (Duncan, 1º marzo 1954) è un regista, sceneggiatore, attore e produttore cinematografico statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (49,
        'Daniel Brühl, all''anagrafe Daniel César Martín Brühl González Domingo (Barcellona, 16 giugno 1978), è un attore tedesco con cittadinanza spagnola.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (50, 'Christopher "Chris" Hemsworth (Melbourne, 11 agosto 1983) è un attore australiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (51,
        'Damien Sayre Chazelle (Providence, 19 gennaio 1985) è un regista, sceneggiatore e produttore cinematografico statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (52, 'Emily Jean Stone, detta Emma (Scottsdale, 6 novembre 1988), è un''attrice statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (53,
        'Chris Joseph Columbus (Spangler, 10 settembre 1958) è un regista, sceneggiatore e produttore cinematografico statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (54,
        'Macaulay Carson Culkin (New York, 26 agosto 1980) è un attore e musicista statunitense, noto soprattutto come attore bambino per la sua interpretazione di Kevin McCallister nei film Mamma, ho perso l''aereo (1990) e Mamma, ho riperso l''aereo: mi sono smarrito a New York (1992).');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (55, 'David Owen Russell (New York, 20 agosto 1958) è un regista e sceneggiatore statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (56, 'Jennifer Shrader Lawrence (Louisville, 15 agosto 1990) è un''attrice statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (57,
        'Thomas Edward "Tom" Sizemore, Jr. (Detroit, 29 novembre 1961) è un attore, produttore cinematografico e cantante statunitense.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (58, 'Gennaro Nunziante (Bari, 30 ottobre 1963) è un regista, sceneggiatore e attore cinematografico italiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (59,
        'Checco Zalone, nome d''arte di Luca Pasquale Medici (Bari, 3 giugno 1977), è un comico, cabarettista, attore, conduttore televisivo, imitatore, musicista, cantautore, sceneggiatore e regista italiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (60,
        'Massimo Troisi (San Giorgio a Cremano, 19 febbraio 1953 – Roma, 4 giugno 1994) è stato un attore, regista, sceneggiatore e cabarettista italiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (61,
        'Michael Radford (Nuova Delhi, 24 febbraio 1946) è un regista, sceneggiatore e produttore cinematografico britannico.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (62,
        'Maria Grazia Cucinotta (Messina, 27 luglio 1968) è un''attrice, produttrice cinematografica ed ex modella italiana.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (63, 'Philippe Noiret (Lilla, 1º ottobre 1930 – Parigi, 23 novembre 2006) è stato un attore francese.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (64,
        'Lello Arena, all''anagrafe Raffaele Arena (Napoli, 1º novembre 1953), è un cabarettista e attore italiano, esponente della nuova comicità napoletana (portata alla ribalta dal gruppo teatrale La Smorfia nella seconda metà degli anni settanta), assieme a Massimo Troisi ed Enzo Decaro.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (65, 'Fiorenza Marchegiani (Osimo, 31 luglio 1953) è un''attrice italiana.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (66,
        'Roberto Remigio Benigni (Castiglion Fiorentino, 27 ottobre 1952) è un attore, comico, regista e sceneggiatore italiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (67,
        'Regista di pellicole di culto che hanno avuto un grande successo, tra cui All''inseguimento della pietra verde, la trilogia di film de Ritorno al futuro, Chi ha incastrato Roger Rabbit, La morte ti fa bella, Forrest Gump, Cast Away e A Christmas Carol, nel 1995 vince l''Oscar al miglior regista grazie al suo lavoro in Forrest Gump.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (68, 'Guy Edward Pearce (Ely, 5 ottobre 1967) è un attore australiano.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (69,
        'Nei primi anni della carriera ha lavorato con Bruce Willis in diverse pellicole tra cui Pulp Fiction, ricevendo per questa una nomination all''Oscar al miglior attore non protagonista (vinto quell''anno da Martin Landau per Ed Wood), Die Hard - Duri a morire e, successivamente, è apparso anche in Unbreakable - Il predestinato.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (70,
        'È particolarmente nota per l''interpretazione di Mia Wallace nel cult di Quentin Tarantino Pulp Fiction, per la quale ha ricevuto la candidatura al Premio Oscar 1995 come miglior attrice non protagonista, oltre a nomination ai Golden Globe, BAFTA e Screen Actors Guild Award. Ha collaborato sempre con Tarantino in Kill Bill (suddiviso in Kill Bill: Volume 1, del 2003, e Kill Bill: Volume 2 del 2004), film che le hanno fatto ottenere una nomination ai BAFTA come miglior attrice protagonista e due nomination ai Golden Globe come miglior attrice in un film drammatico. Per Gli occhi della vita ha vinto nel 2003 il Golden Globe come miglior attrice in una mini-serie o film tv.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (71,
        'Oltre al suo impegno nel cinema, ha esordito nel 2002 a teatro recitando al Garrick Theatre di Londra in This Is Our Youth di Kenneth Lonergan. Da allora ha recitato in diverse altre opere di prosa e musical, tra cui La piccola bottega degli orrori e Sunday in the Park with George a Broadway nel 2017. Attivista impegnato in numerosi progetti a sostegno dei diritti umani, contro la violenza e a difesa dell''ambiente, ha partecipato nel 2010 alla campagna "Stand Up to Cancer".');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (72,
        'Interprete versatile e carismatico, si è reso famoso grazie all''interpretazione di personaggi complessi, come Jimmy Emmett in Da morire, film del 1995 diretto da Gus Van Sant, o crudeli come Commodo, il malvagio imperatore parricida ne Il gladiatore. Ha offerto altre significative interpretazioni in The Master, interpretando il reduce Freddie Quell per cui ha vinto la Coppa Volpi per la migliore interpretazione maschile alla 69ª Mostra internazionale d''arte cinematografica di Venezia, in Two Lovers, in The Yards e in Quando l''amore brucia l''anima - Walk the Line, film drammatico incentrato sulla vita del cantautore Johnny Cash, dove ha mostrato anche doti canore, vincendo il Golden Globe come miglior attore e un Grammy Award. Ha ricevuto 3 candidature ai Premi Oscar: come miglior attore non protagonista per Il gladiatore e come miglior attore protagonista per Quando l''amore brucia l''anima - Walk the Line e The Master.');
INSERT INTO artisti_descrizioni (artista, descrizione)
VALUES (73,
        'Edward Harrison Norton (Boston, 18 agosto 1969) è un attore, produttore cinematografico, regista e sceneggiatore statunitense. Ha ricevuto tre candidature al Premio Oscar per i film Schegge di paura (per il quale ha vinto il Golden Globe come miglior attore non protagonista), American History X e Birdman.');
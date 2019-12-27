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
VALUES (33, 'Uno dei migliori registi al mondo!
');
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
create table recitazioni
(
    film        int,
    attore      int,
    personaggio varchar(100) not null,
    primary key (film, attore),
    foreign key (film) references films (id) on update cascade on delete cascade,
    foreign key (attore) references artisti (id) on update cascade on delete cascade
);

INSERT INTO recitazioni (film, attore, personaggio)
VALUES (1, 1, 'Michael Burry');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (1, 10, 'Mark Baum');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (1, 11, 'Jared Vennett');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (1, 12, 'Ben Rickert');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (2, 2, 'Chris Kyle');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (3, 3, 'Jordan Belfort');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (3, 13, 'Naomi Lapaglia');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (3, 14, 'Mark Hanna');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (4, 3, 'Hugh Glass');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (4, 7, 'John Fitzgerald');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (5, 3, 'Edward "Teddy" Daniels, Andrew Laeddis');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (5, 6, 'Chuck Aule, Dott. Sheehan');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (5, 9, 'Dott. John Cawley');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (6, 3, 'Frank Abagnale Jr.');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (6, 8, 'Carl Hanratty');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (7, 14, 'Joseph Cooper');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (7, 15, 'Amelia Brand');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (7, 16, 'Dott. Mann');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (8, 6, 'Bruce Banner, Hulk');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (9, 7, 'Eddie Brock, Venom');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (10, 2, 'Jackson Maine');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (10, 27, 'Ally');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (11, 24, 'Llewyn Davis');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (12, 29, 'Logan, Wolverine');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (12, 30, 'Charles Xavier, Professor X');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (12, 31, 'Erik Lehnsherr, Magneto');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (13, 29, 'Logan, Wolverine');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (13, 30, 'Charles Xavier, Professor X');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (13, 31, 'Erik Lehnsherr, Magneto');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (14, 12, 'Tenente Aldo Raine (Aldo l''Apache)');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (14, 34, 'Colonnello Hans Landa');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (14, 35, 'Bridget Von Hammersmark');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (15, 32, 'Freddie Mercury');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (16, 1, 'Trevor Reznik');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (17, 3, 'Rick Dalton');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (17, 12, 'Cliff Booth');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (17, 13, 'Sharon Tate');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (18, 3, 'Jay Gatsby');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (18, 37, 'Nick Carraway');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (19, 3, 'Calvin J. Candie');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (19, 38, 'Django Freeman');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (19, 39, 'dott. King Schultz');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (20, 3, 'Dominic "Dom" Cobb');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (20, 7, 'Eames');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (20, 40, 'Arthur');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (21, 41, 'Frank Sheeran');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (21, 42, 'James Riddle "Jimmy" Hoffa');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (22, 41, 'Jake LaMotta');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (23, 41, 'Travis Bickle');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (24, 44, 'Mark Zuckerberg');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (25, 46, 'Joel Barish');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (26, 49, 'Niki Lauda');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (26, 50, 'James Hunt');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (27, 11, 'Sebastian Wilder');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (27, 52, 'Mia Dolan');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (28, 54, 'Kevin McCallister');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (29, 54, 'Kevin McCallister');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (30, 2, 'Pat Solitano');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (30, 41, 'Pat Solitano Sr.');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (30, 56, 'Tiffany');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (31, 8, 'John Miller');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (31, 16, 'Francis Ryan');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (31, 57, 'Sergente Horwath');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (32, 59, 'Checco Zalone');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (33, 60, 'Mario Ruoppolo');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (33, 62, 'Beatrice Russo');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (33, 63, 'Pablo Neruda');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (34, 60, 'Gaetano');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (34, 64, 'Lello');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (34, 65, 'Marta');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (35, 60, 'Mario');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (35, 66, 'Saverio');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (36, 8, 'Forrest Gump');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (37, 68, 'Leonard Shelby');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (38, 69, 'Magg. Marquis Warren');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (39, 69, 'Jules Winnfield');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (39, 70, 'Mia Wallace');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (40, 70, 'Beatrix Kiddo / Sposa / Black Mamba');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (41, 70, 'Beatrix Kiddo / Sposa / Black Mamba');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (42, 6, 'Michael Rezendes');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (43, 11, 'Dan Dunne');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (44, 71, 'Lou Bloom');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (45, 71, 'Billy Hope');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (46, 46, 'Ebenezer Scrooge; Spiriti del Natale passato, presente e futuro');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (47, 72, 'John Callahan');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (48, 72, 'Arthur Fleck / Joker');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (49, 11, 'Lars Lindstrom');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (50, 12, 'Tyler Durden');
INSERT INTO recitazioni (film, attore, personaggio)
VALUES (50, 73, 'Narratore');
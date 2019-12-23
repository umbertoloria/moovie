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

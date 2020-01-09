# GENERI

create table generi
(
    id   int auto_increment primary key,
    nome varchar(50) not null,
    unique (nome)
);

INSERT INTO generi (id, nome)
VALUES (20, 'Animazione');
INSERT INTO generi (id, nome)
VALUES (7, 'Avventura');
INSERT INTO generi (id, nome)
VALUES (4, 'Azione');
INSERT INTO generi (id, nome)
VALUES (1, 'Biografico');
INSERT INTO generi (id, nome)
VALUES (16, 'Comico');
INSERT INTO generi (id, nome)
VALUES (2, 'Commedia');
INSERT INTO generi (id, nome)
VALUES (3, 'Drammatico');
INSERT INTO generi (id, nome)
VALUES (6, 'Fantascienza');
INSERT INTO generi (id, nome)
VALUES (21, 'Fantastico');
INSERT INTO generi (id, nome)
VALUES (12, 'Gangster');
INSERT INTO generi (id, nome)
VALUES (18, 'Giallo');
INSERT INTO generi (id, nome)
VALUES (19, 'Grottesco');
INSERT INTO generi (id, nome)
VALUES (5, 'Guerra');
INSERT INTO generi (id, nome)
VALUES (15, 'Musicale');
INSERT INTO generi (id, nome)
VALUES (10, 'Noir');
INSERT INTO generi (id, nome)
VALUES (22, 'Poliziesco');
INSERT INTO generi (id, nome)
VALUES (17, 'Satirico');
INSERT INTO generi (id, nome)
VALUES (11, 'Sentimentale');
INSERT INTO generi (id, nome)
VALUES (14, 'Sportivo');
INSERT INTO generi (id, nome)
VALUES (13, 'Storico');
INSERT INTO generi (id, nome)
VALUES (8, 'Thriller');
INSERT INTO generi (id, nome)
VALUES (9, 'Western');

# FILM HAS GENERE

create table film_has_genere
(
    film   int,
    genere int,
    primary key (film, genere),
    foreign key (film) references films (id) on update cascade on delete cascade,
    foreign key (genere) references generi (id) on update cascade on delete cascade
);

INSERT INTO film_has_genere (film, genere)
VALUES (1, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (2, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (3, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (6, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (15, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (22, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (24, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (26, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (47, 1);
INSERT INTO film_has_genere (film, genere)
VALUES (1, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (3, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (6, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (17, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (24, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (27, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (28, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (29, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (30, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (32, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (34, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (35, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (36, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (39, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (49, 2);
INSERT INTO film_has_genere (film, genere)
VALUES (1, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (2, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (3, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (5, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (6, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (7, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (10, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (11, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (12, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (14, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (15, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (16, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (17, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (18, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (19, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (20, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (22, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (24, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (26, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (30, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (31, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (33, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (36, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (37, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (41, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (42, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (43, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (44, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (45, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (46, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (47, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (48, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (49, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (50, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (2, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (8, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (9, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (12, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (13, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (14, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (19, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (20, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (31, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (38, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (40, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (41, 4);
INSERT INTO film_has_genere (film, genere)
VALUES (2, 5);
INSERT INTO film_has_genere (film, genere)
VALUES (14, 5);
INSERT INTO film_has_genere (film, genere)
VALUES (31, 5);
INSERT INTO film_has_genere (film, genere)
VALUES (36, 5);
INSERT INTO film_has_genere (film, genere)
VALUES (7, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (8, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (9, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (12, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (13, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (20, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 6);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (7, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (8, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (20, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (29, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (46, 7);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (5, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (9, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (16, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (17, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (19, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (20, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (37, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (38, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (39, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (40, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (41, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (42, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (44, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (48, 8);
INSERT INTO film_has_genere (film, genere)
VALUES (4, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (17, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (19, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (38, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (41, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (5, 10);
INSERT INTO film_has_genere (film, genere)
VALUES (37, 10);
INSERT INTO film_has_genere (film, genere)
VALUES (44, 10);
INSERT INTO film_has_genere (film, genere)
VALUES (18, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (27, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (30, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 12);
INSERT INTO film_has_genere (film, genere)
VALUES (39, 12);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 13);
INSERT INTO film_has_genere (film, genere)
VALUES (31, 13);
INSERT INTO film_has_genere (film, genere)
VALUES (22, 14);
INSERT INTO film_has_genere (film, genere)
VALUES (26, 14);
INSERT INTO film_has_genere (film, genere)
VALUES (45, 14);
INSERT INTO film_has_genere (film, genere)
VALUES (27, 15);
INSERT INTO film_has_genere (film, genere)
VALUES (28, 16);
INSERT INTO film_has_genere (film, genere)
VALUES (32, 17);
INSERT INTO film_has_genere (film, genere)
VALUES (38, 18);
INSERT INTO film_has_genere (film, genere)
VALUES (39, 19);
INSERT INTO film_has_genere (film, genere)
VALUES (40, 19);
INSERT INTO film_has_genere (film, genere)
VALUES (41, 19);
INSERT INTO film_has_genere (film, genere)
VALUES (46, 20);
INSERT INTO film_has_genere (film, genere)
VALUES (46, 21);
INSERT INTO film_has_genere (film, genere)
VALUES (48, 22);
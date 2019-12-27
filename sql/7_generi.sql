# GENERI

create table generi
(
    id   int auto_increment primary key,
    nome varchar(50) not null,
    unique (nome)
);

INSERT INTO generi (id, nome)
VALUES (1, 'Biografico');
INSERT INTO generi (id, nome)
VALUES (2, 'Commedia');
INSERT INTO generi (id, nome)
VALUES (3, 'Drammatico');
INSERT INTO generi (id, nome)
VALUES (4, 'Azione');
INSERT INTO generi (id, nome)
VALUES (5, 'Guerra');
INSERT INTO generi (id, nome)
VALUES (6, 'Fantascienza');
INSERT INTO generi (id, nome)
VALUES (7, 'Avventura');
INSERT INTO generi (id, nome)
VALUES (8, 'Thriller');
INSERT INTO generi (id, nome)
VALUES (9, 'Western');
INSERT INTO generi (id, nome)
VALUES (10, 'Noir');
INSERT INTO generi (id, nome)
VALUES (11, 'Sentimentale');
INSERT INTO generi (id, nome)
VALUES (12, 'Gangster');
INSERT INTO generi (id, nome)
VALUES (13, 'Storico');

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
VALUES (24, 1);
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
VALUES (24, 3);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 3);
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
VALUES (2, 5);
INSERT INTO film_has_genere (film, genere)
VALUES (14, 5);
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
VALUES (4, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (17, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (19, 9);
INSERT INTO film_has_genere (film, genere)
VALUES (5, 10);
INSERT INTO film_has_genere (film, genere)
VALUES (18, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (25, 11);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 12);
INSERT INTO film_has_genere (film, genere)
VALUES (21, 13);
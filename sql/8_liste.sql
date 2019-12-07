# LISTE

create table liste
(
    id           int primary key auto_increment,
    proprietario int                                not null,
    nome         varchar(50)                        not null,
    visibilità   enum ("tutti", "amici", "solo_tu") not null,
    unique (nome, proprietario),
    foreign key (proprietario) references utenti (id) on update cascade
);

INSERT INTO liste (id, proprietario, nome, visibilità) VALUES (1, 1, 'Migliori MARVEL', 'tutti');
INSERT INTO liste (id, proprietario, nome, visibilità) VALUES (2, 1, 'TOP drama', 'amici');
INSERT INTO liste (id, proprietario, nome, visibilità) VALUES (3, 1, 'Chris BALE', 'solo_tu');
INSERT INTO liste (id, proprietario, nome, visibilità) VALUES (4, 2, 'Epici', 'amici');
INSERT INTO liste (id, proprietario, nome, visibilità) VALUES (5, 3, 'Marvel', 'tutti');

create table lista_has_film
(
    lista int,
    film  int,
    primary key (lista, film),
    foreign key (lista) references liste (id) on update cascade,
    foreign key (film) references films (id) on update cascade
);

INSERT INTO lista_has_film (lista, film) VALUES (3, 1);
INSERT INTO lista_has_film (lista, film) VALUES (2, 3);
INSERT INTO lista_has_film (lista, film) VALUES (4, 3);
INSERT INTO lista_has_film (lista, film) VALUES (2, 5);
INSERT INTO lista_has_film (lista, film) VALUES (2, 6);
INSERT INTO lista_has_film (lista, film) VALUES (4, 7);
INSERT INTO lista_has_film (lista, film) VALUES (1, 8);
INSERT INTO lista_has_film (lista, film) VALUES (4, 8);
INSERT INTO lista_has_film (lista, film) VALUES (5, 8);
INSERT INTO lista_has_film (lista, film) VALUES (1, 9);
INSERT INTO lista_has_film (lista, film) VALUES (5, 9);
INSERT INTO lista_has_film (lista, film) VALUES (2, 11);
INSERT INTO lista_has_film (lista, film) VALUES (1, 12);
INSERT INTO lista_has_film (lista, film) VALUES (1, 13);
INSERT INTO lista_has_film (lista, film) VALUES (3, 16);
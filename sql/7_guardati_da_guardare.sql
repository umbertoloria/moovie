# FILM GUARDATI

create table film_guardati
(
    utente    int,
    film      int,
    voto      float                              not null,
    timestamp datetime default current_timestamp not null,
    primary key (utente, film),
    foreign key (utente) references utenti (id) on update cascade,
    foreign key (film) references films (id) on update cascade
);

INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 8, '2018-04-26 23:14:15', 10);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 9, '2018-10-05 22:05:14', 9);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 10, '2018-10-11 22:10:17', 8.5);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 11, '2018-10-13 18:18:25', 10);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 12, '2018-11-08 22:18:43', 7);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 13, '2018-11-13 00:56:57', 7.5);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 15, '2018-12-01 22:14:32', 10);
INSERT INTO film_guardati (utente, film, timestamp, voto)
VALUES (1, 16, '2019-01-23 23:59:54', 10);
INSERT INTO film_guardati (utente, film, voto, timestamp)
VALUES (3, 1, 6, '2019-12-07 11:09:05');
INSERT INTO film_guardati (utente, film, voto, timestamp)
VALUES (3, 16, 8, '2019-12-07 11:08:28');

# FILM DA GUARDARE

create table film_da_guardare
(
    utente    int,
    film      int,
    timestamp datetime default CURRENT_TIMESTAMP not null,
    primary key (utente, film),
    foreign key (utente) references utenti (id) on update cascade,
    foreign key (film) references films (id) on update cascade
);

INSERT INTO film_da_guardare (utente, film, timestamp)
VALUES (1, 14, '2018-11-18 16:59:21');
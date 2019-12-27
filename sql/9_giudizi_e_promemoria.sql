# GIUDIZI

create table giudizi
(
    utente    int,
    film      int,
    voto      float                              not null,
    timestamp datetime default current_timestamp not null,
    primary key (utente, film),
    foreign key (utente) references utenti (id) on update cascade,
    foreign key (film) references films (id) on update cascade on delete cascade
);

INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 1, 8, '2019-12-27 17:29:44');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 8, 10, '2018-04-26 23:14:15');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 9, 9, '2018-10-05 22:05:14');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 10, 8.5, '2018-10-11 22:10:17');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 11, 10, '2018-10-13 18:18:25');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 12, 7, '2018-11-08 22:18:43');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 13, 7.5, '2018-11-13 00:56:57');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 14, 9, '2019-12-27 15:53:05');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 15, 10, '2018-12-01 22:14:32');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 16, 10, '2019-01-23 23:59:54');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 17, 9, '2019-12-27 16:00:24');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 19, 9, '2019-12-27 17:36:06');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 20, 10, '2019-12-27 17:35:39');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 21, 10, '2019-12-27 17:29:36');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 22, 9, '2019-12-27 17:29:27');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 24, 10, '2019-12-27 17:35:30');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (1, 25, 10, '2019-12-27 17:42:33');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (3, 1, 6, '2019-12-07 11:09:05');
INSERT INTO giudizi (utente, film, voto, timestamp)
VALUES (3, 16, 8, '2019-12-07 11:08:28');

# PROMEMORIA

create table promemoria
(
    utente    int,
    film      int,
    timestamp datetime default CURRENT_TIMESTAMP not null,
    primary key (utente, film),
    foreign key (utente) references utenti (id) on update cascade,
    foreign key (film) references films (id) on update cascade on delete cascade
);

INSERT INTO promemoria (utente, film, timestamp)
VALUES (1, 18, '2019-12-27 16:04:56');
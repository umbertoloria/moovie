# AMICIZIE

create table amicizie
(
    utente_from            int,
    utente_to              int,
    timestamp_richiesta    datetime default current_timestamp not null,
    timestamp_accettazione datetime,
    primary key (utente_from, utente_to),
    foreign key (utente_from) references utenti (id) on update cascade,
    foreign key (utente_to) references utenti (id) on update cascade
);

INSERT INTO amicizie (utente_from, utente_to, timestamp_richiesta, timestamp_accettazione)
VALUES (1, 3, '2019-12-10 15:10:40', '2019-12-11 10:52:06');
INSERT INTO amicizie (utente_from, utente_to, timestamp_richiesta, timestamp_accettazione)
VALUES (2, 1, '2019-12-12 13:29:16', '2019-12-12 13:29:30');
INSERT INTO amicizie (utente_from, utente_to, timestamp_richiesta, timestamp_accettazione)
VALUES (3, 2, '2019-12-12 09:24:38', '2019-12-12 11:04:05');
INSERT INTO amicizie (utente_from, utente_to, timestamp_richiesta, timestamp_accettazione)
VALUES (4, 1, '2019-12-12 14:01:39', '2019-12-12 14:01:56');
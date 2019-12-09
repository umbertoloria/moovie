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
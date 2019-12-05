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

create table lista_has_film
(
    lista int,
    film  int,
    primary key (lista, film),
    foreign key (lista) references liste (id) on update cascade,
    foreign key (film) references films (id) on update cascade
);
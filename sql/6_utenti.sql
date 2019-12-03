CREATE TABLE utenti
(
    id       int primary key auto_increment,
    nome     varchar(50)  not null,
    cognome  varchar(50)  not null,
    email    varchar(100) not null,
    password varchar(40)  not null,
    UNIQUE (email)
);

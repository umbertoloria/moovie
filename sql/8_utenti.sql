CREATE TABLE utenti
(
    id       int primary key auto_increment,
    nome     varchar(50)   not null,
    cognome  varchar(50)   not null,
    email    varchar(100)  not null,
    password varchar(40)   not null,
    gestore  bit default 0 not null,
    unique (email),
    fulltext (nome),
    fulltext (cognome)
);

INSERT INTO utenti (id, nome, cognome, email, password, gestore)
VALUES (1, 'Umberto', 'Loria', 'umberto.loria@gmail.com', '225edfa608b8aab103f6ae4a9396f858cfd9af66', true);
INSERT INTO utenti (id, nome, cognome, email, password, gestore)
VALUES (2, 'Michelantonio', 'Panichella', 'michelantoniopanichella@gmail.com',
        '225edfa608b8aab103f6ae4a9396f858cfd9af66', true);
INSERT INTO utenti (id, nome, cognome, email, password, gestore)
VALUES (3, 'Gianluca', 'Pirone', 'gianluca.pirone9@gmail.com', 'd839552700ad004d4e968844eb85bcb5080214b5', false);
INSERT INTO utenti (id, nome, cognome, email, password, gestore)
VALUES (4, 'Mario', 'Egidio', 'egidiomario6@gmail.com', '225edfa608b8aab103f6ae4a9396f858cfd9af66', true);
create table regie
(
    film    int not null,
    regista int not null,
    primary key (film, regista),
    foreign key (film) references films (id) on update cascade,
    foreign key (regista) references artisti (id) on update cascade
);

INSERT INTO moovie.regie (film, regista)
VALUES (10, 2);
INSERT INTO moovie.regie (film, regista)
VALUES (2, 4);
INSERT INTO moovie.regie (film, regista)
VALUES (3, 5);
INSERT INTO moovie.regie (film, regista)
VALUES (5, 5);
INSERT INTO moovie.regie (film, regista)
VALUES (7, 17);
INSERT INTO moovie.regie (film, regista)
VALUES (1, 18);
INSERT INTO moovie.regie (film, regista)
VALUES (6, 19);
INSERT INTO moovie.regie (film, regista)
VALUES (4, 20);
INSERT INTO moovie.regie (film, regista)
VALUES (8, 21);
INSERT INTO moovie.regie (film, regista)
VALUES (8, 22);
INSERT INTO moovie.regie (film, regista)
VALUES (9, 23);
INSERT INTO moovie.regie (film, regista)
VALUES (11, 25);
INSERT INTO moovie.regie (film, regista)
VALUES (11, 26);
INSERT INTO moovie.regie (film, regista)
VALUES (12, 28);
INSERT INTO moovie.regie (film, regista)
VALUES (13, 28);
INSERT INTO moovie.regie (film, regista)
VALUES (15, 28);
INSERT INTO moovie.regie (film, regista)
VALUES (14, 33);
INSERT INTO moovie.regie (film, regista)
VALUES (16, 36);

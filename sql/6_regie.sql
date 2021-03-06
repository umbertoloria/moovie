create table regie
(
    film    int,
    regista int,
    primary key (film, regista),
    foreign key (film) references films (id) on update cascade on delete cascade,
    foreign key (regista) references artisti (id) on update cascade on delete cascade
);

INSERT INTO regie (film, regista)
VALUES (10, 2);
INSERT INTO regie (film, regista)
VALUES (2, 4);
INSERT INTO regie (film, regista)
VALUES (3, 5);
INSERT INTO regie (film, regista)
VALUES (5, 5);
INSERT INTO regie (film, regista)
VALUES (21, 5);
INSERT INTO regie (film, regista)
VALUES (22, 5);
INSERT INTO regie (film, regista)
VALUES (23, 5);
INSERT INTO regie (film, regista)
VALUES (7, 17);
INSERT INTO regie (film, regista)
VALUES (20, 17);
INSERT INTO regie (film, regista)
VALUES (37, 17);
INSERT INTO regie (film, regista)
VALUES (1, 18);
INSERT INTO regie (film, regista)
VALUES (6, 19);
INSERT INTO regie (film, regista)
VALUES (31, 19);
INSERT INTO regie (film, regista)
VALUES (4, 20);
INSERT INTO regie (film, regista)
VALUES (8, 21);
INSERT INTO regie (film, regista)
VALUES (8, 22);
INSERT INTO regie (film, regista)
VALUES (9, 23);
INSERT INTO regie (film, regista)
VALUES (11, 25);
INSERT INTO regie (film, regista)
VALUES (11, 26);
INSERT INTO regie (film, regista)
VALUES (12, 28);
INSERT INTO regie (film, regista)
VALUES (13, 28);
INSERT INTO regie (film, regista)
VALUES (15, 28);
INSERT INTO regie (film, regista)
VALUES (14, 33);
INSERT INTO regie (film, regista)
VALUES (17, 33);
INSERT INTO regie (film, regista)
VALUES (19, 33);
INSERT INTO regie (film, regista)
VALUES (38, 33);
INSERT INTO regie (film, regista)
VALUES (39, 33);
INSERT INTO regie (film, regista)
VALUES (40, 33);
INSERT INTO regie (film, regista)
VALUES (41, 33);
INSERT INTO regie (film, regista)
VALUES (16, 36);
INSERT INTO regie (film, regista)
VALUES (18, 43);
INSERT INTO regie (film, regista)
VALUES (24, 45);
INSERT INTO regie (film, regista)
VALUES (50, 45);
INSERT INTO regie (film, regista)
VALUES (26, 48);
INSERT INTO regie (film, regista)
VALUES (27, 51);
INSERT INTO regie (film, regista)
VALUES (28, 53);
INSERT INTO regie (film, regista)
VALUES (29, 53);
INSERT INTO regie (film, regista)
VALUES (30, 55);
INSERT INTO regie (film, regista)
VALUES (32, 58);
INSERT INTO regie (film, regista)
VALUES (33, 60);
INSERT INTO regie (film, regista)
VALUES (34, 60);
INSERT INTO regie (film, regista)
VALUES (35, 60);
INSERT INTO regie (film, regista)
VALUES (33, 61);
INSERT INTO regie (film, regista)
VALUES (35, 66);
INSERT INTO regie (film, regista)
VALUES (36, 67);
INSERT INTO regie (film, regista)
VALUES (46, 67);
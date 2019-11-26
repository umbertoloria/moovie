CREATE TABLE utenti
(
    id       INT AUTO_INCREMENT,
    nome     VARCHAR(50)  NOT NULL,
    cognome  VARCHAR(50)  NOT NULL,
    email    VARCHAR(100) NOT NULL,
    password VARCHAR(40)  NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (email)
);

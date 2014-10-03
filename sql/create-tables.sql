CREATE TABLE Opiskelija
(
OpiskelijaNro SERIAL PRIMARY KEY,
Etunimi varchar(20),
Sukunimi varchar(30)
);
CREATE TABLE Opettaja
(
OpettajaNro SERIAL PRIMARY KEY,
Etunimi varchar(20),
Sukunimi varchar(30),
Kayttajatunnus varchar(20),
Salasana varchar(20)
);
CREATE TABLE Kurssit
(
KurssiId SERIAL PRIMARY KEY,
OpettajaNro integer,
KurssinNimi varchar(40)
);
CREATE TABLE KurssiIlmoittautumiset
(
KurssiId integer,
OpiskelijaNro integer,
PRIMARY KEY (KurssiId, OpiskelijaNro)
);
CREATE TABLE Kysymykset
(
KysymysId SERIAL PRIMARY KEY,
Kysymys varchar(150)
);
CREATE TABLE Kysely
(
KurssiId integer PRIMARY KEY,
Aktiivinen varchar(5)
);
CREATE TABLE Kyselynkysymykset
(
KurssiId integer,
KysymysId integer,
Muoto varchar(6),
PRIMARY KEY (KurssiId, KysymysId, Muoto)
);

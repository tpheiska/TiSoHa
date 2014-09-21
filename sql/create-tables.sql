CREATE TABLE Kysymykset
(
KysymysId SERIAL PRIMARY KEY,
Kysymys varchar(150),
Muoto varchar(6)
);
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
CREATE TABLE Kysely
(
KurssiId SERIAL PRIMARY KEY,
KysymysId1 integer,
VastausMuoto1 varchar(5),
KysymysId2 integer,
VastausMuoto2 varchar(5),
KysymysId3 integer,
VastausMuoto3 varchar(5),
KysymysId4 integer,
VastausMuoto4 varchar(5),
KysymysId5 integer,
VastausMuoto5 varchar(5),
KysymysId6 integer,
VastausMuoto6 varchar(5),
KysymysId7 integer,
VastausMuoto7 varchar(5),
KysymysId8 integer,
VastausMuoto8 varchar(5)
);

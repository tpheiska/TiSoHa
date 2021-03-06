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
OpettajaNro integer references Opettaja(OpettajaNro),
KurssinNimi varchar(40)
);
CREATE TABLE KurssiIlmoittautumiset
(
KurssiId integer references Kurssit(KurssiId),
OpiskelijaNro integer references Opiskelija(OpiskelijaNro),
PRIMARY KEY (KurssiId, OpiskelijaNro)
);
CREATE TABLE Kysymykset
(
KysymysId SERIAL PRIMARY KEY,
Kysymys varchar(150)
);
CREATE TABLE Kysely
(
KurssiId integer PRIMARY KEY references Kurssit(KurssiId),
Aktiivinen varchar(5)
);
CREATE TABLE Kyselynkysymykset
(
KurssiId integer references Kurssit(KurssiId),
KysymysId integer references Kysymykset(KysymysId),
Muoto varchar(6),
PRIMARY KEY (KurssiId, KysymysId)
);
CREATE TABLE Vastaukset
(
VastaajaId integer,
KurssiId integer references Kurssit(KurssiId),
KysymysId integer references Kysymykset(KysymysId),
Muoto varchar(6),
Vastaus varchar(1000),
PRIMARY KEY (VastaajaId, KurssiId, KysymysId)
);
CREATE TABLE Vastaa
(
OpiskelijaNro integer references Opiskelija(OpiskelijaNro),
KurssiId integer references Kurssit(KurssiId),
VastaajaId integer,
Vastattu varchar(5),
PRIMARY KEY (OpiskelijaNro, KurssiId)
);

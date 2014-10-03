INSERT INTO Kysymykset (Kysymys) VALUES ('Mitä mieltä olet kurssista?');
INSERT INTO Kysymykset (Kysymys) VALUES ('Tuntuiko kurssi vaikealta?');
INSERT INTO Kysely (KurssiId, Aktiivinen) VALUES (3, 'kylla');
INSERT INTO Kysely (KurssiId, Aktiivinen) VALUES (4, 'ei');
INSERT INTO Opiskelija (Etunimi, Sukunimi) VALUES ('Olli', 'Opiskelija');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Ossi', 'Opettaja', 'opettaja', 'salasana');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (3, 2, 'Johdantokurssi');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (4, 1, 'Jatkokurssi');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (2, 1, 'Jatkokurssi');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (5, 2, 'Jatkokurssi');
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (3, 1);
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (4, 1);
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (4, 1, 'teksti');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (4, 2, 'radio');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (3, 2, 'radio');



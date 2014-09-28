INSERT INTO Kysymykset (Kysymys, Muoto) VALUES ('Mitä kuuluu?', 'teksti');
INSERT INTO Kysymykset (Kysymys, Muoto) VALUES ('Tuntuiko kurssi vaikealta?', 'radio');
INSERT INTO Kysely (KurssiId, Aktiivinen, KysymysId1) VALUES (3, 'kylla', 1);
INSERT INTO Kysely (KurssiId, Aktiivinen, KysymysId1) VALUES (4, 'ei', 2);
INSERT INTO Opiskelija (Etunimi, Sukunimi) VALUES ('Olli', 'Opiskelija');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Ossi', 'Opettaja', 'opettaja', 'salasana');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (3, 2, 'Johdantokurssi');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (4, 1, 'Jatkokurssi');
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (3, 1);

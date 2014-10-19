INSERT INTO Kysymykset (Kysymys) VALUES ('Mitä mieltä olet kurssista?');
INSERT INTO Kysymykset (Kysymys) VALUES ('Kurssi tuntui vaikealta.');
INSERT INTO Kysymykset (Kysymys) VALUES ('Tuntuiko kurssi vaikealta?');
INSERT INTO Kysymykset (Kysymys) VALUES ('Mitä kurssille voisi listätä?');
INSERT INTO Kysymykset (Kysymys) VALUES ('Kurssin etenemistahti oli sopiva.');
INSERT INTO Kysymykset (Kysymys) VALUES ('Miten kurssista voisi saada mielenkiintoisemman?');
INSERT INTO Opiskelija (Etunimi, Sukunimi) VALUES ('Olli', 'Opiskelija');
INSERT INTO Opiskelija (Etunimi, Sukunimi) VALUES ('Sami', 'Student');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Simo', 'Rehtori', 'admin', 'salasana');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Ossi', 'Opettaja', 'opettaja', 'salasana');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Otso', 'Ope', 'ope', 'salasana');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (3, 2, 'Johdantokurssi');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (4, 1, 'Jatkokurssi 1.2');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (2, 1, 'Jatkokurssi 1.1');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (5, 2, 'Jatkokurssi 2');
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (3, 1);
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (4, 1);
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (2, 1);
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (4, 2);
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (2, 2);
INSERT INTO Kysely (KurssiId, Aktiivinen) VALUES (3, 'kylla');
INSERT INTO Kysely (KurssiId, Aktiivinen) VALUES (4, 'ei');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (4, 1, 'teksti');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (4, 2, 'radio');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (4, 5, 'radio');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (3, 2, 'radio');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (3, 5, 'radio');
INSERT INTO Kyselynkysymykset (KurssiId, KysymysId, Muoto) VALUES (3, 6, 'teksti');




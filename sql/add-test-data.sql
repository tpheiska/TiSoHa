INSERT INTO Kysymykset (Kysymys, Muoto) VALUES ('Mitä kuuluu?', 'teksti');
INSERT INTO Opiskelija (Etunimi, Sukunimi) VALUES ('Olli', 'Opiskelija');
INSERT INTO Opettaja (Etunimi, Sukunimi, Kayttajatunnus, Salasana) VALUES ('Ossi', 'Opettaja', 'opettaja', 'salasana');
INSERT INTO Kurssit (KurssiId, OpettajaNro, KurssinNimi) VALUES (3, 2, 'Johdanto kurssi');
INSERT INTO KurssiIlmoittautumiset (KurssiId, OpiskelijaNro) VALUES (3, 1);

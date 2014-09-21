<?php

    class Kayttaja {
  
        private $kurssikoodi;
        private $opiskelijanumero;
  
        /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */
        public static function etsiKayttajaTunnuksilla($kurssikoodi, $opiskelijanumero) {
            $sql = "SELECT Opiskelijanumero from KurssiIlmoittautumiset where KurssiId = ? opiskelijanumero = ? LIMIT 1";
            $kurssi = getTietokantayhteys()->prepare($sql);
            $kurssi->execute(array($kurssikoodi, $opiskelijanumero));

            $tulos = $kysely->fetchObject();
            if ($tulos == null) {
                return null;
            } else {
                $kurssi = new Kurssi(); 
                $kurssi->setKurssinNimi($tulos->kurssikoodi);
                $kurssi->setOpiskelijanumero($tulos->opiskelijanumero);

                return $kurssi;
            }
        }

  /* Tähän muita Käyttäjäluokan metodeita */
        }
<?php

    require_once 'libs/functions.php';

    class Opiskelija {
  
        private $kurssiId;
        private $opiskelijaNro;
  
        /* Etsitään kannasta kurssikoodilla ja opiskelijanumerolla käyttäjäriviä */
        public static function etsiKurssiKoodilla($kurssikoodi, $opiskelijanumero) {
            $sql = "SELECT KurssiId, OpiskelijaNro from KurssiIlmoittautumiset where KurssiId = ? OpiskelijaNro = ? LIMIT 1";
            $opiskelija = getTietokantayhteys()->prepare($sql);
            $opiskelija->execute(array($kurssikoodi, $opiskelijanumero));

            $tulos = $kysely->fetchObject();
            if ($tulos == null) {
                return null;
            } else {
                $opiskelija = new Opiskelija(); 
                $opiskelija->setKurssikoodi($tulos->KurssiId);
                $opiskelija->setOpiskelijanumero($tulos->OpiskelijaNro);

            return $opiskelija;
            }
        }
        
        public function setKurssikoodi($kurssikoodi) {
            
            $kurssiId = $kurssikoodi;
        }
        
        public function setOpiskelijanumero($opiskelijanumero) {
            
            $opiskelijaNro = $opiskelijanumero;
        }
    }
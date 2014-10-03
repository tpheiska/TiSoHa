<?php

    require_once 'libs/functions.php';

    class Opiskelija {
  
        private $kurssiId;
        private $opiskelijaNro;
  
        /* Etsitään kannasta kurssikoodilla ja opiskelijanumerolla käyttäjäriviä */
        public static function etsiOpiskelija($kurssiId, $opiskelijanro) {
            $sql = "SELECT KurssiId, OpiskelijaNro from KurssiIlmoittautumiset WHERE"
                    . " KurssiId = ? AND OpiskelijaNro = ? LIMIT 1";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($kurssiId, $opiskelijanro));

            $tulos = $kysely->fetchObject();
            if ($tulos == null) {
                return null;
            } else {
                $opiskelija = new Opiskelija(); 
                $opiskelija->setKurssikoodi($tulos->kurssiid);
                $opiskelija->setOpiskelijanumero($tulos->opiskelijanro);

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
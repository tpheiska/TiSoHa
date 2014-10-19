<?php

    require_once 'libs/functions.php';

    class Opiskelija {
  
        private $kurssiId;
        private $opiskelijaNro;
        private $sukunimi;
        private $etunimi;
  
        /** 
        *Etsitään kannasta kurssikoodilla ja opiskelijanumerolla käyttäjäriviä. 
        */
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
                $opiskelija->setKurssiId($tulos->kurssiid);
                $opiskelija->setOpiskelijaNro($tulos->opiskelijanro);

            return $opiskelija;
            }
        }
        
        /**
        *Listataan kaikki opiskelijat.
        */
        public static function listaaOpiskelijat() {
            $sql = "SELECT OpiskelijaNro, Sukunimi, Etunimi FROM Opiskelija ORDER BY Sukunimi;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array());

            $tulos = $kysely->fetchAll();
            if ($tulos == null) {
                return null;
            } else {
                $opiskelijat = array();
                foreach($tulos as $opisk) {
                    $opiskelija = new Opiskelija(); 
                    $opiskelija->setOpiskelijaNro($opisk['opiskelijanro']);
                    $opiskelija->setSukunimi($opisk['sukunimi']);
                    $opiskelija->setEtunimi($opisk['etunimi']);
                    
                    array_push($opiskelijat, $opiskelija);
                }
            return $opiskelijat;
            }
        }
        
        function setKurssiId($kurssiId) {
            $this->kurssiId = $kurssiId;
        }

        function setOpiskelijaNro($opiskelijaNro) {
            $this->opiskelijaNro = $opiskelijaNro;
        }

        function setSukunimi($sukunimi) {
            $this->sukunimi = $sukunimi;
        }

        function setEtunimi($etunimi) {
            $this->etunimi = $etunimi;
        }

        function getKurssiId() {
            return $this->kurssiId;
        }

        function getOpiskelijaNro() {
            return $this->opiskelijaNro;
        }

        function getSukunimi() {
            return $this->sukunimi;
        }

        function getEtunimi() {
            return $this->etunimi;
        }
    }
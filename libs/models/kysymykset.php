<?php
    require_once 'libs/functions.php';

    class Kysymys {
        
        private $kysymysId;
        private $kysymys;
        private $muoto;
        
        /**
        *Haetaan kyselyn kysymykset.
        */
        public static function etsiKurssiKysely($kurssiId) {
            $sql = "SELECT Kysymykset.KysymysId, Kysymys, Muoto FROM Kyselynkysymykset, Kysymykset WHERE KurssiId = ? "
                    . "and Kyselynkysymykset.KysymysId=Kysymykset.KysymysId ORDER BY Muoto;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($kurssiId));

            $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $kysymykset = array();
                foreach($tulos as $k){
                    $kysymys = new Kysymys();
                    $kysymys->setKysymysId($k['kysymysid']);
                    $kysymys->setKysymys($k['kysymys']);
                    $kysymys->setMuoto($k['muoto']);
            
                    array_push($kysymykset, $kysymys);
                }
            }
            return $kysymykset;
        }
        
        /**
        *Haetaan kaikki kysymykset kysymystietokannasta.
        */
        public static function etsiKysymykset() {
            $sql = "SELECT * FROM Kysymykset;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute();
        
            $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $kysymykset = array();
                foreach($tulos as $k){
                    $kysymys = new Kysymys();
                    $kysymys->setKysymysId ($k['kysymysid']);
                    $kysymys->setKysymys($k['kysymys']);
            
                    array_push($kysymykset, $kysymys);
                }

                return $kysymykset;
            }
            
        }
        
        /**
        *Haetaan kurssinnimi kurssikoodin perusteella.
        */
        public static function kurssinNimi($kurssiid) {
            $sql = "SELECT KurssinNimi FROM Kurssit WHERE KurssiId = ? LIMIT 1;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($kurssiid));
        
            $tulos = $kysely->fetchObject();
        
            if($tulos == null) {
                return null;
            } else {
                return $tulos;
            }
        }
        
        function setKysymysId($kysymysid) {
            $this->kysymysId = $kysymysid;
        }
            
        function setKysymys($kysymys) {
            $this->kysymys = $kysymys;
        }
            
        function setMuoto($muoto) {
            $this->muoto = $muoto;
        }
            
        function getKysymysId() {
            return $this->kysymysId;
        }
            
        function getKysymys() {
            return $this->kysymys;
        }
            
        function getMuoto() {
            return $this->muoto;
        }
    }
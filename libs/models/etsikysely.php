<?php

    require_once 'libs/functions.php';

    class Kysely {
  
        private $kurssiId;
        private $Aktiivinen;
        private $kysymysId1;
        private $kysymysId2;        
  
        /* Etsitään kannasta aktiiviset kurssikyselyt */
        public static function etsiKysely($kurssiId) {
            $sql = "SELECT KysymysId, Kysymys.Kysymys, Kysymys.Muoto from Kysely, "
                    . "Kysymys where KurssiId = ? and Kysely.KysymysId1=Kysymys.KysymysId and"
                    . "Kysely.KysymysId2=Kysymys.KysymysId2";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($kurssiId));

            $tulos = $kysely->fetchAll();
        
            $kysymykset = array();
            foreach($tulos as $k){
                $kurssikysely = new Kysely();
                $kurssikysely->setKurssiId ($k['kurssiid']);
                $kurssikysely->setAktiivinen($k['aktiivinen']);
                $kurssikysely->setKysymysId1($k['kysymysid1']);
                $kurssikysely->setKysymysId1Muoto($k('muoto'));
                $kurssikysely->setKysymysId2($k['kysymysid2']);
            
                array_push($kysymykset, $kurssikysely);
            }

            return $kurssikyselyt;
        
        }
        
        function getKurssiId() {
            return $this->kurssiId;
        }

        function getKysymysId1() {
            return $this->kysymysId1;
        }

        function getKysymysId2() {
            return $this->kysymysId2;
        }

        private function setKurssiId($kurssiId) {
            $this->kurssiId = $kurssiId;
        }
        
        function setAktiivinen($Aktiivinen) {
            $this->Aktiivinen = $Aktiivinen;
        }

        private function setKysymysId1($kysymysId1) {
            $this->kysymysId1 = $kysymysId1;
        }

        private function setKysymysId2($kysymysId2) {
            $this->kysymysId2 = $kysymysId2;
        }

    }



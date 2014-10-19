<?php
    require_once 'libs/functions.php';
    
    class Vastaus {
        
        private $vastaus;
        private $kysymysId;
        private $kysymys;
        private $muoto;
        private $kurssiId;
        private $kurssinNimi;
        private $vastaajaId;
        
        /**
        *Tarkistetaan, onko oppilas vastannut kyselyyn.
        */
        public static function tarkistaVastaaja($opiskelijaNro, $kurssiId) {
            $sql = "SELECT Vastattu FROM Vastaa WHERE OpiskelijaNro = ? AND KurssiId = ?;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($opiskelijaNro, $kurssiId));
        
            $tulos = $kysely->fetchAll();
            if($tulos == null) {
                return true;
            } else {
                return false;
            }
        }
        
        /**
        *Talletetaan vastaus kantaan.
        */
        public static function tallennaVastaus($vastaajaId, $kurssiId, $kysymysId, $muoto, $vastaus) {
            $sql = "INSERT INTO Vastaukset(VastaajaId, KurssiId, KysymysId, Muoto, Vastaus) VALUES(?, ?, ?, ?, ?);";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($vastaajaId, $kurssiId, $kysymysId, $muoto, $vastaus));
        }
        
        /**
        *Muutetaan vastaus tietokannassa.
        */
        public static function muutaVastaus($vastaus, $vastaajaId, $kurssiId, $kysymysId) {
            $sql = "UPDATE Vastaukset SET Vastaus= ? WHERE VastaajaId = ? AND KurssiId = ? AND KysymysId = ?;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($vastaus, $vastaajaId, $kurssiId, $kysymysId));
        }
        
        /**
        *Merkitään opiskelija vastanneeksi.
        */
        public static function merkitseVastanneeksi($vastaajaId, $opiskelijaNro, $kurssiId) {
            $sql = "INSERT INTO Vastaa(OpiskelijaNro, KurssiId, VastaajaId, Vastattu) VALUES (?, ?, ?, 'kylla');";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($opiskelijaNro, $kurssiId, $vastaajaId));
        }

        /**
        *Etsitään opettajan yksittäisen kurssin kyselyyn vastanneet.
        */
        public static function etsiKyselyynVastanneet($opettaja, $kurssiId) {
            
            $sql = "SELECT Vastaa.VastaajaId, Vastaa.KurssiId, Kurssit.KurssinNimi FROM "
                    . "Vastaa, Kurssit, Opettaja WHERE Opettaja.Kayttajatunnus = ? AND "
                    . "Kurssit.KurssiId = ? AND Vastaa.KurssiId = Kurssit.KurssiId AND "
                    . "Kurssit.OpettajaNro = Opettaja.OpettajaNro;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($opettaja, $kurssiId));
        
            $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $vastaajat = array();
                foreach($tulos as $vast){
                    $vastaus = new Vastaus();
                    $vastaus->setVastaajaId($vast['vastaajaid']);
                    $vastaus->setKurssiId ($vast['kurssiid']);
                    $vastaus->setKurssinNimi($vast['kurssinnimi']);
            
                    array_push($vastaajat, $vastaus);
                }
                return $vastaajat;
            }
        }

        /**
        *Haetaan yksittäisen vastaajan tietyn kurssikyselyn vastaukset.
        */
        public static function etsiVastaukset($vastaajaId, $kurssiId) {
            
            $sql = "SELECT Kysymykset.Kysymys, Vastaukset.Vastaus FROM Vastaukset, Kysymykset, Vastaa "
                    . "WHERE Vastaukset.VastaajaId = ? AND Vastaukset.KurssiId = ? "
                    . "AND Vastaukset.VastaajaId = Vastaa.VastaajaId AND Vastaa.KurssiId = Vastaukset.KurssiId "
                    . "AND Kysymykset.KysymysId = Vastaukset.KysymysId AND Vastaa.Vastattu = 'kylla' "
                    . "ORDER BY Muoto;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($vastaajaId, $kurssiId));
        
            $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $vastaukset = array();
                foreach($tulos as $vast){
                    $vastaus = new Vastaus();
                    $vastaus->setKysymys($vast['kysymys']);
                    $vastaus->setVastaus($vast['vastaus']);
            
                    array_push($vastaukset, $vastaus);
                }
                return $vastaukset;
            }
        }
       
        /**
        *Muutetaan opiskelijan vastauksia kantaan.
        */
        public static function muutaVastauksia($opiskelijaNro, $kurssiId) {
            $sql = "SELECT Kysymykset.Kysymys, Kysymykset.KysymysId, Vastaukset.Muoto, Vastaukset.Vastaus, "
                    . "Vastaukset.VastaajaId, Vastaukset.KurssiId FROM Vastaukset, Kysymykset, "
                    . "Vastaa WHERE Vastaa.OpiskelijaNro = ? AND Vastaa.KurssiId = Vastaukset.KurssiId "
                    . "AND Kysymykset.KysymysId = Vastaukset.KysymysId AND Vastaa.KurssiId = ? AND "
                    . "Vastaukset.KysymysId = Kysymykset.KysymysId ORDER BY Muoto;";
            $kysely = getTietokantayhteys()->prepare($sql);
            $kysely->execute(array($opiskelijaNro, $kurssiId));
        
            $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $vastaukset = array();
                foreach($tulos as $vast){
                    $vastaus = new Vastaus();
                    $vastaus->setKysymysId ($vast['kysymysid']);
                    $vastaus->setKysymys($vast['kysymys']);
                    $vastaus->setMuoto($vast['muoto']);
                    $vastaus->setVastaus($vast['vastaus']);
                    $vastaus->setVastaajaId($vast['vastaajaid']);
                    $vastaus->setKurssiId($vast['kurssiid']);
            
                    array_push($vastaukset, $vastaus);
                }
                return $vastaukset;
            }
        }
        
        function getVastaus() {
            return $this->vastaus;
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

        function getKurssiId() {
            return $this->kurssiId;
        }

        function getKurssinNimi() {
            return $this->kurssinNimi;
        }

        function getVastaajaId() {
            return $this->vastaajaId;
        }
        
        function setVastaus($vastaus) {
            $this->vastaus = $vastaus;
        }

        function setKysymysId($kysymysId) {
            $this->kysymysId = $kysymysId;
        }
        
        function setKysymys($kysymys) {
            $this->kysymys = $kysymys;
        }

        function setMuoto($muoto) {
            $this->muoto = $muoto;
        }

        function setKurssiId($kurssiId) {
            $this->kurssiId = $kurssiId;
        }

        function setKurssinNimi($kurssinNimi) {
            $this->kurssinNimi = $kurssinNimi;
        }

        function setVastaajaId($vastaajaId) {
            $this->vastaajaId = $vastaajaId;
        }

    }
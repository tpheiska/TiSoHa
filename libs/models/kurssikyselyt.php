<?php

require_once 'libs/functions.php';

class Kurssikyselyt {
  
    private $kurssiId;
    private $kurssinNimi;
    private $opettajaNro;
    private $aktiivinen;
    
    public static function etsiAktiivisetKurssikyselyt() {
        $sql = "SELECT Kysely.KurssiId, Kurssit.KurssinNimi FROM Kysely, Kurssit "
                . "WHERE Kysely.Aktiivinen='kylla' AND Kysely.KurssiId=Kurssit.KurssiId;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array());
        
        $tulos = $kysely->fetchAll();
        
        if($tulos == null) {
            return null;
        } else {
            $kurssikyselyt = array();
            foreach($tulos as $k){
                $kurssikysely = new Kurssikyselyt();
                $kurssikysely->setKurssiId ($k['kurssiid']);
                $kurssikysely->setKurssinNimi($k['kurssinnimi']);
            
                array_push($kurssikyselyt, $kurssikysely);
            }
            return $kurssikyselyt;
        }        
    }
    
    public static function tallennaKysymys($kurssiId, $kysymysId, $muoto) {
        $sql = "INSERT INTO Kyselynkysymykset(KurssiId, KysymysId, muoto) VALUES(?, ?, ?);";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kurssiId, $kysymysId, $muoto));
    }
    
    public static function poistaKysymys($kurssiId, $kysymysId, $muoto) {
        $sql = "DELETE FROM Kyselynkysymykset WHERE KurssiId = ? and KysymysId = ? and Muoto = ?;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kurssiId, $kysymysId, $muoto));
    }
    
    public static function lisaaKysely($kurssiId, $aktiivinen) {
        $sql = "INSERT INTO Kysely(KurssiId, Aktiivinen) VALUES(?, ?);";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kurssiId, $aktiivinen));
    }
    
    public static function poistaKysely($kurssiId) {
        $sql = "DELETE FROM Kyselynkysymykset WHERE KurssiId = ?;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kurssiId));
        $sql = "DELETE FROM Kysely WHERE KurssiId = ?;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($kurssiId)); 
    }
    
    public static function muutaAktiivisuus($aktiivisuus, $kurssiid) {
        $sql = "UPDATE Kysely SET Aktiivinen= ? WHERE KurssiId = ?;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($aktiivisuus, $kurssiid));
    }
    
    function setKurssiId($kurssiId) {
        $this->kurssiId = $kurssiId;
    }

    function setKurssinNimi($kurssinNimi) {
        $this->kurssinNimi = $kurssinNimi;
    }

    function setOpettajaNro($opettajaNro) {
        $this->opettajaNro = $opettajaNro;
    }
    
    function setAktiivinen($aktiivinen) {
        $this->aktiivinen = $aktiivinen;
    }

    function getKurssiId() {
        return $this->kurssiId;
    }

    function getKurssinNimi() {
        return $this->kurssinNimi;
    }

    function getOpettajaNro() {
        return $this->opettajaNro;
    }
    
    function getAktiivinen() {
        return $this->aktiivinen;
    }
}

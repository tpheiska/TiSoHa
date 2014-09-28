<?php

require_once 'libs/functions.php';

class Kurssikyselyt {
  
    private $kurssiId;
    private $kurssinNimi;
    private $opettajaNro;
    private $aktiivinen;
  
    /* Etsitään kannasta aktiiviset kurssikyselyt */
    public static function etsiAktiivisetKurssikyselyt() {
        $sql = "SELECT Kysely.KurssiId, Kurssit.KurssinNimi from Kurssit, Kysely where Kurssit.KurssiId=Kysely.KurssiId and Aktiivinen = 'kylla'";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array());

        $tulos = $kysely->fetchAll();
        
        if(tulos == null) {
            return null;
        } else {
            $kurssikyselyt = array();
            foreach($tulos as $k){
                $kurssikysely = new Kurssikyselyt();
                $kurssikysely->setKurssiId ($k['kurssiid']);
                $kurssikysely->setKurssinNimi($k['kurssinnimi']);
            
                array_push($kurssikyselyt, $kurssikysely);
            }
        }
        return $kurssikyselyt;
    }
  
    public static function etsiKurssikyselyt($opettaja) {
        /*$sql = "SELECT Kysely.KurssiId, Kurssit.KurssinNimi, Aktiivinen from Kurssit, Kysely "
                . " where Kysely.KurssiId=Kurssit.KurssiId and OpettajaNro= ? ";*/
        $sql = "SELECT Kysely.KurssiId, Kurssit.KurssinNimi, Aktiivinen from Kurssit, Kysely, Opettaja "
                . " where Kysely.KurssiId=Kurssit.KurssiId and Kayttajatunnus = ? and "
                . "Opettaja.OpettajaNro = Kurssit.OpettajaNro ";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($opettaja));

        $tulos = $kysely->fetchAll();
        
        if(tulos == null) {
            return null;
        } else {
            $kurssikyselyt = array();
            foreach($tulos as $k){
                $kurssikysely = new Kurssikyselyt();
                $kurssikysely->setKurssiId ($k['kurssiid']);
                $kurssikysely->setKurssinNimi($k['kurssinnimi']);
                $kurssikysely->setAktiivinen($k['aktiivinen']);
            
                array_push($kurssikyselyt, $kurssikysely);
            }

            return $kurssikyselyt;
        }
    }
    
    function muutaAktiivisuus($aktiivisuus, $kurssiid) {
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

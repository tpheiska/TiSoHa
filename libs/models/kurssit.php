<?php

require_once 'libs/functions.php';

class Kurssi {
    
    private $kurssiId;
    private $kurssinNimi;
    private $opettaja;
    private $kyselyita;
    private $aktiivinen;
    
    public static function etsiKurssit($opettaja) {
        $sql = "SELECT Kurssit.KurssiId, KurssinNimi, 1 as kyselyita, Aktiivinen FROM Kurssit, Kysely, Opettaja "
                . "WHERE Kurssit.KurssiId = Kysely.KurssiId AND Kurssit.OpettajaNro = Opettaja.OpettajaNro "
                . "AND Kayttajatunnus = ? UNION SELECT KurssiId, KurssinNimi, 0 as kyselyita, "
                . "'null' as aktiivinen FROM Kurssit, Opettaja WHERE Kurssit.OpettajaNro = Opettaja.OpettajaNro "
                . "AND Kayttajatunnus = ? AND KurssiId NOT IN (SELECT KurssiId FROM Kysely)";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($opettaja, $opettaja));

        $tulos = $kysely->fetchAll();
        
            if($tulos == null) {
                return null;
            } else {
                $kurssit = array();
                foreach($tulos as $k){
                    $kurssi = new Kurssi();
                    $kurssi->setKurssiId ($k['kurssiid']);
                    $kurssi->setKurssinNimi($k['kurssinnimi']);
                    $kurssi->setKyselyita($k['kyselyita']);
                    $kurssi->setAktiivinen($k['aktiivinen']);
            
                    array_push($kurssit, $kurssi);
                }
            }
        return $kurssit;
    }
    
    function getKurssiId() {
        return $this->kurssiId;
    }

    function getKurssinNimi() {
        return $this->kurssinNimi;
    }

    function getOpettaja() {
        return $this->opettaja;
    }

    function setKurssiId($kurssiId) {
        $this->kurssiId = $kurssiId;
    }

    function setKurssinNimi($kurssinNimi) {
        $this->kurssinNimi = $kurssinNimi;
    }

    function setOpettaja($opettaja) {
        $this->opettaja = $opettaja;
    }
    function getKyselyita() {
        return $this->kyselyita;
    }

    function setKyselyita($kyselyita) {
        $this->kyselyita = $kyselyita;
    }
    function getAktiivinen() {
        return $this->aktiivinen;
    }

    function setAktiivinen($aktiivinen) {
        $this->aktiivinen = $aktiivinen;
    }



}

<?php

require_once 'libs/functions.php';

class Opettaja {
  
    private $kurssiId;
    private $opettajaNro;
    private $sukunimi;
    private $etunimi;
    private $kayttajatunnus;
    private $salasana;
  
    /** 
    *Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä 
    */
    public static function etsiKurssiKoodilla($KurssiId, $OpettajaNro) {
        $sql = "SELECT KurssiId, OpettajaNro from Kurssi where KurssiId = ? AND OpettajaNro = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($KurssiId, $OpettajaNro));

        $tulos = $kysely->fetchObject();
        
        if ($tulos == null) {
            return null;
        } else {
            $opettaja = new Opettaja();
            $opettaja->setKurssiId ($tulos->KurssiId);
            $opettaja->setOpettajaNro($tulos->OpettajaNro);

        return $opettaja;
        }
    }

    /**
    *Listataan kaikki opettajat.
    */
    public static function listaaOpettajat() {
        $sql = "SELECT OpettajaNro, Sukunimi, Etunimi FROM Opettaja ORDER BY Sukunimi;";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array());

        $tulos = $kysely->fetchAll();
        
        if ($tulos == null) {
            return null;
        } else {
            $opettajat = array();
            foreach($tulos as $ope) {
                $opettaja = new Opettaja();
                $opettaja->setOpettajaNro($ope['opettajanro']);
                $opettaja->setSukunimi($ope['sukunimi']);
                $opettaja->setEtunimi($ope['etunimi']);
                
                array_push($opettajat, $opettaja);
            }
        return $opettajat;
        }
    }
    
    public function setKurssiId($KurssiId) {
      
        $kurssiId = $KurssiId;
    }
  
    public function setOpettajaNro($OpettajaNro) {
      
        $opettajaNro = $OpettajaNro;
    }
    function setSukunimi($sukunimi) {
        $this->sukunimi = $sukunimi;
    }

    function setEtunimi($etunimi) {
        $this->etunimi = $etunimi;
    }

    function setKayttajatunnus($kayttajatunnus) {
        $this->kayttajatunnus = $kayttajatunnus;
    }

    function setSalasana($salasana) {
        $this->salasana = $salasana;
    }
    
    function getKurssiId() {
        return $this->kurssiId;
    }

    function getOpettajaNro() {
        return $this->opettajaNro;
    }
    function getSukunimi() {
        return $this->sukunimi;
    }

    function getEtunimi() {
        return $this->etunimi;
    }

    function getKayttajatunnus() {
        return $this->kayttajatunnus;
    }
}
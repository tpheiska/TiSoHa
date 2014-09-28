<?php

require_once 'libs/functions.php';

class Opettaja {
  
    private $kurssiId;
    private $opettajaNro;
  
  /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */
    public static function etsiKurssiKoodilla($KurssiId, $OpettajaNro) {
        $sql = "SELECT KurssiId, OpettajaNro from Kurssi where KurssiId = ? AND OpettajaNro = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($KurssiId, $OpettajaNro));

        $tulos = $kysely->fetchObject();
        
        if ($tulos == null) {
            return null;
        } else {
            $opettaja = new Kayttaja();
            $opettaja->setKurssiId ($tulos->KurssiId);
            $opettaja->setOpettajaNro($tulos->OpettajaNro);

        return $kayttaja;
        }
  }
  
  public function setKurssiId($KurssiId) {
      
      $kurssiId = $KurssiId;
  }
  
  public function setOpettajaNro($OpettajaNro) {
      
      $opettajaNro = $OpettajaNro;
  }

  
}
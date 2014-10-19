<?php

require_once 'libs/functions.php';

class Kayttaja {
  
    private $username;
    private $password;
    private $opettajanro;
  
    /** 
    *Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä.
    */
    public static function etsiKayttajaTunnuksilla($ktunnus, $salasana) {
        $sql = "SELECT Kayttajatunnus, Salasana, OpettajaNro from Opettaja where Kayttajatunnus = ? AND Salasana = ? LIMIT 1";
        $kysely = getTietokantayhteys()->prepare($sql);
        $kysely->execute(array($ktunnus, $salasana));

        $tulos = $kysely->fetchObject();
        
        if ($tulos == null) {
            return null;
        } else {
            $kayttaja = new Kayttaja();
            $kayttaja->setKayttajatunnus ($tulos->kayttajatunnus);
            $kayttaja->setSalasana($tulos->salasana);
            $kayttaja->setOpettajanro($tulos->opettajanro);

        return $kayttaja;
        }
  }
  
  public function setKayttajatunnus($Kayttajatunnus) {
      
      $username=$Kayttajatunnus;
  }
  
  public function setSalasana($Salasana) {
      
      $password=$Salasana;
  }

  function setOpettajanro($opettajanro) {
      $this->opettajanro = $opettajanro;
  }
  
  function getOpettajanro() {
      return $this->opettajanro;
  }

}
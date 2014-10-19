<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kayttaja.php';
    
    $ktunnus = $_POST["ktunnus"];
    $salasana = $_POST["salasana"];
    $kayttaja;
    
    /**
    *Jos ei annettu käyttätunnusta, niin näytetään virheilmoitus ja näytetään
    *kirjautumislomake.
    */
    if (empty($ktunnus)) {
        naytaNakyma("login.php", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta."));
    }
    
    /**
    *Jos ei annettu salasanaa, niin näytetään virheilmoitus ja näytetään
    *kirjautumislomake.
    */
    if (empty($salasana)) {
        naytaNakyma("login.php", array(
                    'ktunnus' => $ktunnus,
                    'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa."));
    }
    
    /** 
    *Tarkistetaan onko parametrina saatu oikeat tunnukset 
    */
    $kayttaja = Kayttaja::etsiKayttajaTunnuksilla($ktunnus, $salasana);
    if ($kayttaja) {
    /** 
    *Jos tunnus on oikea, ohjataan käyttäjä hallinta sivulle. 
    */
        $_SESSION['kirjautunut'] = $ktunnus;
        header('Location: hallinta.php');
    } else {
    /** 
    *Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. 
    */
        naytaNakyma("login.php", array(
                    /** 
                    *Välitetään näkymälle tieto siitä, kuka yritti kirjautumista 
                    */
                    'ktunnus' => $ktunnus,
                    'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on v��r�.", 
                    request));
  }
  ?>
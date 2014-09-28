<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kayttaja.php';
    
    $kurssiid = $_POST["kurssikoodi"];
    $opiskelijanro = $_POST["opiskelijanumero"];
    $kayttaja;
    
    if (empty($opiskelijanumero)) {
        naytaNakyma("opiskelijaTarkistus.php", array(
        'virhe' => "Et antanut opiskelijanumeroa."));
    }
    
    /* Tarkistetaan onko parametrina saatu opiskelijanumerolla ilmoittautunut kurssille */
    $kayttaja = Kayttaja::etsiOpiskelija($kurssiid, $opiskelijanro);
    if ($kayttaja) {
    /* Jos opiskelija on imoittautunut kurssille, ohjataan käyttäjä kyselyyn. */
        $_SESSION['vastausoikeus'] = $opiskelijanro;
        header('Location: kysely.php?kurssiid=' . urlencode($kurssiid));
    } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
        naytaNakyma("opiskelijaTarkistus.php", array(
                    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
                    'opiskelijanumero' => $opiskelijanro,
                    'virhe' => "Antamasi opiskelijanumero on väärä tai et ole ilmoittautunut kurssille.", 
                    request));
  }
  
  ?>
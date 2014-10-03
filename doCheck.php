<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kayttaja.php';
    require_once 'libs/models/opiskelija.php';
    
    $kurssiid = $_POST['kurssiid'];
    $opiskelijanro = $_POST['opiskelijanro'];
    if (empty($opiskelijanro)) {
        naytaNakyma("opiskelijaTarkistus.php", array(
        'opiskelijanro' => $opiskelijanro,
        'virhe' => "Et antanut opiskelijanumeroa."));
    }
    
    /* Tarkistetaan onko parametrina saatu opiskelijanumerolla ilmoittautunut kurssille */ 
    if (Opiskelija::etsiOpiskelija($kurssiid, $opiskelijanro)) {
    /* Jos opiskelija on imoittautunut kurssille, ohjataan käyttäjä kyselyyn. */
        $_SESSION['opiskelija'] = $opiskelijanro;
        header('Location: kysely.php?kurssiid='. $kurssiid);
    } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
        naytaNakyma("opiskelijaTarkistus.php", array(
                    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
                    'opiskelijanro' => $opiskelijanro,
                    'kurssiid' => $kurssiid,
                    'virhe' => "Antamasi opiskelijanumero on väärä tai et ole ilmoittautunut kurssille.", 
                    request));
  }
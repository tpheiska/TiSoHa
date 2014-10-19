<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kayttaja.php';
    require_once 'libs/models/opiskelija.php';
    require_once 'libs/models/vastaukset.php';
    
    $kurssiid = $_POST['kurssiid'];
    $opiskelijanro = $_POST['opiskelijanro'];
    /**
    *Jos ei annettu opiskelijanumeroa, niin näytetään virheilmoitus ja näytetään
    *opiskelijanumeron tarkistuslomake.
    */
    if (empty($opiskelijanro)) {
        naytaNakyma("opiskelijaTarkistus.php", array(
        'virhe' => "Et antanut opiskelijanumeroa."), array('kurssiid' => $kurssiid));
    }
    
    /**
    *Tarkistetaan onko parametrina saatu opiskelijanumerolla ilmoittautunut kurssille 
    */ 
    if (Opiskelija::etsiOpiskelija($kurssiid, $opiskelijanro)) {
    /**
    *Jos opiskelija on imoittautunut kurssille, ohjataan käyttäjä kyselyyn. 
    */
        $_SESSION['opiskelija'] = $opiskelijanro;
        if(Vastaus::tarkistaVastaaja($opiskelijanro, $kurssiid)){
            header('Location: kysely.php?kurssiid=' . $kurssiid);
        } else {
            header('Location: muokkaavastausta.php?kurssiid=' . $kurssiid);
        }
    } else {
    /** 
    *Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. 
    */
        naytaNakyma("opiskelijaTarkistus.php", array(
                    'virhe' => "Antamasi opiskelijanumero on vÃ¤Ã¤rÃ¤ tai et ole ilmoittautunut kurssille."),
                    array('kurssiid' => $kurssiid));
    }
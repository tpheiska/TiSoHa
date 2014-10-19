<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kayttaja.php';
    require_once 'libs/models/opiskelija.php';
    require_once 'libs/models/vastaukset.php';
    
    $kurssiid = $_POST['kurssiid'];
    $opiskelijanro = $_POST['opiskelijanro'];
    /**
    *Jos ei annettu opiskelijanumeroa, niin n�ytet��n virheilmoitus ja n�ytet��n
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
    *Jos opiskelija on imoittautunut kurssille, ohjataan k�ytt�j� kyselyyn. 
    */
        $_SESSION['opiskelija'] = $opiskelijanro;
        if(Vastaus::tarkistaVastaaja($opiskelijanro, $kurssiid)){
            header('Location: kysely.php?kurssiid=' . $kurssiid);
        } else {
            header('Location: muokkaavastausta.php?kurssiid=' . $kurssiid);
        }
    } else {
    /** 
    *V��r�n tunnuksen sy�tt�nyt saa eteens� kirjautumislomakkeen. 
    */
        naytaNakyma("opiskelijaTarkistus.php", array(
                    'virhe' => "Antamasi opiskelijanumero on väärä tai et ole ilmoittautunut kurssille."),
                    array('kurssiid' => $kurssiid));
    }
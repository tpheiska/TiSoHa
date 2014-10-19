<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/vastaukset.php';
    require_once 'libs/models/kysymykset.php';
    
    /**
    *Tarkistetaan, onko opiskelija kirjautuneena ja n�ytet��n kyselylomake, jossa
    *on aiemmat vastaukset valmiiksi kirjattuna. Opiskelija voi muuttaa vastauksia
    *t�m�n j�lkeen. Jos opiskelija ei ole kirjautuneena, niin n�ytet��n kirjautumislomake.
    */
    if(isset($_SESSION['opiskelija'])) {
        $kurssiId = $_GET['kurssiid'];
        $opiskelijaNro = $_SESSION['opiskelija'];

        naytaNakyma('muokkaavastausta.php', array('vastaukset' => Vastaus::muutaVastauksia($opiskelijaNro, $kurssiId)),
                    $kurssinnimi = Kysymys::kurssinNimi($kurssiId));
    
    } else {
        header('Location: opiskelijaTarkistus.php?kurssiid'. $_GET['kurssiid']);
    }
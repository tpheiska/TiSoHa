<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/vastaukset.php';
    require_once 'libs/models/kysymykset.php';
    
    /**
    *Tarkistetaan, onko opiskelija kirjautuneena ja näytetään kyselylomake, jossa
    *on aiemmat vastaukset valmiiksi kirjattuna. Opiskelija voi muuttaa vastauksia
    *tämän jälkeen. Jos opiskelija ei ole kirjautuneena, niin näytetään kirjautumislomake.
    */
    if(isset($_SESSION['opiskelija'])) {
        $kurssiId = $_GET['kurssiid'];
        $opiskelijaNro = $_SESSION['opiskelija'];

        naytaNakyma('muokkaavastausta.php', array('vastaukset' => Vastaus::muutaVastauksia($opiskelijaNro, $kurssiId)),
                    $kurssinnimi = Kysymys::kurssinNimi($kurssiId));
    
    } else {
        header('Location: opiskelijaTarkistus.php?kurssiid'. $_GET['kurssiid']);
    }
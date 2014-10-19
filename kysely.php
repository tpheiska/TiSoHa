<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';
    
    $kurssiid = $_GET['kurssiid'];
    
    /**
    *Tarkistetaan, onko opiskelija kirjautuneena ja jos on, niin näytetään
    *kysely. Jos käyttäjä ei ole kirjautunut, niin näytetään kirjautumislomake.
    */
    if(isset($_SESSION['opiskelija'])) {
        naytaNakyma('kysely.php', array('kurssikysely' => Kysymys::etsiKurssiKysely($_GET['kurssiid'])), 
                    $kurssinnimi = Kysymys::kurssinNimi($_GET['kurssiid']));
    } else {
        header('Location: opiskelijaTarkistus.php?kurssiid='. $_GET['kurssiid']);
    }
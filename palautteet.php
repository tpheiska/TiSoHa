<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/vastaukset.php';
    require_once 'libs/models/kysymykset.php';
    
    /**
    *Tarkistetaanko, onko opettaja kirjautuneena ja sen j�lkeen n�ytet��n palautesivu.
    *Jos palautesivulla on painettu vastaajan kohdalla nappia, n�ytet��n kyseisen
    *oppilaan vastauksen kysymyksiin.
    */
    if(isset($_SESSION['kirjautunut'])) {
        if(empty($_POST['vastaajaId'])) {
            naytaNakymaH('palautteet.php', array('vastaajat' => Vastaus::etsiKyselyynVastanneet($_SESSION['kirjautunut'], $_POST['kurssiId'])),
                                           $kurssinnimi = Kysymys::kurssinNimi($_POST['kurssiId']));
        }
        else {
            naytaNakymaH('palautteet.php', array('vastaajat' => Vastaus::etsiKyselyynVastanneet($_SESSION['kirjautunut'], $_POST['kurssiId'])),
                                           $kurssinnimi = Kysymys::kurssinNimi($_POST['kurssiId']),
                                           array('vastaukset' => Vastaus::etsiVastaukset($_POST['vastaajaId'], $_POST['kurssiId'])));
        }
    } else {
        header('Location: login.php');
    }
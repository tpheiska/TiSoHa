<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssit.php';
    require_once 'libs/models/opettaja.php';
    require_once 'libs/models/opiskelija.php';
    
    /**
    *Tarkistetaan onko kirjautuneena ja sen jälkeen onko kirjautunu opettaja vai
    *administrator ja näytetään sen mukaan näkymä.
    */
    if(isset($_SESSION['kirjautunut'])) {
        $opettaja = $_SESSION['kirjautunut'];
        if($_SESSION['kirjautunut'] == 'admin')
            naytaNakymaH('admin.php', array('opettajat' => Opettaja::listaaOpettajat()),
                                      array('opiskelijat' => Opiskelija::listaaOpiskelijat()),
                                      array('kurssit' => Kurssi::listaaKurssit()));
        else
            naytaNakymaH('hallinta.php', array('kurssit' => Kurssi::etsiKurssit($opettaja)));
    } else {
        header('Location: login.php');
    }

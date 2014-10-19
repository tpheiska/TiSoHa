<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';

    /**
    *Tarkistetaan, onko opettaja kirjautuneena ja sen jälkeen näkymä uuden kyselyn
    *luomiseksi. Jos ei ole kirjautunut, niin näytetään kirjautumislomake.
    */
    if(isset($_SESSION['kirjautunut'])) {
        naytaNakymaH('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()));
    } else {
        header('Location: login.php');
    }
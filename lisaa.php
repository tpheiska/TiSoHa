<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';

    /**
    *Tarkistetaan, onko opettaja kirjautuneena ja sen j�lkeen n�kym� uuden kyselyn
    *luomiseksi. Jos ei ole kirjautunut, niin n�ytet��n kirjautumislomake.
    */
    if(isset($_SESSION['kirjautunut'])) {
        naytaNakymaH('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()));
    } else {
        header('Location: login.php');
    }
<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssit.php';
    
    $opettaja = $_SESSION['kirjautunut'];
    naytaNakyma('hallinta.php', array('kurssit' => Kurssi::etsiKurssit($opettaja)));

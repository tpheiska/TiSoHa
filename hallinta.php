<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    $opettaja = $_SESSION['kirjautunut'];
    naytaNakyma('hallinta.php', array('kurssikyselyt' => Kurssikyselyt::etsiKurssikyselyt($opettaja)));

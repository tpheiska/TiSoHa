<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    /**
    *N�ytet��n sovelluksen etusivu.
    */
    naytaNakymaH('index.php', array('kurssikyselyt' => Kurssikyselyt::etsiAktiivisetKurssikyselyt()));
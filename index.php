<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    /**
    *Näytetään sovelluksen etusivu.
    */
    naytaNakymaH('index.php', array('kurssikyselyt' => Kurssikyselyt::etsiAktiivisetKurssikyselyt()));
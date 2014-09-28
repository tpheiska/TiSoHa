<?php
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    naytaNakyma('index.php', array('kurssikyselyt' => Kurssikyselyt::etsiAktiivisetKurssikyselyt()));
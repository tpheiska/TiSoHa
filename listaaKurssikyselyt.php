<?php
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';

    naytaNakyma('index', array('kurssikyselyt' => Kurssikysely::etsiAktiivisetKurssikyselyt()));
<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    $kurssiid = $_GET['kurssiid'];
    
    naytaNakyma('kysely.php', array('kurssikyselyt' => Kyselyt::etsiKyselyt($kurssiid)));
    
    //, array(Kysely::etsiKysely($kurssiid))
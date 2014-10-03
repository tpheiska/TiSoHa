<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';
    
    $kurssiid = $_GET['kurssiid'];
    
    naytaNakyma('kysely.php', array('kurssikysely' => Kysymys::etsiKurssiKysely($kurssiid)), 
            $kurssinnimi = Kysymys::kurssinNimi($kurssiid));
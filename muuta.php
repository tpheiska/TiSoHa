<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    $kurssiid = $_POST['kurssiId'];
    $muuta = $_POST['muuta'];
    $poista = $_POST['poista'];
    $aktiivinen = $_POST['aktivoi'];
    if($muuta == 'muuta') {
        naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
               array('kurssikysely' => Kysymys::etsiKurssiKysely($kurssiid)));
    }
    
    if($poista == 'poista') {
        Kurssikyselyt::poistaKysely($kurssiId);
        header('Location: hallinta.php');
    }
    
    if($aktiivinen != null) {
        if($aktiivinen == 'kylla')
            $aktiivinen = 'ei';
        else
            $aktiivinen = 'kylla';
        Kurssikyselyt::muutaAktiivisuus($aktiivinen, $kurssiid);
    
        header('Location: hallinta.php');
    }
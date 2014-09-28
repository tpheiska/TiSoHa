<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    $kurssiid = $_GET['kurssiid'];
    $opettajanro = $_GET['opettajanro'];
    $muuta = $_GET['muuta'];
    $poista = $_GET['poista'];
    $aktiivinen = $_GET['aktivoi'];
    $opettaja = $_SESSION['kirjautunut'];
    if($muuta != null) {
        
    }
    
    if($poista != null) {
        
    }
    
    if($aktiivinen != null) {
        if($aktiivinen == 'kylla')
            $aktiivinen = 'ei';
        else
            $aktiivinen = 'kylla';
        Kurssikyselyt::muutaAktiivisuus($aktiivinen, $kurssiid);
    
        header('Location: ../hallinta.php');
    
        //naytaNakyma('hallinta.php', array('kurssikyselyt' => Kurssikyselyt::etsiKurssikyselyt($opettaja)));
    }
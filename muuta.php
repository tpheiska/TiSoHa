<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    if($_POST['muuta'] == 'muuta') {
        naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
               array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
    }

    if($_POST['lisaa'] == 'lisaa') {
        if($_POST['uusikysely'] == 'kylla') {
            Kurssikyselyt::lisaaKysely($_POST['kurssiId'], "ei");
        }
        Kurssikyselyt::tallennaKysymys($_POST['kurssiId'], $_POST['kysymysId'], $_POST['muoto']);
        naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
               array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
    }
    
    if($_POST['poista'] == 'poista') {
        Kurssikyselyt::poistaKysymys($_POST['kurssiId'], $_POST['kysymysId'], $_POST['muoto']);
        naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
               array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
       
    }
    
    if($_POST['aktivoi'] != null) {
        $aktiivinen = $_POST['aktivoi'];
        if($aktiivinen == 'kylla')
            $aktiivinen = 'ei';
        else
            $aktiivinen = 'kylla';
        Kurssikyselyt::muutaAktiivisuus($aktiivinen, $_POST['kurssiId']);
    
        header('Location: hallinta.php');
    }
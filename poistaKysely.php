<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';

    $kurssiId = $_POST['kurssiId'];    
    
    /**
    *Poistetaan kurssikysely.
    */
    Kurssikyselyt::poistaKysely($kurssiId);

    /**
    *N�ytet��n hallintasivu
    */
    header('Location: hallinta.php');
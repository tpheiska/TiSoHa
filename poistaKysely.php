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
    *Nהytetההn hallintasivu
    */
    header('Location: hallinta.php');
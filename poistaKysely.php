<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';

    $kurssiId = $_POST['kurssiId'];    

    Kurssikyselyt::poistaKysely($kurssiId);

    header('Location: hallinta.php');
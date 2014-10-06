<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php';

    $kurssiId = $_POST['kurssiid'];
    $kysymysId = $_POST['kysymysid'];
    $muoto = $_POST['muoto'];
    $_SESSION['muuta'] = "muuta";
    $_SESSION['kurssiId'] = $kurssiId;
    

    Kurssikyselyt::tallennaKysymys($kurssiId, $kysymysId, $muoto);

    header('Location: muuta.php');

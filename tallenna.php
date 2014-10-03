<?php
    session_start();
    require_once 'libs/models/kurssikyselyt.php';

    $kurssiId = $_POST['kurssiid'];
    $kysymysId = $_POST['kysymysid'];
    $muoto = $_POST['muoto'];
    echo $kurssiId;
    echo $kysymysId;
    echo $muoto;
    Kurssikyselyt::tallennaKysymys($kurssiId, $kysymysId, $muoto);

    header('Location: lisaa.php');

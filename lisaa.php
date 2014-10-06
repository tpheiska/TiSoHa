<?php
session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';

    if($_SESSION['kurssiId'] != null && $_POST['kurssiId'] == null) {
        naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
                array('kurssikysely' => Kysymys::etsiKurssiKysely($_SESSION['kurssiId'])));
    }
    $kurssiId = $_POST['kurssiId'];
    naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()));
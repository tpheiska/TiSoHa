<?php
session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';

    $kurssiId = $_POST['kurssiId'];
    naytaNakyma('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()));
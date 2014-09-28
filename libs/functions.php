<?php

    require_once 'libs/models/kayttaja.php';
    require_once 'libs/models/opiskelija.php';
    require_once 'libs/models/opettaja.php';
    

    function naytaNakyma($sivu, $data = array()) {
        $data = (object)$data;
        require "views/pohja.php";
        exit();
    }
    
    function getTietokantayhteys() {

        static $yhteys = null;

        if ($yhteys == null) {

            $yhteys = new PDO("pgsql:");
            $yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        return $yhteys;
    }

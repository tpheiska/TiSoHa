<?php
    

    function naytaNakyma($sivu, $data = array(), $data2 = array()) {
        $data = (object)$data;
        $data2 = (object)$data2;
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

<?php
    session_start();

    /**
    *Poistetaan kirjautumistiedot ja n�ytet��n etusivu.
    */
    unset($_SESSION["opiskelija"]);
    header('Location: index.php');

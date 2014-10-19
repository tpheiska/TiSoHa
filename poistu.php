<?php
    session_start();

    /**
    *Poistetaan kirjautumistiedot ja nהytetההn etusivu.
    */
    unset($_SESSION["opiskelija"]);
    header('Location: index.php');

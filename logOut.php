<?php

    session_start();
    
    /**
    *Poistetaan kirjautumis tieto ja n�ytet��n etusivu.
    */
    unset($_SESSION["kirjautunut"]);
    header('Location: index.php');
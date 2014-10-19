<?php

    session_start();
    
    /**
    *Poistetaan kirjautumis tieto ja nהytetההn etusivu.
    */
    unset($_SESSION["kirjautunut"]);
    header('Location: index.php');
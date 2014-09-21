<?php
  
    session_start();
    if (empty($_POST["ktunnus"])) {
        naytaNakyma("login.html", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta."));
    }
    $kayttaja = $_POST["ktunnus"];

    if (empty($_POST["salasana"])) {
        naytaNakyma("login.php", array(
                    'ktunnus' => $ktunnus,
                    'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa."));
    }
    $salasana = $_POST["salasana"];
    /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
    if ($ktunnus == "admin" && $salasana == "1234") {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
        $_SESSION['kirjautunut'] = $kayttaja;
        header("Location: ../html-demo/hallinta.html");
    } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
        naytaNakyma("login.php", array(
                    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
                    'ktunnus' => $kayttaja,
                    'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.", 
                    request));
  }
  ?>
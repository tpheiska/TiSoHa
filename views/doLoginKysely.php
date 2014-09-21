<?php

    if (empty($_POST["kurssikoodi"])) {
        naytaNakyma("opiskelijaTarkistus", array(
        'virhe' => "Kirjautuminen epäonnistui! Et antanut kurssitunnusta.",
    ));
    }
    $kurssikoodi = $_POST["kurssikoodi"];

    if (empty($_POST["opiskelijanumero"])) {
        naytaNakyma("opiskelijaTarkistus", array(
        'kurssikoodi' => $kurssi,
        'virhe' => "Kirjautuminen epäonnistui! Et antanut opiskelijanumeroa.", request));
    }
    $opiskelijanumero = $_POST["opiskelijanumero"];
    /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
    if ("3" == $kurssikoodi && "1" == $opiskelijanumero) {
        /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
        header('Location: kysely.html');
    } elseif (etsiKayttajaTunnuksilla(kurssikoodi, opiskelijanumero)!=null) {
            header('Location: kysely.html');
    } else {
        /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
        naytaNakyma("opiskelijaTarkistus", array(
            /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
            'kurssikoodi' => $kurssikoodi,
            'virhe' => "Kirjautuminen epäonnistui! Et ole ilmoittautunut kurssille.", 
            request));
  }




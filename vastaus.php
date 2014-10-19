<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/vastaukset.php';

    /**
    *Tarkistetaan, onko opiskelija kirjautuneena ja sen jälkeen tarkistetaan,
    *onko oppilas jo vastannut kyselyyn. Jos on vastannut muutetaan vastausta ja
    *jos ei, niin talletetaan vastaus. Jos opiskelija ei ole kirjautuneena, niin
    *näytetään kirjautumissivu.
    */
    if(isset($_SESSION['opiskelija'])) {
        if($_POST['vastaajaId'] != null && $_POST['kurssiId'] != null) {
            if(Vastaus::tarkistaVastaaja($_SESSION['opiskelija'], $_POST['kurssiId'])) {
                foreach($_POST['kysymysId'] as $kysymysId) {
                    $vastaus = "vastaus" . $kysymysId;
                    $muoto = "muoto" . $kysymysId;
                    Vastaus::tallennaVastaus($_POST['vastaajaId'],
                                     $_POST['kurssiId'], 
                                     $kysymysId, 
                                     $_POST[$muoto], 
                                     htmlspecialchars(trim($_POST[$vastaus])));
                }
                Vastaus::merkitseVastanneeksi($_POST['vastaajaId'],
                                      $_SESSION['opiskelija'],
                                      $_POST['kurssiId']);
            } else {
                foreach($_POST['kysymysId'] as $kysymysId) {
                    $vastaus = "vastaus" . $kysymysId;
                    $muoto = "muoto" . $kysymysId;
                    Vastaus::muutaVastaus(htmlspecialchars(trim($_POST[$vastaus])),
                                  $_POST['vastaajaId'],
                                  $_POST['kurssiId'], 
                                  $kysymysId);
                }
            }
            naytaNakyma("vastaus.php");
        } else {
            header('Location: kysely.php?kurssiid='. $_POST['kurssiId']);
        }
    } else {
        header('Location: opiskelijaTarkistus.php?kurssiid='. $_POST['kurssiId']);
    }
<?php
    session_start();
    require_once 'libs/functions.php';
    require_once 'libs/models/kysymykset.php';
    require_once 'libs/models/kurssikyselyt.php';
    
    /**
    *Tarkistetaan, onko opettaja kirjautuneena. Jos ei, niin n�ytet��n kirjautumislomake.
    */
    if(isset($_SESSION['kirjautunut'])) {

        /**
        *Jos halutaan muuttaa kysely�, niin n�ytet��n kysely ja kysymyslista.
        *Kysymyksi� voi poistaa ja lis�t�.
        */
        if(!empty($_POST['muuta'])) {
            naytaNakymaH('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
                        array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
        }

        /**
        *Jos halutaan lis�t� kysymys, tarkistetaan onko kysymys valittu ja onko muoto
        *valittu. Jos joku puuttuu, niin n�ytet��n muokkauslomake ja virheilmoitus.
        */
        if(!empty($_POST['lisaa'])) {
            if($_POST['kysymysId'] != null && $_POST['muoto'] != null) {
                if($_POST['uusikysely'] == 'kylla') {
                    if(Kurssikyselyt::tarkistaKyselyt($_POST['kurssiId']) == null)
                        Kurssikyselyt::lisaaKysely($_POST['kurssiId'], "ei");
                }
                Kurssikyselyt::tallennaKysymys($_POST['kurssiId'], $_POST['kysymysId'], $_POST['muoto']);
                naytaNakymaH('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
                            array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
            } else {
                naytaNakymaH("lisaa.php",  array('kysymyksia' => Kysymys::etsiKysymykset()),
                            array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])),
                            array('virhe' => "Lis��minen ep�onnistui! Et valinnut, onko vastauksessa tekstikentt� "
                                    . "vai onko se monivalintakysymys."));
            }
        }
    
        /**
        *Jos painettu poista-nappia, niin poistetaan kyseinen kysymys.
        */
        if(!empty($_POST['poista'])) {
            Kurssikyselyt::poistaKysymys($_POST['kurssiId'], $_POST['kysymysId'], $_POST['muoto']);
            naytaNakymaH('lisaa.php', array('kysymyksia' => Kysymys::etsiKysymykset()),
                        array('kurssikysely' => Kysymys::etsiKurssiKysely($_POST['kurssiId'])));
       
        }
    
        /**
        *Muutetaan kyselyn aktiivisuus.
        */
        if(!empty($_POST['aktivoi'])) {
            $aktiivinen = $_POST['aktivoi'];
            if($aktiivinen == 'kylla')
                $aktiivinen = 'ei';
            else
                $aktiivinen = 'kylla';
            Kurssikyselyt::muutaAktiivisuus($aktiivinen, $_POST['kurssiId']);
    
            header('Location: hallinta.php');
        }
    } else {
        header('Location: login.php');
    }
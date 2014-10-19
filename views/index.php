        <div id="esittely" style="width:1000px">Tältä sivulta pääset vastaamaan kurssikyselyyn
            ja antamaan palautetta kurssin pitäjälle. Opiskelijanumero
            on annettava, jotta voidaan tarkistaa että kyselyyn vastaavat vain kurssille 
            ilmoittautuneet. Kyselyyn vastataan nimettömänä ja kurssin pitäjä ei saa 
            tietoonsa kyselyyn vastanneiden ja palautteen antaneiden nimiä. Kurssikyselyjen
            hallinta sivuille pääsee kirjautumaan oikealta ylhäältä.</div>
        
        <div id="check" style="width:800px">
            <ul style="list-style-type:none">
                <?php foreach($data->kurssikyselyt as $kurssikysely): ?>
                <li><a href="opiskelijaTarkistus.php?kurssiid=<?php echo $kurssikysely->getKurssiId();?>">
                    <?php echo $kurssikysely->getKurssiId();?></a>:
                    <?php echo $kurssikysely->getKurssinNimi() ;?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <?php if(isset($_SESSION['kirjautunut'])): ?>
                <a href="hallinta.php">Hallinta sivu</a>
            <?php endif; ?>
        </div>
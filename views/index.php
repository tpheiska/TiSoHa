        <div id="otsikko" style="width:1000px"><h1>Kurssikysely</h1></div>
        <div id="esittely" style="width:1000px">Tältä sivulta pääset vastaamaan kurssikyselyyn
            ja antamaan palautetta kurssin pitäjälle. Kurssia 
            on annettava, jotta voidaan tarkistaa että kyselyyn vastaavat vain kurssille 
            ilmoittautuneet. Kyselyyn vastataan muuten nimettömänä ja kurssin pitäjä ei saa 
            tietoonsa kyselyyn vastanneiden ja palautteen antaneiden nimiä. Kurssikyselyjen
            hallinta sivuille pääsee oikealla laidalla olevasta linkistä.</div>
        
        <div id="check" style="width:800px">
            <ul>
                <?php foreach($data->kurssikyselyt as $kurssikysely): ?>
                <li><a href="opsiskelijaTarkistus.php?kurssiid=<?php echo $kurssikysely->getKurssiId();?>">
                    <?php echo $kurssikysely->getKurssiId();?></a>:
                    <?php echo $kurssikysely->getKurssinNimi() ;?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div id="hallinta" style="width:200px">
            Kyselyjen hallinta
            <a HREF="login.php">Kirjaudu</a>
        </div>
<?php session_start(); ?>
<h1>Kurssikyselyjen hallinta</h1>
<div>
    <table style="width:400px;" cellpadding="0" cellspacing="0">
        <tr>
           <td align='center'>Kurssikoodi</td><td align='center'>Kurssi</td><td></td>
        </tr>
        <?php foreach($data->kurssikyselyt as $kurssikysely): ?>
        <tr>
            <td align='center'><?php echo $kurssikysely->getKurssiId();?></td>
            <td align='center'><?php echo $kurssikysely->getKurssinNimi();?></td>
            <td>
                <a href="muuta.php/?kurssiid=<?php echo $kurssikysely->getKurssiId();?>&opettajanro=<?php echo $kurssikysely->getOpettajaNro();?>&muuta=kylla">Muuta</a>
                <a href="muuta.php/?kurssiid=<?php echo $kurssikysely->getKurssiId();?>&opettajanro=<?php echo $kurssikysely->getOpettajaNro();?>&poista=kylla">Poista</a>
                <a href="muuta.php/?kurssiid=<?php echo $kurssikysely->getKurssiId();?>&opettajanro=<?php echo $_GET['opettajanro'];?>&aktivoi=kylla">Aktivoi</a>
            </td>
         </tr>
         <?php endforeach; ?>
    </table>
</div><br>
<div>
    <form action="muokkaus.html" method="GET">
        <button type="submit" name="lisaakysely">Lisää uusi kysely</button>
    </form>
</div><br>
<div>
    Lue palautteita tai tulosta tilastoja.<br>
    Kurssikoodi:<br>
    <input type="text" name="kurssikoodi"><br>
    <button type="submit" name="palaute">Palautteet</button>
    <button type="submit" name="tilastot">Tilastot</button><br>
</div>
<div>
    <a href="logOut.php">
        Kirjaudu ulos
    </a>
</div>

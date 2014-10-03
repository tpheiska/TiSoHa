<?php session_start(); ?>
<h1>Kurssikyselyjen hallinta</h1>
<div>
    <table style="width:400px;" cellpadding="0" cellspacing="0">
        <tr>
           <td align='center'>Kurssikoodi</td><td align='center'>Kurssi</td><td></td>
        </tr>
        <?php foreach($data->kurssit as $kurssi): ?>
        <tr>
            <?php if($kurssi->getKyselyita() == 1): ?>
                <td align='center'><?php echo $kurssi->getKurssiId();?></td>
                <td align='center'><?php echo $kurssi->getKurssinNimi();?></td>
                <td>
                    <?php if($kurssi->getAktiivinen() == 'ei'): ?>
                        <form method="POST" action="muuta.php" style="display: inline-block">
                            <input type="hidden" value="<?php echo $kurssi->getKurssiId(); ?>" name="kurssiId">
                            <input type="hidden" value="muuta" name="muuta">
                            <button type="submit">Muuta</button>
                        </form>
                        <form method="POST" action="muuta.php" style="display: inline-block">
                            <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                            
                            <input type="hidden" value="poista" name="poista">
                            <button type="submit">Poista</button>
                        </form>
                        <form method="POST" action="muuta.php" style="display: inline-block">
                            <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                            <input type="hidden" value="ei" name="aktivoi">
                            <button type="submit">Aktivoi</button>
                        </form>
                    <?php else: ?>
                        <form method="POST" action="muuta.php">
                            <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                            <input type="hidden" value="kylla" name="aktivoi">
                            <button type="submit">Sulje</button>
                        </form>
                    <?php endif; ?>
                </td>
            <?php else: ?>
                <td align='center'><?php echo $kurssi->getKurssiId();?></td>
                <td align='center'><?php echo $kurssi->getKurssinNimi();?></td>
                <td>
                    <form method="POST" action="lisaa.php">
                        <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                        <button type="submit">Lisää kysely</button>
                    </form>
                </td>
            <?php endif; ?>
         </tr>
         <?php endforeach; ?>
    </table>
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

<div>
    Voit tehdä kurssikyselyjä ja muokata olemassa olevia. Kyselyn käynnissä ollessa kyselyä ei voi muokata.
</div>
<br>
<div>
    <table>
        <tr>
            <td align='center'>Kurssikoodi</td><td style="text-align:center; width:150px">Kurssi</td><td></td>
        </tr>
        <?php if(!empty($data->kurssit)):
            foreach($data->kurssit as $kurssi): ?>
                <tr>
                    <?php if($kurssi->getKyselyita() == 1): ?>
                        <td style="text-align:center">
                            <?php if($kurssi->getAktiivinen() == 'ei'): ?>
                                <form name="kyselyId" action="muuta.php" method="POST">
                                    <a href="javaScript:linkHaeKyselySubmit()"><?php echo $kurssi->getKurssiId(); ?></a>
                                    <input type="hidden" name="kurssiId" value="<?php echo $kurssi->getKurssiId(); ?>">
                                    <input type="hidden" name="muuta" value="muuta">
                                </form>
                            <?php else:
                                echo $kurssi->getKurssiId();
                            endif; ?>
                        </td>
                        <td style="text-align:center"><?php echo $kurssi->getKurssinNimi();?></td>
                        <td style="width:350px">
                            <?php if($kurssi->getAktiivinen() == 'ei'): ?>
                                <form method="POST" action="muuta.php" style="display: inline-block">
                                    <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                                    <input type="hidden" value="muuta" name="muuta">
                                    <button type="submit">Muuta</button>
                                </form>
                                <form method="POST" action="poistaKysely.php" style="display: inline-block">
                                    <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                                    <input type="hidden" value="poista" name="poista">
                                    <button type="submit">Poista</button>
                                </form>
                                <form method="POST" action="muuta.php" style="display: inline-block">
                                    <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                                    <input type="hidden" value="ei" name="aktivoi">
                                    <button type="submit">Aktivoi</button>
                                </form>
                                <form action="palautteet.php" method="POST"  style="display: inline-block">
                                    <input type="hidden" name="kurssiId" value="<?php echo $kurssi->getKurssiId();?>">
                                    <button type="submit" name="palaute">Palautteet</button>
                                </form>
                            <?php else: ?>
                                <form method="POST" action="muuta.php"  style="display: inline-block">
                                    <input type="hidden" value="<?php echo $kurssi->getKurssiId();?>" name="kurssiId">
                                    <input type="hidden" value="kylla" name="aktivoi">
                                    <button type="submit">Sulje</button>
                                </form>
                                <form action="palautteet.php" method="POST"  style="display: inline-block">
                                    <input type="hidden" name="kurssiId" value="<?php echo $kurssi->getKurssiId();?>">
                                    <button type="submit" name="palaute">Palautteet</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    <?php else: ?>
                        <td style="text-align:center">
                            <form action="lisaa.php" name="kyselyId" method="POST">
                                <a href="javaScript:linkHaeKyselySubmit()"><?php echo $kurssi->getKurssiId();?></a>
                                <input type="hidden" name="kurssiId" value="<?php echo $kurssi->getKurssiId();?>">
                            </form>
                        </td>
                        <td align='center'><?php echo $kurssi->getKurssinNimi();?></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach;
        endif; ?>
    </table>
</div>
<br>
<br>
<br>
<div>
    <a href="index.php">Etusivulle</a>
</div>
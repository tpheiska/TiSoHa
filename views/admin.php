<?php
    require_once 'libs/functions.php' ;?>
    <div>
        <form action="hallinnoi.php" method="POST">
            <select size="10" style="width:200px">
                <?php foreach($data->opettajat as $opettaja): ?>
                    <option><?php echo $opettaja->getSukunimi(); ?>, <?php echo $opettaja->getEtunimi(); ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="hidden" name="opettajaNro" value="<?php echo $opettaja->getOpettajaNro(); ?>">
            <button type="submit" name="poista" value="poista" style="margin-left:12px">Poista</button>
            <button type="submit" name="lisaaOpettaja" value="lisaa">Lisää opettaja</button>
        </form>
    </div>
    <form action="hallinnoi.php" method="POST">
        <div align="left" style="display:inline-block">
            <select size="10" style="width:200px">
                <?php foreach($data2->opiskelijat as $opiskelija): ?>
                    <option><?php echo $opiskelija->getSukunimi(); ?>,<?php echo $opiskelija->getEtunimi(); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="opiskelijaNro" value="<?php echo $opiskelija->getOpiskelijaNro(); ?>">
            <br>
            <button type="submit" name="poista" value="poista" style="margin-left:12px">Poista</button>
            <button type="submit" name="lisaaOpiskelija" value="lisaa">Lisää opiskelija</button>
        </div>
        <div align="center" style="display:inline-block; vertical-align:100px">
            <button action="hallinnoi.php" name="lisaaOpiskelijaKurssille">Lisää Opiskelija Kurssille</button>
        </div>
        <div align="right" style="display:inline-block">
            <select size="10" style="width:200px">
                <?php foreach($data3->kurssit as $kurssi): ?>
                    <option><?php echo $kurssi->getKurssinNimi(); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="kurssiId" value="<?php echo $kurssi->getKurssiId(); ?>">
            <br>
            <button type="submit" name="poista">Poista</button>
            <button type="button" action="lisaaKurssi.php" name="lisaaKurssi" value="lisaa" style="margin-right:20px">Lisää Kurssi</button>
        </div>
    </form>
    <div>
         
    </div>
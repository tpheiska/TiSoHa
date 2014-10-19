<?php
    require_once 'libs/functions.php';
    require_once 'libs/models/kurssikyselyt.php'; ?>

    <h3><?php echo $data2->kurssinnimi; ?>:n palautteet</h3>
    <br>
    <div style="display: inline-block; vertical-align:top">
        <?php if(!empty($data->vastaajat)): ?>
            <h5>Vastaajat:</h5>
            <ul style="list-style-type:none">
                <?php foreach($data->vastaajat as $vastaajat): ?>
                <li>
                    <form name="vastaajaId" action="palautteet.php" method="POST">
                        <a href="javaScript:linkHaeVastauksetSubmit()"><?php echo $vastaajat->getVastaajaId(); ?></a>
                        <input type="hidden" name="vastaajaId" value="<?php echo $vastaajat->getVastaajaId(); ?>">
                        <input type="hidden" name="kurssiId" value="<?php echo $vastaajat->getKurssiId(); ?>">
                        <button type="submit" name="hae">Hae vastaukset</button>
                    </form>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            Ei vastauksia!
        <?php endif; ?>
    </div>
    <div style="display: inline-block; vertical-align:top">
        <?php if(!empty($data3->vastaukset)): ?>
        <h5></h5>
        <table>
            <tr>
                <td style="text-align:center">Kysymys:</td><td style="text-align:center; width:300px">Vastaus:</td>
                <td style="text-align:center; padding-left:4px">Moodi</td>
                <td style="text-align:center; padding-left:4px">Mediaani</td>
            </tr>
            <?php foreach($data3->vastaukset as $vastaus): ?>
            <tr>
                <td style="vertical-align:top"><?php echo $vastaus->getKysymys(); ?></td>
                <?php if($vastaus->getMuoto() == 'radio'): ?>
                    <td style="text-align:center; padding-left:4px"><?php echo $vastaus->getVastaus(); ?></td>
                <?php else: ?>
                    <td style="text-align:justify; padding-left:4px"><?php echo $vastaus->getVastaus(); ?></td>
                <?php endif; ?>
                <td style="text-align:center; padding-left:4px"></td>
                <td style="text-align:center; padding-left:4px"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div>
        <a href="hallinta.php">Hallinta sivulle</a>
    </div>
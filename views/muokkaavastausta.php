<h2>Kurssikysely, <?php echo ($data2->kurssinnimi); ?></h2>    
    <div>
        <form action="vastaus.php" method="POST">
            <ol>
                <?php foreach($data->vastaukset as $vastaus): ?>
                    <li><?php echo $vastaus->getKysymys() ?><br>
                        <?php if($vastaus->getMuoto() == 'radio') :?>
                            <?php if($vastaus->getVastaus() == '0'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="0" checked="checked">0
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="0">0
                            <?php endif; ?>
                            <?php if($vastaus->getVastaus() == '1'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="1" checked="checked">1
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="1">1
                            <?php endif; ?>
                            <?php if($vastaus->getVastaus() == '2'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="2" checked="checked">2
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="2">2
                            <?php endif; ?>
                            <?php if($vastaus->getVastaus() == '3'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="3" checked="checked">3
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="3">3
                            <?php endif; ?>
                            <?php if($vastaus->getVastaus() == '4'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="4" checked="checked">4
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="4">4
                            <?php endif; ?>
                            <?php if($vastaus->getVastaus() == '5'): ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="5" checked="checked">5
                            <?php else: ?>
                                <input type="radio" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" value="5">5
                            <?php endif; ?><br>
                        <?php else :?>
                            <textarea rows="5" cols="30" name="vastaus<?php echo $vastaus->getKysymysId(); ?>" align="left" 
                                      maxlength="500"><?php echo $vastaus->getVastaus(); ?></textarea>
                        <?php endif;?>
                        <input type="hidden" name="kysymysId[]" value="<?php echo $vastaus->getKysymysId(); ?>">
                        <input type="hidden" name="muoto<?php echo $vastaus->getKysymysId(); ?>" value="<?php echo $vastaus->getMuoto(); ?>">
                    </li>
                <?php endforeach; ?>
                <input type="hidden" name="kurssiId" value="<?php echo $vastaus->getKurssiId(); ?>">
                <input type="hidden" name="vastaajaId" value="<?php echo $vastaus->getVastaajaId(); ?>">
            </ol><br>
            <button type="submit" name="submit">Lähetä</button>
        </form>
    </div>
    <br>
    <div>
        <a href="poistu.php">Poistu</a>
    </div>
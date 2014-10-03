<?php session_start(); ?>
<h2>Kurssikysely, <?php echo ($data2->kurssinnimi) ?></h2>
<div>
    <form action="" method="POST">
        <ol>
            <?php foreach($data->kurssikysely as $kysymys): ?>
                <li><?php echo $kysymys->getKysymys() ?><br>
                    <?php if($kysymys->getMuoto() == 'radio') :?>
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="0">0
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="1">1
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="2">2
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="3">3
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="4">4
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymys()?>" value="5">5<br>
                    <?php else :?>
                        <input type="text" name="vastaus<?php echo $kysymys->getKysymys()?>">
                    <?php endif;?>
                </li>
            <?php endforeach; ?>
        </ol><br>
        <button type="submit" name="laheta">Lähetä</button>
    </form>
</div>
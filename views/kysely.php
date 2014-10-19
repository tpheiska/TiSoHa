<h2>Kurssikysely, <?php echo ($data2->kurssinnimi); ?></h2>
<div>
    <?php if(!empty($data->virhe))
        echo $data->virhe;
    if($_POST['vastaajaId'] == null):
        $vastaajaId = rand(1, 50); ?>
    <form action="vastaus.php" method="POST">
        <ol>
            <?php foreach($data->kurssikysely as $kysymys): ?>
                <li><?php echo $kysymys->getKysymys() ?><br>
                    <?php if($kysymys->getMuoto() == 'radio') :?>
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="0">0
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="1">1
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="2">2
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="3">3
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="4">4
                        <input type="radio" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" value="5">5<br>
                    <?php else :?>
                        <textarea rows="5" cols="30" name="vastaus<?php echo $kysymys->getKysymysId(); ?>" maxlength="500"></textarea>
                    <?php endif;?>
                    <input type="hidden" name="kysymysId[]" value="<?php echo $kysymys->getKysymysId(); ?>">
                    <input type="hidden" name="muoto<?php echo $kysymys->getKysymysId(); ?>" value="<?php echo $kysymys->getMuoto(); ?>">
                </li>
            <?php endforeach; ?>
            <input type="hidden" name="kurssiId" value="<?php echo $_GET['kurssiid']; ?>">      
            <input type="hidden" name="vastaajaId" value="<?php echo $vastaajaId; ?>">
        </ol><br>
        <button type="submit" name="submit">Lähetä</button>
    </form>
    <?php endif; ?>
</div>
<br>
<div>
    <a href="poistu.php">Poistu</a>
</div>
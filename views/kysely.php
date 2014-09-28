<?php session_start(); ?>
<div>
    <form>
        <ol>
            <?php foreach($data->kysely as $kysymys) :
            if($type === 'radio') {?>
                <li><?php $kysymysId1 ?><br>
                    <input type="radio">0
                    <input type="radio">1
                    <input type="radio">2
                    <input type="radio">3
                    <input type="radio">4
                    <input type="radio">5<br>
                </li>
            <?php }
            else {?>
                <li><?php $kysymysId2 ?><br>
                    <input type="text" name="vastaus"><br>
                </li>
            <?php } 
            endforeach; ?>
        </ol><br>
        <button type="submit" name="laheta">Lähetä</button>
    </form>
</div>
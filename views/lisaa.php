<?php session_start();
 require_once 'libs/functions.php';
 require_once 'libs/models/kysymykset.php';
 
if($data2->kurssikysely == null): ?>
    <h2>Uusi kysely</h2>
<?php $uusikysely = "kylla"; 
    else: ?>
    <h2>Muokkaa kyselyä</h2>
<?php $uusikysely = "ei";
endif; 
$kurssiId = $_POST['kurssiId']; ?>
<div>
    <ol>
        <?php foreach($data2->kurssikysely as $kysymys): ?>
            <li>
                <?php echo $kysymys->getKysymys() ?><br>
                <?php if($kysymys->getMuoto() == 'radio'): ?>
                    <input type="radio">0
                    <input type="radio">1
                    <input type="radio">2
                    <input type="radio">3
                    <input type="radio">4
                    <input type="radio">5
                <?php else: ?>
                    <input type="text">
                <?php endif; ?>
                <form action="muuta.php" method="POST" style="display: inline-block">
                    <input type="hidden" name="poista" value="poista">
                    <input type="hidden" name="kurssiId" value="<?php echo $_POST['kurssiId']; ?>">
                    <input type="hidden" name="kysymysId" value="<?php echo $kysymys->getKysymysId(); ?>">
                    <input type="hidden" name="muoto" value="<?php echo $kysymys->getMuoto(); ?>">
                    <button type="submit">Poista</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ol>
    <form action="muuta.php" method="POST">
        <table>
            <tr>
                <td>
                    <select name="kysymysId">
                        <?php foreach($data->kysymyksia as $kysymys): ?>
                        <option value="<?php echo $kysymys->getKysymysId(); ?>"><?php echo $kysymys->getKysymys();?></option>
                        <?php endforeach ?>
                    </select>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="muoto" value="radio">Monivalinta
                    <input type="radio" name="muoto" value="teksti">Tekstikenttä
                </td>
                <td>
                    <input type="hidden" name="uusikysely" value="<?php echo $uusikysely; ?>">
                    <input type="hidden" name="lisaa" value="lisaa">
                    <input type="hidden" name="kurssiId" value="<?php echo $_POST['kurssiId']; ?>">
                    <button type="submit" name="submit">Lisää kysymys</button>
                </td>
            </tr>
        </table>
    </form>  
</div>
<div>
    <a href="hallinta.php">Hallinta sivulle</a>    
</div>


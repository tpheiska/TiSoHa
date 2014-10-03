<?php session_start();
 require_once 'libs/functions.php';
 require_once 'libs/models/kysymykset.php';
 
if($data2 == null): ?>
    <h2>Uusi kysely</h2>
<?php else: ?>
    <h2>Muokkaa kyselyä</h2>
<?php endif; 
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
                <form action="muuta.php" method="POST" name="poistaKysymys" style="display: inline-block">
                    <input type="hidden" name="kysymysId" value="<?php echo $kysymys->getKysymysId() ?>">
                    <button type="submit">Poista</button>
                </form>
            </li>
        <?php endforeach; ?>
        <li>
            <form action="tallenna.php" method="POST">
                <table>
                    <tr>
                        <td>
                            <select name="kysymysid">
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
                            <button type="submit" name="kurssiid" value="<?php echo $_POST['kurssiId']; ?>">Lisää kysymys</button>
                        </td>
                    </tr>
                </table>
            </form>
        </li>
    </ol>
</div>


<div>
    <?php if(!empty($data->virhe))
        echo $data->virhe; ?>
</div>
<div>
    <?php if($_GET['kurssiid'] == null)
        $kurssiid = $data2->kurssiid;
    else
        $kurssiid = $_GET['kurssiid'];
    ?>
    <form action="doCheck.php" method="POST">
        <table>
            <tr>
                <td align='right'>
                   Opiskelijanumero:
                </td>
                <td align='left'>
                    <input type="text" name="opiskelijanro">
                </td> 
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" value="<?php echo $kurssiid; ?>" name="kurssiid">
                    <button type="submit" name="submit">Tarkista</button>
                </td>
            </tr>
        </table>
    </form>
</div>
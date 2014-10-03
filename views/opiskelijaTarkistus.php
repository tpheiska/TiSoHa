<div>
    <?php echo $data->virhe; ?>
</div>
<div>
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
                    <button type="submit" name="kurssiid" value="<?php echo $_GET['kurssiid']?>">
                        Tarkista
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
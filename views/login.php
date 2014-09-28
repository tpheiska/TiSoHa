<div>
    <?php echo $data->virhe; ?>
</div>
<div>
    <form action="doLogin.php" method="POST">
        <table>
            <tr>
                <td align='right'>
                    Käyttäjätunnus:
                </td>
                <td align='left'>
                    <input type="text" name="ktunnus"/>
                </td> 
            </tr>
            <tr>
                <td align='right'>
                    Salasana:
                </td>
                <td align='left'>
                    <input type="password" name="salasana"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" value="Submit">
                        Kirjaudu
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>
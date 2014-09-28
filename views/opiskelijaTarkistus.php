<div>
    <?php echo $data->virhe; ?>
</div>
<div>
    <form action="doCheck.php" method="POST">
        Opiskelijanumero:<input type="text" name="opiskelijanumero"><br>
        <input type="hidden" name="kurssikoodi" value='<?php $_GET['kurssiid'] ?>'>
        <button type="submit" name="tarkista">
            Tarkista
        </button>
    </form>
</div>
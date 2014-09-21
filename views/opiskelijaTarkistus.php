<!DOCTYPE html>
<html>
    <head>
        <title>Tarkistus, oletko kurssilla</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form action="doLoginKysely.php" method="post">
                Opiskelijanumero:<input type="text" name="opiskelijanumero">
                <input type="hidden" name="kurssikoodi" value='$kurssikoodi'><br>
                <button type="submit" name="tarkista">
                    Tarkista
                </button>
            </form>
        </div>
    </body>
</html>

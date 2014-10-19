<?php
    if(isset($_SESSION['opiskelija'])): ?>
        <h1>Kiitos kyselyyn vastaamisesta!</h1>
        <br>
        <br>
        <?php unset($_SESSION['opiskelija']); ?>
        <a href="index.php">Etusivulle</a>
    <?php else: ?>
        <h2>Vastaaminen epäonnistui!</h2>
        <br>
        Mene kurssikyselyjen etusivulle ja yritä uudelleen.
        <br>
        <a href="index.php">Etusivulle</a>
    <?php endif; 
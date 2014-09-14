<?php
  rquire 'kirjastot/tietokantayhteys.php';
  $yhteys = getTietokantayhteys();
  $sql = "SELECT Kysymys from Kysymykset";
  $kysely = getTietokantayhteys()->prepare($sql);
  $kysely->execute();

  $Etunimi = $kysely->fetchColumn();
  echo $Etunimi;

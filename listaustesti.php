<?php
  require_once 'libs/functions.php';
  $yhteys = getTietokantayhteys();
  $sql = "SELECT KysymysId, Kysymys from Kysymykset";
  $kysely = getTietokantayhteys()->prepare($sql);
  $kysely->execute();

  foreach ($kysely->fetchAll(PDO::FETCH_COLUMN) as $kysymys) {
    echo $kysymys;
}
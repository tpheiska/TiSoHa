<?php
$yhteys = new PDO("pgsql:");
$yhteys->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sqlkysely = "SELECT 1+1 as two";
$kysely = $yhteys->prepare($sqlkysely);

if ($kysely->execute()) {
	$tulos = $kysely->fetchColumn();
	var_dump($tulos);
}


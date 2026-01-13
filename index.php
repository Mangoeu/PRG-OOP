<?php

require_once 'Ovoce.php';
require_once 'Jablko.php';
require_once 'Farma.php';

echo "<h1>Testování farmy a dědičnosti ovoce</h1>";

$mojeFarma = new Farma("Bio Farma u Lesa", "Petr Hospodář");

$jablko1 = new Jablko("červená", "Gala");
$jablko2 = new Jablko("zelená", "Granny Smith");

$jablko1->dozrat();

echo "<hr>";

$mojeFarma->uskladnitOvoce($jablko1);
$mojeFarma->uskladnitOvoce($jablko2);

echo "<hr>";


$mojeFarma->vypisZasoby();


echo "<h3>Detailní seznam ve skladu:</h3>";
foreach ($mojeFarma->skladOvoce as $polozka) {

    echo "- " . $polozka->nazev . " (Odrůda: " . $polozka->odruda . "), Barva: " . $polozka->barva . "<br>";
}
?>
<?php

include 'ovoce.php';
include 'farma.php';




$mojeFarma = new Farma("Slunečná stráň", "Oldřich Novák");


$jablko = new Ovoce("Jablko", "červená");
$hruška = new Ovoce("Hruška", "zelená");


$hruška->dozrat();


$mojeFarma->uskladnitOvoce($jablko);
$mojeFarma->uskladnitOvoce($hruška);


echo "<hr><pre>";
var_dump($mojeFarma);
echo "</pre>";
?>
<?php

require_once "../src/Truck.php";

$truck = new Truck('black', 3, 'fuel', 1000);
var_dump($truck);

$truck->forward();

var_dump($truck);

$truck->brake();

var_dump($truck);

$truck->fill(250);
echo $truck->fillingStatus() . "<br>";

$truck->fill(250);
echo $truck->fillingStatus() . "<br>";

$truck->fill(250);
echo $truck->fillingStatus() . "<br>";

$truck->fill(250);
echo $truck->fillingStatus() . "<br>";

var_dump($truck);

$justAnotherTruck = new Truck('red', 3, 'fuel', 1250);
$anotherOne = new Truck('green', 3, 'fuel', 900);
$again = new Truck('yellow', 3, 'fuel', 2200);

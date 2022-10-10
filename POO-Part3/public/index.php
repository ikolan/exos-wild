<?php

require_once __DIR__ . "/../src/PedestrianWay.php";
require_once __DIR__ . "/../src/Bicycle.php";
require_once __DIR__ . "/../src/Car.php";

$way = new PedestrianWay();
$bike = new Bicycle("red", 1);
$car = new Car("black", 5, "fuel");

$way->addVehicle($bike);
$way->addVehicle($car);

var_dump($way);

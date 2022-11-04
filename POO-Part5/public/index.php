<?php

require_once __DIR__ . "/../src/Car.php";
require_once __DIR__ . "/../src/Bike.php";

$car = new Car("pink", 5, "fuel");
var_dump($car->switchOn());
var_dump($car->switchOff());

$bike = new Bike("red", 1);
var_dump($bike->switchOn());
var_dump($bike->switchOff());
<?php

require_once "../src/Bicycle.php";
require_once "../src/Car.php";

$firstCycle = new Bicycle("Red");
$firstCar = new Car("Black", 5, "Electric");

$firstCycle->dump();

$firstCar->dump();

$firstCar->start();
$firstCar->forward();
$firstCar->forward();
$firstCar->break();

$firstCar->dump();

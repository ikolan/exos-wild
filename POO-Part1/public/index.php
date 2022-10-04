<?php

require_once "../src/Bicycle.php";
require_once "../src/Car.php";

$firstCycle = new Bicycle("Red");
$firstCar = new Car("Black", 5, "Electric");

$firstCycle->dump();
$firstCycle->forward();
$firstCycle->dump();

$firstCar->dump();
$firstCar->start();
$firstCar->forward();
$firstCar->dump();
$firstCar->break();
$firstCar->dump();

<?php

require_once __DIR__ . "/../src/Car.php";

$car = new Car("pink", 5, "fuel");

try {
    $car->start();
} catch (\Exception $e) {
    $car->setParkBreak(false);
} finally {
    echo "Ma voiture roule comme un donut";
}
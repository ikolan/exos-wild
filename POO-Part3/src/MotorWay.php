<?php

require_once __DIR__ . "/HighWay.php";
require_once __DIR__ . "/Vehicle.php";
require_once __DIR__ . "/Bicycle.php";
require_once __DIR__ . "/Skateboard.php";

final class MotorWay extends HighWay
{
    public function __construct()
    {
        parent::__construct(4, 130);
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        if (!$vehicle instanceof Bicycle && !$vehicle instanceof Skateboard) {
            $this->currentVehicles[] = $vehicle;
        }
    }
}

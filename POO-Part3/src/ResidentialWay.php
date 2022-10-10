<?php

require_once __DIR__ . "/HighWay.php";
require_once __DIR__ . "/Vehicle.php";

final class ResidentialWay extends HighWay
{
    public function __construct()
    {
        parent::__construct(2, 50);
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        $this->currentVehicles[] = $vehicle;
    }
}

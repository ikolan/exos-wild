<?php

require_once "Vehicle.php";

class Bicycle extends Vehicle
{
    public function __construct(string $color, int $nbSeats)
    {
        parent::__construct($color, $nbSeats);
        $this->nbWheels = 2;
        $this->currentSpeed = 0;
    }
}

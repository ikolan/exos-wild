<?php

require_once "Vehicle.php";
require_once "LightableInterface.php";

class Bike extends Vehicle implements LightableInterface
{
    public function switchOn(): bool
    {
        return $this->getCurrentSpeed() > 10;
    }

    public function switchOff(): bool
    {
        return false;
    }
}
<?php

require_once 'Vehicle.php';

class Car extends Vehicle
{
    public const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];

    protected string $energy;
    protected int $energyLevel;
    private bool $hasParkBreak = true;

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        $this->energy = $energy;
        $this->nbWheels = 4;
        $this->energyLevel = 100;
        $this->currentSpeed = 0;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): self
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }

        return $this;
    }

    public function start()
    {
        if ($this->hasParkBreak) throw new \Exception("Parking break is enabled");
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }

    public function setParkBreak(bool $parkBreak): void 
    {
        $this->hasParkBreak = $parkBreak;
    }
}

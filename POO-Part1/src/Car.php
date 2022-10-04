<?php

class Car
{
    private int $nbWheels = 4;
    private int $currentSpeed = 0;
    private string $color;
    private int $nbSeats;
    private string $energy;
    private int $energyLevel = 100;

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->energy = $energy;
    }

    public function forward(): void
    {
        $this->currentSpeed = $this->currentSpeed > 0 ? 50 : 0;
    }

    public function break(): void
    {
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
        }
    }

    public function start(): void
    {
        if ($this->currentSpeed === 0) {
            $this->currentSpeed++;
        }
    }

    public function dump(): void
    {
        var_dump($this);
    }

    public function getNbWheels(): int
    {
        return $this->nbWheels;
    }

    public function getCurrentSpeed(): int
    {
        return $this->currentSpeed;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getNbSeats(): int
    {
        return $this->nbSeats;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }
}

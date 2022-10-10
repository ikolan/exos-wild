<?php

require_once "Car.php";

class Truck extends Car
{
    private int $capacity;
    private int $loading = 0;

    public function __construct(string $color, int $nbSeats, string $energy, int $capacity)
    {
        parent::__construct($color, $nbSeats, $energy);
        $this->capacity = $capacity;
        $this->nbWheels = 8;
    }

    public function fillingStatus(): string
    {
        return $this->loading >= $this->capacity ? "full" : "in filling";
    }

    public function fill(int $quantity): void
    {
        $this->setLoading($this->getLoading() + $quantity);
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setLoading(int $loading): void
    {
        $this->loading = $loading >= 0 ? ($loading <= $this->capacity ? $loading : $this->capacity) : 0;
    }

    public function getLoading(): int
    {
        return $this->loading;
    }
}

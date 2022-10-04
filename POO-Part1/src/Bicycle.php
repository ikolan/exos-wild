<?php

class Bicycle
{
    private string $color;
    private int $currentSpeed = 0;
    private int $nbSeats = 1;
    private int $nbWheels = 2;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCurrentSpeed(): int
    {
        return $this->currentSpeed;
    }

    public function setCurrentSpeed(int $currentSpeed): self
    {
        $this->currentSpeed = $currentSpeed;

        return $this;
    }

    public function forward(): string
    {
        $this->currentSpeed = 15;
        return "Go !";
    }

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
            $sentence .= "Brake !!!";
        }
        $sentence .= "I'm stopped !";
        return $sentence;
    }

    public function dump()
    {
        var_dump($this);
    }
}

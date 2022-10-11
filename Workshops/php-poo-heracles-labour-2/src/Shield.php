<?php

class Shield
{
    private int $protection = 10;
    private string $image = "shield.svg";

    public function getProtection(): int
    {
        return $this->protection;
    }

    public function setProtection(int $protection): self
    {
        $this->protection = $protection;

        return $this;
    }

    public function getImage(): string
    {
        return "assets/images/$this->image";
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}

<?php

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life = self::MAX_LIFE;

    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function setLife(int $life): self
    {
        $this->life = $life > 0 ? $life : 0;

        return $this;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function damage(int $damage): int
    {
        $damage -= $this->dexterity;
        $this->setLife($this->life - ($damage < 0 ? 0 : $damage));
        return ($damage < 0 ? 0 : $damage);
    }

    public function fight(Fighter $opponent): int
    {
        return $opponent->damage(rand(1, $this->strength));
    }

    public function isAlive(): bool
    {
        return $this->life > 0;
    }
}

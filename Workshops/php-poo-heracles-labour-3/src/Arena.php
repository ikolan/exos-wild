<?php

namespace App;

use App\Hero;

class Arena
{
    private array $monsters;
    private Hero $hero;
    private int $size = 10;

    public function __construct(Hero $hero, array $monsters = [])
    {
        $this->hero = $hero;
        $this->monsters = $monsters;
    }

    /**
     * Get the value of monsters
     */
    public function getMonsters(): array
    {
        return $this->monsters;
    }

    /**
     * Set the value of monsters
     */
    public function setMonsters(array $monsters): self
    {
        $this->monsters = $monsters;

        return $this;
    }

    /**
     * Get the value of hero
     */
    public function getHero(): Hero
    {
        return $this->hero;
    }

    /**
     * Set the value of hero
     */
    public function setHero(Hero $hero): self
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * Get the value of size
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Set the value of size
     */
    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getDistance(Fighter $a, Fighter $b): float
    {
        return sqrt((($b->getX() - $a->getX()) ** 2) + (($b->getY() - $a->getY()) ** 2));
    }

    public function touchable(Fighter $attacker, Fighter $defender): bool
    {
        return true;
    }
}

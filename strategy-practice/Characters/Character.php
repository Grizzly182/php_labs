<?php

require_once __DIR__ . '/../Weapons/knife.php';
abstract class Character
{
    protected string $name;
    protected int $healthPoints;
    private IAttackable $weapon;

    public function __construct(string $name, int $healthPoints)
    {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->weapon = new Knife();
    }

    public function show(): void
    {
        echo 'HP: ' . $this->healthPoints . PHP_EOL . 'Name: ' . $this->name . PHP_EOL;
    }

    public function swapWeapon(IAttackable $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function attack(): void
    {
        $this->weapon->attack();
    }

    /**
     * @return int
     */
    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

    /**
     * @param int $healthPoints 
     * @return self
     */
    public function setHealthPoints(int $healthPoints): self
    {
        $this->healthPoints = $healthPoints;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name 
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
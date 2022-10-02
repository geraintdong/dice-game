<?php

namespace App\DiceGame;

class Player
{
    public function __construct(private int $points, private int $numberOfDices, private array $diceResults = [])
    {
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function addPoint(): void
    {
        $this->points = $this->points + 1;
    }

    public function getNumberOfDices(): int
    {
        return $this->numberOfDices;
    }

    public function addDice(): void
    {
        $this->numberOfDices = $this->numberOfDices + 1;
    }

    public function removeDice(): void
    {
        $this->numberOfDices = $this->numberOfDices - 1;
    }

    public function getDiceResults(): array
    {
        return $this->diceResults;
    }

    public function setDiceResults(array $diceResults): array
    {
        return $this->diceResults = $diceResults;
    }
}

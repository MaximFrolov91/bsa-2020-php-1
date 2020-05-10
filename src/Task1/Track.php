<?php

declare(strict_types=1);

namespace App\Task1;

class Track
{
    private $lapLength;
    private $lapsNumber;
    private $cars = [];

    public function __construct(float $lapLength, int $lapsNumber)
    {
        $this->lapLength = $lapLength;
        $this->lapsNumber = $lapsNumber;
    }

    public function getLapLength(): float
    {
        return $this->lapLength;
    }

    public function getLapsNumber(): int
    {
        return $this->lapsNumber;
    }

    public function add(Car $car): void
    {
        $this->cars[] = $car;
    }

    public function all(): array
    {
        return $this->cars;
    }

    public function run(): Car
    {
        $cars = $this->all();
        $time = [];
        foreach ($cars as $z => $car)
        {
            $id = $car->getId();
            $image = $car->getImage();
            $name = $car->getName();
            $speed = $car->getSpeed();
            $pitStopTime = $car->getPitStopTime();
            $fuelConsumption = $car->getFuelConsumption();
            $fuelTankVolume = $car->getFuelTankVolume();

            $distance = $this->lapsNumber * $this->lapLength; //distance of all race in kilometers
            $amountOfFuel = $distance / $fuelConsumption; //number of all need fuel for the race
            $numberOfRefueling = ceil($amountOfFuel / $fuelTankVolume); //
            if ($numberOfRefueling > 0) {
                $numberOfRefueling - 1;
            }
            $raceTime = ($distance * 3600) / $speed + $numberOfRefueling * $pitStopTime;

            $time[$z] = $raceTime;
        }

        return $cars[array_search(min($time), $time)];
    }
}
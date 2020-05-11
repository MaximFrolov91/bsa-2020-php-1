<?php

declare(strict_types=1);

namespace App\Task3;

use App\Task1\Car;
use App\Task1\Track;

class CarTrackHtmlPresenter
{
    public function present(Track $track): string
    {
        $cars = $track->all();
        $content = "<div class='container'>" . PHP_EOL . "<h1>Cars in the Race</h1>" . PHP_EOL;

        foreach ($cars as $car) {
            $content .= "<div class='car'>" . PHP_EOL;
            $content .= "<p><b>Id: " . $car->getId() . "</b></p>" . PHP_EOL;
            $content .= '<img src="' . $car->getImage() . '">' . PHP_EOL;
            $content .= "<p><b>Name: " . $car->getName() . "</b></p>" . PHP_EOL;
            $content .= "<p><b>Max speed: " . $car->getSpeed() . " km/h</b></p>" . PHP_EOL;
            $content .= "<p><b>PitStop time: " . $car->getPitStopTime() . " c</b></p>" . PHP_EOL;
            $content .= "<p><b>Fuel consumption: " . $car->getFuelConsumption() . "l/100km</b></p>" . PHP_EOL;
            $content .= "<p><b>Fuel tank volume: " . $car->getFuelTankVolume() . "</b></p>" . PHP_EOL;
            $content .= "</div>" . PHP_EOL;
        }
        $content .= "</div>";

        if (empty($cars)) {
            $content = "<h1>Track is empty!</h1>";
        }

        return $content;
    }
}
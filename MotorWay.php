<?php

require_once 'HighWay.php';

final class MotorWay extends HighWay
{
//////////// properties ///////////

    protected int $nbLane = 4;
    protected int $maxSpeed = 130;

//////////// constants ///////////

//////////// construct //////////////



//////////// methods //////////////

    public function addVehicle(Vehicle $newVehicle)
    {
        if ($newVehicle instanceof Car) {
            $this->currentVehicles [] = $newVehicle;
            echo "Speed limit: ". $this->maxSpeed. "km/h";
        } else {
            echo "This type of vehicle is not allowed on the higway";
        }
    }
}
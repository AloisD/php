<?php

require_once 'HighWay.php';

final class PedestrianWay extends HighWay
{
//////////// properties ///////////

protected int $nbLane = 1;
protected int $maxSpeed = 10;

//////////// constants ///////////

//////////// construct //////////////



//////////// methods //////////////

    public function addVehicle(Vehicle $newVehicle)
    {
        if ($newVehicle instanceof Bicycle) {
            $this->currentVehicles [] = $newVehicle;
            echo "Speed limit: ". $this->maxSpeed. "km/h";
        } else {
            echo "This type of vehicle is not allowed on the higway";
        }
    }
}
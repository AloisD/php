<?php

require_once 'HighWay.php';

final class ResidentialWay extends HighWay
{
//////////// properties ///////////

protected int $nbLane = 2;
protected int $maxSpeed = 50;

//////////// constants ///////////

//////////// construct //////////////



//////////// methods //////////////

    public function addVehicle(Vehicle $newVehicle)
    {
        $this->currentVehicles [] = $newVehicle;
        echo "Speed limit: ". $this->maxSpeed. "km/h";
    }
}
<?php

// Bicycle.php

require_once 'Vehicle.php';
require_once 'LightableInterface.php';

class Bicycle extends Vehicle implements LightableInterface
{
//////////// properties ///////////

    protected int $nbWheels = 2;

//////////// construct //////////////

//////////// methods //////////////

    public function switchOff(): bool
    {
        return FALSE;
    }

    public function switchOn(): bool
    {
        if (10 < $this->currentSpeed) {
            return TRUE;    
        }
        return FALSE;
    }

}
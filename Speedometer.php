<?php

class Speedometer
{
//////////// properties ///////////

    private const RATE = 0.621;

//////////// construct //////////////

//////////// methods //////////////

    public static function convertKmToMiles(float $kmDistance): float
    {
        $milesResult = $kmDistance * self::RATE;
        return $milesResult;
    }

    public static function convertMilesToKm(float $milesDistance) {
        $kmResult = $milesDistance / self::RATE;
        return $kmResult;
    }

}
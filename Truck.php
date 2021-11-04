<?php

require_once 'Car.php';

final class Truck extends Car
{
//////////// properties ///////////

    protected int $nbWheels = 6;

    private int $capacity;
    private int $load = 0;

//////////// constants ///////////

//////////// construct //////////////

public function __construct(string $color, int $nbSeats, string $energy, int $capacity)
{
    parent::__construct($color, $nbSeats, $energy);
    $this->capacity = $capacity;
}
//////////// methods //////////////

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed = $this->currentSpeed-4;
            $sentence .= "Brake !!!";
        }
        $this->currentSpeed = 0;
        $sentence .= "I'm stopped !";
        return $sentence;
    }

    public function isItFull (): string
    {
        if ($this->capacity >= $this->load) {
            return "in filling";
        } else {
            return "full";
        }
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    public function getLoad(): int
    {
        return $this->load;
    }

    public function setLoad(int $load): string
    {
        if  ($load > $this->capacity) {
            $this->load = $this->capacity;
            return "full with " . $this->capacity;
        } else {
            $this->load = $load;
            return "loaded with " . $load;
        }
    }
}
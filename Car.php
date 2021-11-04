<?php

require_once 'Vehicle.php';
require_once 'LightableInterface.php';

class Car extends Vehicle implements LightableInterface
{
//////////// properties ///////////

    protected string $energy;
    protected int $energyLevel;
    private bool $hasParkBrake = TRUE;

//////////// constants ///////////

    public const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];

//////////// construct //////////////

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        $this->setEnergy($energy);
    }

//////////// methods //////////////

    public function switchOff(): bool
    {
        return FALSE;
    }

    public function switchOn(): bool
    {
        return TRUE;
    }

    public function setParkBrake():void
    {
        $this->hasParkBrake = !$this->hasParkBrake;
    }

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed = $this->currentSpeed-2;
            $sentence .= "Brake !!!";
        }
        $this->currentSpeed = 0;
        $sentence .= "I'm stopped !";
        return $sentence;
    }

    public function start(): string
    {
        if ($this->hasParkBrake==true) {
            throw new Exception("Veuillez desserrer le frein à main <br>");
        }

        if (0 == $this->currentSpeed) {
            $this->currentSpeed = 15; 
        }
        return "Go !";
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }
}
<?php

abstract class HighWay
{
//////////// properties ///////////

    protected array $currentVehicles;
    protected int $nbLane;
    protected int $maxSpeed;
    public array $newVehicle;

//////////// construct //////////////

    public function __construct()
    {

    }

//////////// methods //////////////

    abstract function addVehicle(Vehicle $newVehicle);

    public function getCurrentVehicles(): array
    {
        return $this->currentVehicles;
    }

    public function setCurrentVehicles(array $currentVehicles): void
    {
        $this->currentVehicles = $currentVehicles;
    }

    public function getNbLane(): int
    {
        return $this->nbLane;
    }

    public function setNbLane(int $nbLane): void
    {
        $this->nbLane = $nbLane;
    }

    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(string $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }
}
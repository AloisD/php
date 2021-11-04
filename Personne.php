<?php

// Personne.php

class Personne
{
//////////// properties ///////////

    protected string $lastName = "Doe";
    protected string $firstName = "John";
    protected string $address = "Earth";
    protected string $birthday = "01/01/1901";

//////////// construct //////////////

    public function __construct(string $lastName, string $firstName, string $address, string $birthday)
    {
        $this->lastName=$lastName;
        $this->firstName=$firstName;
        $this->address=$address;
        $this->birthday=$birthday;
    }

//////////// methods //////////////

    public function getInfo(): array
    {
        $person=[$this->lastName, $this->firstName, $this->address, $this->birthday];
        return $person;
    }

    public function setAddress(string $address): void
    {
        $this->address=$address;
    }

    public function age()
    {
        $age = DateTime::createFromFormat('d/m/Y', $this->birthday)
        ->diff(new DateTime('now'))
        ->y;
        echo $this->firstName . " " . $this->lastName . " est agé·e de " . $age . " ans.";

    }

}
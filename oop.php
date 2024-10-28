<?php

// question 4
interface Ship
{
    public function getType();
    public function getCapacity();
    public function getColor();
    public function sail();
}

abstract class BaseShip implements Ship
{
    protected $name;
    protected $capacity;
    protected $color;

    public function __construct($name, $color, $capacity)
    {
        $this->name = $name;
        $this->capacity = $capacity;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function getColor()
    {
        return $this->color;
    }

    abstract public function getType();
}

class MotorBoat extends BaseShip
{
    public function getType()
    {
        return "Motor Boat";
    }

    public function sail()
    {
        $name = $this->name;
        $color = $this->color;
        $type = $this->getType();
        return "$color $name ($type) going to ocean!";
    }
}

class SailBoat extends BaseShip
{
    public function getType()
    {
        return "Sail Boat";
    }

    public function sail()
    {
        $name = $this->name;
        $color = $this->color;
        $type = $this->getType();
        return "$color $name ($type) going to ocean!";
    }
}

class Yacht extends BaseShip
{
    public function getType()
    {
        return "Yacht";
    }

    public function sail()
    {
        $name = $this->name;
        $color = $this->color;
        $type = $this->getType();
        return "$color $name ($type) going to ocean!";
    }
}

$ships = [
    new MotorBoat("Yamaha Speeder", "White", 4),
    new SailBoat("Honda Marquis", "Yellow", 10),
    new Yacht("Titanic", "Cyan", 100)
];

foreach ($ships as $ship) {
    echo $ship->getType() . ": " . $ship->getName() . " with " . $ship->getCapacity() . " seats capacity was made and ready to go. \n";
    echo $ship->sail() . "\n\n";
}

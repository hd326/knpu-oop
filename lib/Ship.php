<?php

class Ship
{
    private $name;
    private $weaponPower = 0;
    private $jediFactor = 0;
    private $strength = 0;
    private $underRepair;
    // Now ship objects are allowed to hold data on a name property
    // Arrays: have keys
    // Objects: have properties
    // Both store data
    // Once private, if we want interactivity, we need to add functions!
    public function __construct($name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    // if you have a function called __construct(), its automatically going to be called when you call your Object

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameAndSpecs($useShortFormat = false){
        if($useShortFormat) {
            return sprintf(
                '%s: %s, %s, %s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        // todo ...
        return $givenShip->strength > $this->strength;
    }

    public function setStrength($strength)
    {
        if(!is_numeric($strength)) {
            throw new Exception('Invalid strength passed '.$strength);
        }
        $this->strength = $strength;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

}

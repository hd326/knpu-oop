<?php

abstract class AbstractShip
// Once class has an abstract function, need to add abstract to it
// Enforces rule that you cannot say new AbstractShip
{
        // Protected works the same as private, except subclasses can access it
        private $id;
        private $name;
        private $weaponPower = 0;
        private $strength = 0;

        abstract public function getJediFactor();
        abstract public function getType();
        abstract public function isFunctional();

        // Force any class that extends this class to have this method
        
        // Now ship objects are allowed to hold data on a name property
        // Arrays: have keys
        // Objects: have properties
        // Both store data
        // Once private, if we want interactivity, we need to add functions!
        public function __construct($name)
        {
            $this->name = $name;

        }
    
        // if you have a function called __construct(), its automatically going to be called when you call your Object
    
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
                    $this->getJediFactor(),
                    $this->strength
                );
            } else {
                return sprintf(
                    '%s: w:%s, j:%s, s:%s',
                    $this->name,
                    $this->weaponPower,
                    $this->getJediFactor(),
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
    
        public function setWeaponPower($weaponPower)
        {
            $this->weaponPower = $weaponPower;
        }
    
        public function getWeaponPower()
        {
            return $this->weaponPower;
        }
    
        public function setId($id)
        {
            $this->id = $id;
        }
    
        public function getId()
        {
            return $this->id;
        }
    
        protected function getSecretDoorCodeToTheDeathstar()
        {
            return 'Ra1nb0ws';
        }
}
<?php

namespace Model;

class RebelShip extends AbstractShip
{
    // Inherits all stuff inside parent class
    // Extending classes is great for using code without duplication
    public function getFavoriteJedi()
    {
        $coolJedis = array('Yoda', 'Ben Kenobi');
        $key = array_rand($coolJedis);
        return $coolJedis[$key];
    }

    public function getType()
    {
        return 'Rebel';
    }
    // You can inherit methods, but you can also override them
    // A key part of this is the parent getType class is never called
    // For all RebelShip Objects it is completely replaced

    public function isFunctional()
    {
        return true;
    }

    // By having two classes, we are beginning to shape the different behaviors
    // And properties of each, while still keeping most things in common
    // And not duplicated

    public function getNameAndSpecs($useShortFormat = false){
        // Calling the method from the Parent class
        $val = parent::getNameAndSpecs($useShortFormat);
        $val .= ' (Rebel)';
        return $val;
        //if($useShortFormat) {
        //    return sprintf(
        //        '%s: %s, %s, %s (Rebel)',
        //        $this->getName(),
        //        $this->getWeaponPower(),
        //        $this->getJediFactor(),
        //        $this->getStrength()
        //    );
        //} else {
        //    return sprintf(
        //        '%s: w:%s, j:%s, s:%s (Rebel)',
        //        $this->getName(),
        //        $this->getWeaponPower(),
        //        $this->getJediFactor(),
        //        $this->getStrength()
        //    );
        //}
    }
    // Private functions and properties cannot be accessed inside of subclasses
    
    public function getJediFactor()
    {
        return rand(10,30);
    }
    // Overriding another method from the Ship parent class
    // Ship has a jediFactor property, but RebelShip doesn't need it at all
    // The point is that Ship comes with properties that we inherit but don't use at all
}
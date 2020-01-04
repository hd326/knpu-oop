<?php

namespace Model;

class ShipCollection
{
    private $ships;
    // An array of abstractships
    public function __construct(array $ships)
    {
        $this->ships = $ships;
    }

    public function removeAllBrokenShips()
    {
        foreach ($this->ships as $key => $ship) {
            if(!$ship->isFunctional()){
                unset($this->ships[$key]);
            }
        }
    }
    // Looks and acts like an array, but with the super power to have methods on it
}
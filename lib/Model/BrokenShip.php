<?php

namespace Model;

class BrokenShip extends AbstractShip
{
    
    public function getJediFactor()
    {
        return 0;
    }
    public function getType()
    {
        return 'Broken';
    }
    public function isFunctional()
    {
        return false;
    }

    // We didn't have to update any other code because BrokenShip extends AbstractShip
}
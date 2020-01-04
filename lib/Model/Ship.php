<?php
// Class Reasons
// 1) Hold data
// 2) Do work
namespace Model;

class Ship extends AbstractShip
{
    use SettableJediFactorTrait;
    //private $jediFactor = 0;
    private $underRepair;

    public function __construct($name)
    {
        parent::__construct($name);
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    //public function getJediFactor()
    //{
    //    return $this->jediFactor;
    //}
    //public function setJediFactor($jediFactor)
    //{
    //    $this->jediFactor = $jediFactor;
    //}

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    public function getType()
    {
        return 'Empire';
    }
}

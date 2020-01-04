<?php

namespace Model;

class BattleResult implements \ArrayAccess
{
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;

    public function __construct($usedJediPowers, AbstractShip $winningShip = null, AbstractShip $losingShip = null)
    {
        $this->usedJediPowers = $usedJediPowers;
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
    }

    public function getWinningShip()
    {
        return $this->winningShip;
    }

    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    public function getLosingShip()
    {
        return $this->losingShip;
    }

    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }
}
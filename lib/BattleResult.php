<?php

class BattleResult
{
    private $usedJediPowers;
    private $winningShip;
    private $losingShip;

    public function __construct($usedJediPowers, Ship $winningShip, Ship $losingShip)
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
}
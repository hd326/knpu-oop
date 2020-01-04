<?php

namespace Service;
// Namespaces exists to help avoid collisions from external libraries

use Model\BattleResult;
use Model\AbstractShip;

// Just use namespaces from the beginning

class BattleManager
{
    // Anytime have string or value that has special meaning make it a const and stay happy
    const TYPE_NORMAL = 'type_normal';
    const TYPE_NO_JEDI = 'no_jedi';
    const TYPE_ONLY_JEDI = 'only_jedi';
    /**
 * Our complex fighting algorithm!
 *
 * @return BattleResult With keys winning_ship, losing_ship & used_jedi_powers
 */

// Type hinting is for errors
public function battle(AbstractShip $ship1, $ship1Quantity, AbstractShip $ship2, $ship2Quantity, $battleType)
{
    $ship1Health = $ship1->getStrength() * $ship1Quantity;
    $ship2Health = $ship2->getStrength() * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    $i = 0;
    while ($ship1Health > 0 && $ship2Health > 0) {
        // first, see if we have a rare Jedi hero event!
        if ($battleType != BattleManager::TYPE_NO_JEDI && $this->didJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if ($battleType != BattleManager::TYPE_NO_JEDI && $this->didJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        // now battle them normally

        if ($battleType != BattleManager::TYPE_ONLY_JEDI) {
            $ship1Health = $ship1Health - ($ship2->getWeaponPower() * $ship2Quantity);
            $ship2Health = $ship2Health - ($ship1->getWeaponPower() * $ship1Quantity);
        }

        if ($i == 100) {
            $ship1Health = 0;
            $ship2Health = 0;
        }
        $i++;  
    }

    $ship1->setStrength($ship1Health);
    $ship2->setStrength($ship2Health);
    //var_dump($ship1->getStrength(), $ship2->getStrength()); die;

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        // they destroyed each other
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return new BattleResult($usedJediPowers, $winningShip, $losingShip);

    return array(
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    );
}

public static function getAllBattleTypesWithDescription()
{
    // Making methods statics makes it Global
    return array(
        self::TYPE_NORMAL => 'Normal',
        self::TYPE_NO_JEDI => 'No Jedi Powers',
        self::TYPE_ONLY_JEDI => 'Only Jedi Powers'
    );
}
// When it's private, it's only accessible inside the class
// If not, it can be used elsewhere and may break something
private function didJediDestroyShipUsingTheForce(AbstractShip $ship)
{
    $jediHeroProbability = $ship->getJediFactor() / 100;

    return mt_rand(1, 100) <= ($jediHeroProbability*100);
}
}
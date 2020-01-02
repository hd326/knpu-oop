<?php

class ShipLoader
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getShips()
    {
        
        $shipsData = $this->queryForShips();

        foreach($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }
        
        //$ships = array();
        //
        //$ship = new Ship('Jedi Starfighter');
        //$ship->setWeaponPower(5);
        //$ship->setJediFactor(15);
        //$ship->setStrength(30);
        //
        //$ships['starfighter'] = $ship;
        //
        //$ship2 = new Ship('CloakShape Fighter');
        //$ship2->setWeaponPower(2);
        //$ship2->setJediFactor(2);
        //$ship2->setStrength(70);
        //$ships['cloakshape_fighter'] = $ship2;
         //
        //$ship3 = new Ship('Super Star Destroyer');
        //$ship3->setWeaponPower(70);
        //$ship3->setJediFactor(0);
        //$ship3->setStrength(500);
        //
        //$ships['super_star_destroyer'] = $ship3;
        //
        //$ship4 = new Ship('RZ-1 A-wing interceptor');
        //$ship4->setWeaponPower(4);
        //$ship4->setJediFactor(4);
        //$ship4->setStrength(50);
        //$ships['rz1_a_wing_interceptor'] = $ship4;
        
        
        return $ships;
        
        /*
        return array(
            'starfighter' => array(
                'name' => 'Jedi Starfighter',
                'weapon_power' => 5,
                'jedi_factor' => 15,
                'strength' => 30,
            ),
            'cloakshape_fighter' => array(
                'name' => 'CloakShape Fighter',
                'weapon_power' => 2,
                'jedi_factor' => 2,
                'strength' => 70,
            ),
            'super_star_destroyer' => array(
                'name' => 'Super Star Destroyer',
                'weapon_power' => 70,
                'jedi_factor' => 0,
                'strength' => 500,
            ),
            'rz1_a_wing_interceptor' => array(
                'name' => 'RZ-1 A-wing interceptor',
                'weapon_power' => 4,
                'jedi_factor' => 4,
                'strength' => 50,
            ),
            
        );
        */
        }

    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement= $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$shipArray) {
            return null;
        }

        return $this->createShipFromData($shipArray);
    }

    public function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']); 
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);
        return $ship;
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement= $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $shipsArray;
    }
    // This is a service class, does work for us, and has a property
    // Used to store options about how a class should work
    // Or useful objects that the class needs
    private function getPDO()
    {
        return $this->pdo;
    }
    // If a service class like ShipLoader needs information, like a database password
    // We need to pass that information to ShipLoader, instead of expecting it to use a global keyword
    // Or some other method to find it on it's own

    // Rule: don't put configuration inside of a service class
    // Instead, use an argument
    // This is called Dependency Injection

    // Don't: include configuration or create new service objects in a service
    // Even though the PDO class comes from PHP, it IS a service class, it does work,
    // If we create a service object from within a class, we can't easily share it or control it,

    // Instead: create all service objects in once place, and then pass them into each other
}
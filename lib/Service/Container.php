<?php

class Container
{
    private $configuration;

    private $pdo;

    private $shipLoader;

    private $battleManager;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getPDO()
    {
        if($this->pdo === null){
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    public function getShipLoader()
    {
        if($this->shipLoader === null) {
            $this->shipLoader = new ShipLoader($this->getPDO());
        }

        return $this->shipLoader;
    }

    public function getBattleManager()
    {
        if($this->battleManager === null) {
            $this->battleManager = new BattleManager();
        }

        return $this->battleManager;
    }

    // This is awesome, every service object we have
    // Meaning every object that does work,
    // Like BattleManager, PDO, and Shiploader, is created
    // By the Container class, this is it's only job

    // Before in index.php, we created all of our objects
    // So if we had 50 different useful service objects,
    // We'd create them all in the index (wasteful)
    // With the container idea, we never create them until they are needed
    // This is called the dependency injection container
    // A Special class, and we always have just one
    // Only job is to create service objects


}
<?php

namespace Service;

class JsonFileShipStorage implements ShipStorageInterface
// When we extend the PdoShipStorage,
// This makes the JSON file and instance of PdoShipStorage
// When we do this, we are actually overriding methods, however
// However when we extend an AbstractShipStorage, it just cares that the method is used
// All AbstractShipStorage has is a contract that guarantees
// Anything that extends this has the two functions

// It turns out when we have an abstract class that only has abstract functions
// It's the perfect opportunity for an interface
{
    private $filename;

    public function __construct($jsonFilePath)
    {
        $this->filename = $jsonFilePath;
    }

    public function fetchAllShipsData()
    {
        $jsonContents = file_get_contents($this->filename);

        return json_decode($jsonContents, true);
    }

    public function fetchSingleShipData($id)
    {
        $ships = $this->fetchAllShipsData();

        foreach ($ships as $ship) {
            if ($ship['id'] == $id) {
                return $ship;
            }
        }
        return null;
    }
}

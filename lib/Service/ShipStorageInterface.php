<?php

namespace Service;

interface ShipStorageInterface
{
    public function fetchAllShipsData();
    public function fetchSingleShipData($id);
}

// Acts just like an abstract class
// Allows to make code generic, since we are not required a concrete class
// Just an interface

// Why does Inheritance exist?
// In PHP, you can only extend one base class, but you can implement many interfaces
// They become directions on what all ShipStorage objects must look like


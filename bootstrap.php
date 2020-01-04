<?php

//require_once __DIR__.'/lib/Model/AbstractShip.php';
//require_once __DIR__.'/lib/Model/Ship.php';
//require_once __DIR__.'/lib/Model/RebelShip.php';
//require_once __DIR__.'/lib/Model/BrokenShip.php';
//require_once __DIR__.'/lib/Service/BattleManager.php';
//require_once __DIR__.'/lib/Service/ShipStorageInterface.php';
//require_once __DIR__.'/lib/Service/PdoShipStorage.php';
//require_once __DIR__.'/lib/Service/JsonFileShipStorage.php';
//require_once __DIR__.'/lib/Service/ShipLoader.php';
//require_once __DIR__.'/lib/Model/BattleResult.php';
//require_once __DIR__.'/lib/Service/Container.php';

// Idea of naming Classes and Files in the way is called PSR-0
// by PHP-FIG = UN of PHP
// Thou shalt call your Class names the same as your files names.php
// And your directory structure will match your namespaces
// Composer helps us do this
// Composer comes with another super power: autoloading
// Composer.phar is a PHP executable
// Composer.json to do autoloading
// PSR-4 is a slight amendment to PSR-0 but 
// Tells composer that we want to use the PSR-0 convention
// And it should look for all classes in the lib directory

require __DIR__.'/vendor/autoload.php';

//spl_autoload_register(function($className){
//     $path = __DIR__.'/lib/'.str_replace('\\', '/', $className).'.php';
//     if(file_exists($path)) {
//         require $path;
//     }
//});

$configuration = array(
    'db_dsn' => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => '',
);






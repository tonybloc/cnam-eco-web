<?php

// Installation and configuration of doctrine 2
// https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/configuration.html


// Imports from composer - Autoloader
require_once __DIR__ . "/../vendor/autoload.php";


// Doctrine ORM - Tools
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
use Slim\Container;


// Configuration of database's connection
$configuration = require_once __DIR__ .'/../config/settings.php';


// Current Slim Container
$container = new \Slim\Container($configuration);


// Define 'EntityManager' slim container
$container[EntityManager::class] = function ($container) : EntityManager {
    
    // Define YAML Configuration
    $config = Setup::createYAMLMetadataConfiguration(
        $container['settings']['doctrine']['metadata_dirs'], 
        $container['settings']['doctrine']['dev_mode']
    );

    //$config->addEntityNamespace("", "app/models/doctrine");
    
    // Define cache directory
    $config->setMetadataCacheImpl(new FilesystemCache($container['settings']['doctrine']['cache_dir']));

    return EntityManager::create($container['settings']['doctrine']['connection'], $config );
};

return $container;

?>
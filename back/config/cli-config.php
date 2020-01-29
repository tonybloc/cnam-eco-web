<?php

// Doctrine Tools - Console
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Slim\Container;

// Import bootstrap file
require_once __DIR__ . '/../bootstrap/bootstrap.php';

return ConsoleRunner::createHelperSet($container[EntityManager::class]);

// Generate Yaml : 
// vendor/bin/doctrine orm:convert-mapping --namespace="app/models/doctrine" --force --from-database yml config/yaml

// Generate Entity :
// vendor/bin/doctrine orm:generate-entities --generate-annotations=false --update-entities=true --generate-methods=false app/models/doctrine

// Clear cache
// vendor/bin/doctrine orm:clear-cache:metadata

// refresh namesapces
// composer dump-autoload -o



?>
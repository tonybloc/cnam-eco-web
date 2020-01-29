<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;
use \App\Controllers;
use Doctrine\ORM\EntityManager;
use \Slim\App;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap/bootstrap.php';



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');



/* JWT secure token */

const JWT_SECRET = "ANM_JWT_SECRET_4231";

$jwt = new \Slim\Middleware\JwtAuthentication([
    "path" => "/api",
    "secure" => false,
    "passthrough" => [
        "/api/auth/signin", 
        "/api/auth/signup", 
        "/api/products", 
        "/api/products/details/{reference}",
        "/api/brands",
        "/api/categories",
        "/api/subcategories"
    ],
    "secret" => JWT_SECRET,    
    "attribute" => "decoded_jwt_token",
    "algorithm" => ["HS256"],
    "error" => function($response, $args) {
        $data = array('error' => '418', 'message' => 'Invalide JWT Token');
        return $response->withHeader("Content-type", "application/json")->getBody()->write(json_encode($data));        
    }
]);


// Container provided by 'boostrap.php' file
// Create slim application
$app = new \Slim\App($container);  

// JWT middelware
$app->add($jwt);


// Credential Json Web Token for Controller
$CredentialJWT = JWT_SECRET;

// User controller
$container[AccountController::class] = function ($container) {
    return new \App\Controllers\AccountController($container[EntityManager::class]);
};

// Product controller
$container[ProductController::class] = function ($container) {
    return new \App\Controllers\ProductController($container[EntityManager::class]);
};

// Product controller
$container[BrandController::class] = function ($container) {
    return new \App\Controllers\BrandController($container[EntityManager::class]);
};

// Product controller
$container[CategoryController::class] = function ($container) {
    return new \App\Controllers\CategoryController($container[EntityManager::class]);
};

require __DIR__ . '/app/routes.php';


$app->run();

?>
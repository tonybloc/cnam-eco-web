<?php

namespace App\Controllers;

use \Firebase\JWT\JWT;
use Doctrine\ORM\EntityManager;
use App\Models\Doctrine;


class CategoryController 
{
    /* Attributes */
    private $em;
    private $jwtCredential;

    /**
     * Create new instance of Category controller
     * @param EntityManager $container : doctrine entity manager
     */
    public function __construct(EntityManager $container) {
        $this->em = $container;
        $this->jwtCredential = "ANM_JWT_SECRET_4231";
    }
    
    /**
     * Get list of category
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : null
     * @return string (json)
     */
    public function GetCategories($request, $response, $args) {

        // get all categories
        $categoryRepository = $this->em->getRepository(\App\Models\Doctrine\ProductCategoryTab::class);
        $categories = $categoryRepository->findAll();

        if($categories)
        {
            $array = [];

            // Mergs liste of categories' information
            foreach($categories as $c) {
                array_push($array, $c->jsonSerialize());
            }
    
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($array, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
        }        

        // Bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("error"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));       
    }


    /**
     * Get list of category
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : null
     * @return string (json)
     */
    public function GetSubCategories($request, $response, $args) {

        // get all categories
        $subcategoryRepository = $this->em->getRepository(\App\Models\Doctrine\ProductSubCategoryTab::class);
        $subcategories = $subcategoryRepository->findAll();

        if($subcategories)
        {
            $array = [];

            // Mergs liste of categories' information
            foreach($subcategories as $c) {
                array_push($array, $c->jsonSerialize());
            }
    
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($array, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
        }        

        // Bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("error"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }
}

?>
<?php

namespace App\Controllers;

use \Firebase\JWT\JWT;
use Doctrine\ORM\EntityManager;
use App\Models\Doctrine;


class ProductController 
{
    /* Attributes */
    private $em;
    private $jwtCredential;

    /**
     * Create new instance of Product controller
     * @param EntityManager $container : doctrine entity manager
     */
    public function __construct(EntityManager $container) {
        $this->em = $container;
        $this->jwtCredential = "ANM_JWT_SECRET_4231";
    }
    
    /**
     * Get list of products
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : null
     * @return string (json)
     */
    public function GetProducts($request, $response, $args) {

        // get all products
        $productRepository = $this->em->getRepository(\App\Models\Doctrine\ProductTab::class);
        $products = $productRepository->findAll();

        if($products)
        {
            $array = [];

            // Mergs liste of product's information
            foreach($products as $p) {
                array_push($array, $p->jsonSerialize());
            }

            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($array, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
        }        

        // Bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("error" => "Bad Request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));        
    }
    
    /**
     * Get products details
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : product id
     * @return string (json)
     */
    public function GetProductDetails($request, $response, $args) {

        $reference = $args['reference'];

        if ( isset($reference) ) {            
            
            // define doctrine repository
            $productDetailRepository = $this->em->getRepository(\App\Models\Doctrine\WatchDetailTab::class);
            $productRepository = $this->em->getRepository(\App\Models\Doctrine\ProductTab::class);

            // get product informations
            $product = $productRepository->findOneBy(array('code' => $reference));

            if($product)
            {
                // get details informations of product
                $detail = $productDetailRepository->findOneBy(array('code' => $product));

                if($detail) 
                {  
                    // return product's details info
                    return $response->withStatus(200)
                        ->withHeader("Content-Type", "application/json")
                        ->write(json_encode($detail->jsonSerialize(), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
                }
            }

            // ressource not found
            return $response->withStatus(204)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode(array("error"=>"No Content"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
        }

        // Bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("error"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));
    }

    /**
     * Delete product by id
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : product id
     * @return null
     */
    public function DeleteProductById($request, $response, $args) {

        // not implemented
        
        return $response->withStatus(401)->write("Unauthorized");
    }  

    /**
     * Update specifique product
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : product id
     * @return null
     */
    public function UpdateProductById($request, $response, $args) {

        // not implemented

        return $response->withStatus(401)->write("Unauthorized");
    }
}

?>
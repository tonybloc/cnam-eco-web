<?php

namespace App\Controllers;

use \Firebase\JWT\JWT;
use Doctrine\ORM\EntityManager;
use App\Models\Doctrine;


class BrandController 
{
    /* Attributes */
    private $em;
    private $jwtCredential;

    /**
     * Create new instance of brand controller
     * @param EntityManager $container : doctrine entity manager
     */
    public function __construct(EntityManager $container) {
        $this->em = $container;
        $this->jwtCredential = "ANM_JWT_SECRET_4231";
    }
    
    /**
     * Get list of brand
     * @param mixed $request : slim request
     * @param mixed $response : slim response
     * @param mixed $args : null
     * @return string (json)
     */
    public function GetBrands($request, $response, $args) {

        // get all brands
        $brandRepository = $this->em->getRepository(\App\Models\Doctrine\BrandTab::class);
        $brands = $brandRepository->findAll();

        if($brands)
        {
            $array = [];

            // Mergs liste of brand's information
            foreach($brands as $b) {
                array_push($array, $b->jsonSerialize());
            }
    
            return $response->withStatus(200)
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($array), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE);
        }        

        // Bad request
        return $response->withStatus(400)
            ->withHeader("Content-Type", "application/json")
            ->write(json_encode(array("error"=>"Bad request"), JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE));       
    }
}

?>
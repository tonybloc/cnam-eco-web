<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategoryTab
 *
 * @ORM\Table(name="product_category_tab")
 * @ORM\Entity
 */
class ProductCategoryTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code", type="integer", options={"unsigned"=true,"comment"="Code de la cat�gorie"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=128, nullable=false, options={"comment"="Nom de la cat�gorie"})
     */
    private $name;


    /**
     * Get code.
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return \App\Models\Doctrine\ProductCategoryTab
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'code' => $this->code,
            'name' => $this->name
        );  
    }
}

<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductSubcategoryTab
 *
 * @ORM\Table(name="product_subcategory_tab", indexes={@ORM\Index(name="FK_CATEGORY_SUBCATEGORY", columns={"ParentGroupCode"})})
 * @ORM\Entity
 */
class ProductSubcategoryTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code", type="integer", options={"unsigned"=true,"comment"="Code sous cat�gorie"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=128, nullable=false, options={"comment"="Nom de la sous cat�gorie"})
     */
    private $name;

    /**
     * @var \App\Models\Doctrine\ProductCategoryTab
     *
     * @ORM\ManyToOne(targetEntity="\App\Models\Doctrine\ProductCategoryTab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ParentGroupCode", referencedColumnName="Code")
     * })
     */
    private $parentgroupcode;


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
     * @return \App\Models\Doctrine\ProductSubcategoryTab
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
     * Set parentgroupcode.
     *
     * @param \App\Models\Doctrine\ProductCategoryTab|null $parentgroupcode
     *
     * @return \App\Models\Doctrine\ProductSubcategoryTab
     */
    public function setParentgroupcode(\App\Models\Doctrine\ProductCategoryTab $parentgroupcode = null)
    {
        $this->parentgroupcode = $parentgroupcode;

        return $this;
    }

    /**
     * Get parentgroupcode.
     *
     * @return \App\Models\Doctrine\ProductCategoryTab|null
     */
    public function getParentgroupcode()
    {
        return $this->parentgroupcode;
    }

    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'code' => $this->code,
            'name' => $this->name,
            'parentgroupcode' => $this->parentgroupcode->jsonSerialize()
        );  
    }
}

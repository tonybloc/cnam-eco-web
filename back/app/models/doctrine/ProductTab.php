<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductTab
 *
 * @ORM\Table(name="product_tab", indexes={@ORM\Index(name="FK_PRODUCT_SUBCATEGORY", columns={"CodeSubCategory"}), @ORM\Index(name="FK_PRODUCT_BRAND", columns={"BrandNo"})})
 * @ORM\Entity
 */
class ProductTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code", type="integer", options={"unsigned"=true,"comment"="Code produit"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Reference", type="string", length=32, nullable=false, options={"comment"="R�f�rence fournisseur"})
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=128, nullable=false, options={"comment"="Intitiul�"})
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=true, options={"comment"="Description"})
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="UnitPrice", type="float", precision=10, scale=0, nullable=false, options={"comment"="Prix de vente (unitaire)"})
     */
    private $unitprice;

    /**
     * @var string
     *
     * @ORM\Column(name="Picture", type="text", lenght=65535, nullable=false, options={"comment"="Image"})
     */
    private $picture;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Gender", type="string", length=255, nullable=false, options={"comment"="Genre"})
     */
    private $gender;

    /**
     * @var \App\Models\Doctrine\BrandTab
     *
     * @ORM\ManyToOne(targetEntity="\App\Models\Doctrine\BrandTab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="BrandNo", referencedColumnName="No")
     * })
     */
    private $brandno;

    /**
     * @var \App\Models\Doctrine\ProductSubcategoryTab
     *
     * @ORM\ManyToOne(targetEntity="\App\Models\Doctrine\ProductSubcategoryTab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSubCategory", referencedColumnName="Code")
     * })
     */
    private $codesubcategory;   


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
     * Set reference.
     *
     * @param string $reference
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set unitprice.
     *
     * @param float $unitprice
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;

        return $this;
    }

    /**
     * Get unitprice.
     *
     * @return float
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Set brandno.
     *
     * @param \App\Models\Doctrine\BrandTab|null $brandno
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setBrandno(\App\Models\Doctrine\BrandTab $brandno = null)
    {
        $this->brandno = $brandno;

        return $this;
    }

    /**
     * Get brandno.
     *
     * @return \App\Models\Doctrine\BrandTab|null
     */
    public function getBrandno()
    {
        return $this->brandno;
    }

    /**
     * Set codesubcategory.
     *
     * @param \App\Models\Doctrine\ProductSubcategoryTab|null $codesubcategory
     *
     * @return ProductTab
     */
    public function setCodesubcategory(\App\Models\Doctrine\ProductSubcategoryTab $codesubcategory = null)
    {
        $this->codesubcategory = $codesubcategory;

        return $this;
    }

    /**
     * Get codesubcategory.
     *
     * @return \App\Models\Doctrine\ProductSubcategoryTab|null
     */
    public function getCodesubcategory()
    {
        return $this->codesubcategory;
    }

    /**
     * Set picture
     * 
     * @param string $picture
     * 
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     * 
     * @return string
     */
    public function getPicture() 
    {
        return $this->picture;
    }

    /**
     * Set gender.
     *
     * @param string|null $gender
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function setGender($gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender.
     *
     * @return string|null
     */
    public function getGender()
    {
        return $this->gender;
    }


    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'code' => $this->code,
            'reference' => $this->reference,
            'title' => $this->title,
            'description' => $this->description,
            'unitprice' => $this->unitprice,
            'brand' => $this->brandno->jsonSerialize(),
            'subcategory' => $this->codesubcategory->jsonSerialize(),
            'picture' => $this->picture,
            'genre' => $this->gender
        );  
    }

    
}

<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * BrandTab
 *
 * @ORM\Table(name="brand_tab")
 * @ORM\Entity
 */
class BrandTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="No", type="integer", options={"unsigned"=true,"comment"="Identifiant de la marque"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $no;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=128, nullable=false, options={"comment"="Nom de la marque"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false, options={"comment"="Description de la marque"})
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Logo", type="text", lenght=65535, nullable=false, options={"comment"="Logo"})
     */
    private $logo;


    /**
     * Get no.
     *
     * @return int
     */
    public function getNo()
    {
        return $this->no;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return \App\Models\Doctrine\BrandTab
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
     * Set description.
     *
     * @param string $description
     *
     * @return \App\Models\Doctrine\BrandTab
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set logo
     * 
     * @param string $logo
     * 
     * @return \App\Models\Doctrine\BrandTab
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     * 
     * @return string
     */
    public function getLogo() 
    {
        return $this->logo;
    }

    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'no' => $this->no,
            'name' => $this->name,
            'description' => $this->description,
            'logo' => $this->logo
        );  
    }

}

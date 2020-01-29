<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleTab
 *
 * @ORM\Table(name="role_tab")
 * @ORM\Entity
 */
class RoleTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="Code", type="integer", options={"unsigned"=true,"comment"="Identifiant du r�le"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255, nullable=false, options={"comment"="Intitul� du r�le"})
     */
    private $title;


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
     * Set title.
     *
     * @param string $title
     *
     * @return \App\Models\Doctrine\RoleTab
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
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'code' => $this->code,
            'title' => $this->title,
        );  
    }

    
}

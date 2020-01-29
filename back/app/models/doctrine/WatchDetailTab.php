<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * WatchDetailTab
 *
 * @ORM\Table(name="watch_detail_tab")
 * @ORM\Entity
 */
class WatchDetailTab
{
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false, options={"comment"="Description fournisseur"})
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Box", type="string", length=255, nullable=true, options={"comment"="Boitier"})
     */
    private $box;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lugs", type="string", length=255, nullable=true)
     */
    private $lugs;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Crown", type="string", length=255, nullable=true, options={"comment"="Courrone"})
     */
    private $crown;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Strap", type="string", length=255, nullable=true, options={"comment"="Bracelet"})
     */
    private $strap;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hands", type="string", length=255, nullable=true, options={"comment"="Aiguille"})
     */
    private $hands;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Bezel", type="string", length=255, nullable=true)
     */
    private $bezel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Crystal", type="string", length=255, nullable=true)
     */
    private $crystal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Dial", type="string", length=255, nullable=true)
     */
    private $dial;
    

    /**
     * @var \ProductTab
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Models\Doctrine\ProductTab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code", referencedColumnName="Code")
     * })
     */
    private $code;


    /**
     * Set description.
     *
     * @param string $description
     *
     * @return \App\Models\Doctrine\WatchDetailTab
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
     * Set box.
     *
     * @param string|null $box
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setBox($box = null)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Get box.
     *
     * @return string|null
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * Set lugs.
     *
     * @param string|null $lugs
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setLugs($lugs = null)
    {
        $this->lugs = $lugs;

        return $this;
    }

    /**
     * Get lugs.
     *
     * @return string|null
     */
    public function getLugs()
    {
        return $this->lugs;
    }

    /**
     * Set crown.
     *
     * @param string|null $crown
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setCrown($crown = null)
    {
        $this->crown = $crown;

        return $this;
    }

    /**
     * Get crown.
     *
     * @return string|null
     */
    public function getCrown()
    {
        return $this->crown;
    }

    /**
     * Set strap.
     *
     * @param string|null $strap
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setStrap($strap = null)
    {
        $this->strap = $strap;

        return $this;
    }

    /**
     * Get strap.
     *
     * @return string|null
     */
    public function getStrap()
    {
        return $this->strap;
    }

    /**
     * Set hands.
     *
     * @param string|null $hands
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setHands($hands = null)
    {
        $this->hands = $hands;

        return $this;
    }

    /**
     * Get hands.
     *
     * @return string|null
     */
    public function getHands()
    {
        return $this->hands;
    }

    /**
     * Set bezel.
     *
     * @param string|null $bezel
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setBezel($bezel = null)
    {
        $this->bezel = $bezel;

        return $this;
    }

    /**
     * Get bezel.
     *
     * @return string|null
     */
    public function getBezel()
    {
        return $this->bezel;
    }

    /**
     * Set crystal.
     *
     * @param string|null $crystal
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setCrystal($crystal = null)
    {
        $this->crystal = $crystal;

        return $this;
    }

    /**
     * Get crystal.
     *
     * @return string|null
     */
    public function getCrystal()
    {
        return $this->crystal;
    }

    /**
     * Set dial.
     *
     * @param string|null $dial
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setDial($dial = null)
    {
        $this->dial = $dial;

        return $this;
    }

    /**
     * Get dial.
     *
     * @return string|null
     */
    public function getDial()
    {
        return $this->dial;
    }
    
    /**
     * Set code.
     *
     * @param \ProductTab $code
     *
     * @return \App\Models\Doctrine\WatchDetailTab
     */
    public function setCode(\App\Models\Doctrine\ProductTab $code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return \App\Models\Doctrine\ProductTab
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'product' => $this->code->jsonSerialize(),
            'description' => $this->description,
            'box' => $this->box,
            'lugs' => $this->lugs,
            'crown' => $this->crown,
            'strap' => $this->strap,
            'hands' => $this->hands,
            'bezel' => $this->bezel,
            'crystal' => $this->crystal,
            'dial' => $this->dial
        );  
    }
}

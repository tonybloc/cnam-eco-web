<?php

namespace App\Models\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTab
 *
 * @ORM\Table(name="user_tab", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_EMAIL", columns={"Email"})}, indexes={@ORM\Index(name="FK_USER_ROLE", columns={"RoleId"})})
 * @ORM\Entity
 */
class UserTab
{
    /**
     * @var int
     *
     * @ORM\Column(name="UserId", type="integer", options={"unsigned"=true,"comment"="Identifiant"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=92, nullable=false, options={"comment"="Pr�nom"})
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=92, nullable=false, options={"comment"="Nom"})
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=false, options={"comment"="Mot de passe"})
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=64, nullable=false, options={"comment"="Adresse mail"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=32, nullable=false, options={"comment"="Num�ro de t�l�phone"})
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StreetNo", type="string", length=32, nullable=true, options={"comment"="Num�ro de rue"})
     */
    private $streetno;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StreetName", type="string", length=64, nullable=true, options={"comment"="Nom de rue"})
     */
    private $streetname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="City", type="string", length=64, nullable=true, options={"comment"="Ville"})
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PostalCode", type="string", length=16, nullable=true, options={"comment"="Code postal"})
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Country", type="string", length=64, nullable=true, options={"comment"="Pays"})
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Genre", type="string", length=64, nullable=true)
     */
    private $gender;

    /**
     * @var \App\Models\Doctrine\RoleTab
     *
     * @ORM\ManyToOne(targetEntity="\App\Models\Doctrine\RoleTab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RoleId", referencedColumnName="Code")
     * })
     */
    private $roleid;


    /**
     * Get userid.
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone.
     *
     * @param string $phone
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set streetno.
     *
     * @param string|null $streetno
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setStreetno($streetno = null)
    {
        $this->streetno = $streetno;

        return $this;
    }

    /**
     * Get streetno.
     *
     * @return string|null
     */
    public function getStreetno()
    {
        return $this->streetno;
    }

    /**
     * Set streetname.
     *
     * @param string|null $streetname
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setStreetname($streetname = null)
    {
        $this->streetname = $streetname;

        return $this;
    }

    /**
     * Get streetname.
     *
     * @return string|null
     */
    public function getStreetname()
    {
        return $this->streetname;
    }

    /**
     * Set city.
     *
     * @param string|null $city
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setCity($city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalcode.
     *
     * @param string|null $postalcode
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setPostalcode($postalcode = null)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode.
     *
     * @return string|null
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set country.
     *
     * @param string|null $country
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

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
     * Set gender.
     *
     * @param string|null $gender
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setGender($gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set roleid.
     *
     * @param \App\Models\Doctrine\RoleTab|null $roleid
     *
     * @return \App\Models\Doctrine\UserTab
     */
    public function setRoleid(\App\Models\Doctrine\RoleTab $roleid = null)
    {
        $this->roleid = $roleid;

        return $this;
    }

    /**
     * Get roleid.
     *
     * @return \App\Models\Doctrine\RoleTab|null
     */
    public function getRoleid()
    {
        return $this->roleid;
    }

    /**
     * Serialize entity to json
     * @return Array
     */
    public function jsonSerialize() {  
        return array(
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'streetno' => $this->streetno,
            'streetname' => $this->streetname,
            'city' => $this->city,
            'postalcode' => $this->postalcode,
            'country' => $this->country,
            'gender' => $this->gender,
            'role' => $this->roleid->getTitle()
        );  
    }
    
}

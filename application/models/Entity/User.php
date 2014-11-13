<?php

namespace Entity;

class UserException extends \Exception {}

class User {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var string $email
     */
    protected $email;
    /**
     * @var string $password
     */
    protected $password;
    /**
     * @var string $firstname
     */
    protected $firstname;
    /**
     * @var string $lastname
     */
    protected $lastname;
    /**
     * @var string $address
     */
    protected $address;
    /**
     * @var string $zip
     */
    protected $zip;
    /**
     * @var string $place
     */
    protected $place;
    /**
     * @var integer $country
     */
    protected $country;

    public function __construct() {
        $this->firstname = '';
        $this->lastname  = '';
        $this->address   = '';
        $this->zip       = '';
        $this->place     = '';
        $this->country   = 0;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param int $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }
}

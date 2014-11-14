<?php

namespace Entity;

/**
 * Class CountryException
 * @package Entity
 */
class CountryException extends \Exception {}

/**
 * Class Country
 * @package Entity
 */
class Country {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var string $countryCode
     */
    protected $countryCode;
    /**
     * @var string $countryName
     */
    protected $countryName;

    public function __construct()
    {

    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
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
}

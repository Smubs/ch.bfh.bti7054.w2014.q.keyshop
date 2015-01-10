<?php

namespace Entity;

/**
 * Class CategoryException
 * @package Entity
 */
class CategoryException extends \Exception {}

/**
 * Class Category
 * @package Entity
 */
class Category {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var string $description
     */
    protected $description;
    /**
     * @var string $cssClass
     */
    protected $cssClass;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Product[] $products
     */
    protected $products;

    public function __construct()
    {
        $this->description = '';
    }

    /**
     * @param string $cssClass
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Entity\Product[] $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Entity\Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}

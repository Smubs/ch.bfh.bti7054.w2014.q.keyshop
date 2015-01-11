<?php

namespace Entity;

/**
 * Class ProductException
 * @package Entity
 */
class ProductException extends \Exception {}

/**
 * Class Product
 * @package Entity
 */
class Product {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var boolean $status
     */
    protected $status;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var string $description
     */
    protected $description;
    /**
     * @var double $price
     */
    protected $price;
    /**
     * @var double $discountPrice
     */
    protected $discountPrice;
    /**
     * @var string $picture
     */
    protected $picture;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Key[] $keys
     */
    protected $keys;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Category[] $categories
     */
    protected $categories;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Order[] $orders
     */
    protected $orders;

    public function __construct()
    {

    }

    public function removePicture()
    {
        $picture = $this->getPicture();
        if (!empty($picture)) {
            @unlink('assets/images/products/' . $picture);
        }
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Entity\Category[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Entity\Category[]
     */
    public function getCategories()
    {
        return $this->categories;
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
     * @param float $discountPrice
     */
    public function setDiscountPrice($discountPrice)
    {
        $this->discountPrice = floatval($discountPrice);
    }

    /**
     * @return float
     */
    public function getDiscountPrice()
    {
        return $this->discountPrice;
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
     * @param \Doctrine\Common\Collections\ArrayCollection|\Entity\Key[] $keys
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Entity\Key[]
     */
    public function getKeys()
    {
        return $this->keys;
    }

    public function getAvailableKeys()
    {
        $keys = $this->getKeys()->toArray();
        $availableKeys = array();
        foreach ($keys as $key) {
            if (!$key->getOrder()) {
                $availableKeys[] = $key;
            }
        }
        return $availableKeys;
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
     * @param \Doctrine\Common\Collections\ArrayCollection|\Entity\Order[] $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Entity\Order[]
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = floatval($price);
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getRealPrice() {
        $price = $this->getPrice();
        if ($this->getDiscountPrice() > 0) {
            $price = $this->getDiscountPrice();
        }
        return $price;
    }

    public function getHomeArray()
    {
        $categories = array();
        foreach ($this->getCategories() as $category) {
            $categories[] = $category->getName();
        }

        $saved = $this->getPrice()-$this->getDiscountPrice();
        $description = $this->getDescription();
        $descLength  = strlen($description);
        $descPoints  = ($descLength > 100) ? '...' : '';
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'picture' => $this->getPicture(),
            'description' => substr($description, 0, 100) . $descPoints,
            'discountPrice' => $this->getDiscountPrice() . ' CHF',
            'hasDiscountPrice' => ($this->getDiscountPrice() > 0) ? true : false,
            'price' => $this->getPrice() . ' CHF',
            'priceSave' => 'Sie sparen ' . $saved . ' CHF',
            'category' => implode(', ', $categories),
        );
    }

    public function getCartArray()
    {
        $saved = $this->getPrice()-$this->getDiscountPrice();

        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getRealPrice(),
            'count' => 1,
            'maxcount' => count($this->getAvailableKeys())
        );
    }
}

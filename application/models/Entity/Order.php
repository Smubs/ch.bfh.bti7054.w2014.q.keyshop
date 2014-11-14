<?php

namespace Entity;

/**
 * Class OrderException
 * @package Entity
 */
class OrderException extends \Exception {}

/**
 * Class Order
 * @package Entity
 */
class Order {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var string $userId
     */
    protected $userId;
    /**
     * @var User $user
     */
    protected $user;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Key[] $keys
     */
    protected $keys;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|Product[] $products
     */
    protected $products;

    public function __construct()
    {

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

    /**
     * @param \Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }
}

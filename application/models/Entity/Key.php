<?php

namespace Entity;

/**
 * Class KeyException
 * @package Entity
 */
class KeyException extends \Exception {}

/**
 * Class Key
 * @package Entity
 */
class Key {
    /**
     * @var integer $id
     */
    protected $id;
    /**
     * @var string $key
     */
    protected $key;
    /**
     * @var Product $product
     */
    protected $product;
    /**
     * @var Order $order
     */
    protected $order;

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
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param \Entity\Order $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return \Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param \Entity\Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return \Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}

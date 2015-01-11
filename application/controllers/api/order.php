<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends KS_Controller {

    public function neworder()
    {
        $this->thisIsAjax();

        $requestCart = $this->request('cart');

        $products = array();
        $productQuantities = array();
        foreach($requestCart as $product) {
            $rp = $this->productRepo->find($product->id);
            $products[] = $rp;
            $productQuantities[$rp->getId()] = $product->count;
        }

        $order = new \Entity\Order();
        $order->setStatus('waiting');
        $order->setUser($this->getUser());
        $order->setProducts($products);
        $this->em->persist($order);
        $this->em->flush();

        // set orderid to keys
        foreach($products as $product) {
            $keys     = $product->getAvailableKeys();
            $quantity = count($keys);
            if ($quantity > $productQuantities[$product->getId()]) {
                $quantity = $productQuantities[$product->getId()];
            }
            for ($i = 0; $i < $quantity; $i++) {
                $keys[$i]->setOrder($order);
                $this->em->persist($keys[$i]);
            }
        }

        $this->em->flush();


        echo json_encode(array(
            'orderid'    => $order->getId()
        ));
    }
}

?>
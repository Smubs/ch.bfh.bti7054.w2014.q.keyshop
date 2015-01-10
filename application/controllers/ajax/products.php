<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends KS_Controller {

    public function index() {
        $products = array();
        $oproducts = $this->productRepo->findAll();
        foreach ($oproducts as $product) {
            $t = array();
            $t = $product->getHomeArray();
            $t['url'] = site_url('produkt/'.urlencode($t['name']));
            $products[] = $t;
            unset($t);
        }

        echo json_encode(array(
            'products'    => $products
        ));
    }

}

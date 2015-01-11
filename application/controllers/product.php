<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends KS_Controller {

    public function index($name) {
        $products = array();

        $product = $this->productRepo->findOneByName(urldecode($name));
        $this->_setData('product', $product); 
		$this->_setJsData('product', $product->getCartArray());

        $firstCategory = $product->getCategories()->toArray();

        if ($firstCategory) {
            $firstCategory = $firstCategory[0];
            $oproducts = $firstCategory->getProducts()->toArray();
            shuffle($oproducts);

            foreach ($oproducts as $product) {
                if (count($product->getAvailableKeys()) == 0 || count($products) > 2)
                    continue;

                $t = array();
                $t = $product->getHomeArray();
                $t['url'] = site_url('produkt/'.urlencode($t['name']));
                $products[] = $t;
                unset($t);
            }
        }


        $this->_setJsData('products', $products);

        $this->_renderScripts(array('assets/scripts/sites/product.js'));
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('product', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

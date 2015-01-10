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


        $categories = array();
        $ocategories = $this->categoryRepo->findAll();
        foreach($ocategories as $category) {
            $t = array();
            $t['name'] = $category->getName();
            $t['description'] = $category->getDescription();
            $t['cssClass'] = 'fa fa-cutlery'; // todo
            $t['selected'] = true; // used by angular
            $categories[] = $t;
            unset($t);
        }

        $this->_setJsData('ajaxurl', site_url('/ajax/products/'));


        $this->_setJsData('categories', $categories);
        $this->_setJsData('products', $products);

        $this->_renderScripts(array('assets/scripts/sites/products.js'));
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('products', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

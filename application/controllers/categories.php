<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends KS_Controller {

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
		
		 
        $this->_setJsData('products', $products);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('categories', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

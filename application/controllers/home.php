<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends KS_Controller {

    public function index() {
	
        $homeProducts = array();
        $products = $this->productRepo->findAll();
        foreach ($products as $product) {
			$t = array();
			$t = $product->getHomeArray();
            $t['url'] = site_url('produkt/'.urlencode($t['name'])); 
			$homeProducts[] = $t;
			unset($t); 
        }
		
        $this->_setJsData('products', $homeProducts);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('home', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

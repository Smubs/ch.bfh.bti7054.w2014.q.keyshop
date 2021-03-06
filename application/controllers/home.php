<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends KS_Controller {

    public function index() {
        $this->showSearch();

        $search = $this->input->post('search');
        $this->setData('search', $search);
        $criteria = array();
        if (!empty($search)) {
            $fields  = array('name', 'description', 'price', 'discountPrice');
            foreach ($fields as $field) {
                $criteria[$field] = $search;
            }
        }
        $products = $this->productRepo->searchBy($criteria, array('id' => 'desc'));
        $homeProducts = array();
        foreach ($products as $product) {
            if (count($product->getAvailableKeys()) == 0 || count($homeProducts) > 2)
                continue;
			$t = array();
			$t = $product->getHomeArray();
            $t['url'] = site_url('produkt/'.urlencode($t['name'])); 
			$homeProducts[] = $t;
			unset($t); 
        }
		
        $this->setJsData('products', $homeProducts);

        $this->renderScripts();
        $this->renderStyles();

        $this->load->view('template/head', $this->getData());
        $this->load->view('home', $this->getData());
        $this->load->view('template/foot', $this->getData());
    }

}

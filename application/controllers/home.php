<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends KS_Controller {

    public function index() {
        $homeProducts = array();
        $products = $this->productRepo->findAll();
        foreach ($products as $product) {
            $homeProducts[] = $product->getHomeArray();
        }
        $this->_setJsData('homeProducts', $homeProducts);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('home', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

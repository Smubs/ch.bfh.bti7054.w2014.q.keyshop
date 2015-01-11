<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends KS_Controller {

    public function index() {
        $search = $this->input->post('search');
        $this->_setData('search', $search);
        $categories = array();
        $ocategories = $this->categoryRepo->findAll();


        foreach($ocategories as $category) {
            if (count($category->getProducts()) == 0)
                continue;
            $t = array();
            $t['id'] = $category->getId();
            $t['name'] = $category->getName();
            $t['description'] = $category->getDescription();
            $t['cssClass'] = $category->getCssClass();
            $t['selected'] = false; // used by angular

            $categories[] = $t;
            unset($t);
        }


        $this->_setJsData('apiurl', site_url('/api/products/'));


        $this->_setJsData('categories', $categories);

        $this->_renderScripts(array('assets/scripts/sites/products.js'));
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('products', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends KS_Controller {

    public function index() {
        $this->showSearch();

        $search = $this->input->post('search');
        $this->setData('search', $search);
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


        $this->setJsData('apiurl', site_url('/api/products/'));


        $this->setJsData('categories', $categories);

        $this->renderScripts(array('assets/scripts/sites/products.js'));
        $this->renderStyles();

        $this->load->view('template/head', $this->getData());
        $this->load->view('products', $this->getData());
        $this->load->view('template/foot', $this->getData());
    }

}

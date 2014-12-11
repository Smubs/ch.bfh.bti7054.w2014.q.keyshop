<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Products extends KS_Controller {

	public function index()
	{
        if ($id = $this->input->post('remove')) {
            $product = $this->productRepo->find($id);
            if ($product) {
                $productName = $product->getName();
                $this->em->remove($product);
                $this->em->flush();

                $this->_setJsData('alert', array(
                    'mode'    => 'success',
                    'message' => 'Das Produkt "' . $productName . '" wurde erfolgreich gelöscht.'
                ));
            }
        }

        $arrProducts = array();
        $products = $this->productRepo->findAll();
        foreach ($products as $product) {
            $arrProducts[] = array(
                'id'   => $product->getId(),
                'name' => $product->getName(),
            );
        }
        $this->_setJsData('products', json_encode($arrProducts));

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/products/overview', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
	}

    public function add()
    {
        if ($post = $this->input->post()) {
            if (empty($post['status'])
                    || empty($post['name'])
                || empty($post['description'])
                || empty($post['price'])
            ) {
                $this->_setJsData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else {
                $product = new \Entity\Product();
                $product->setName($post['name']);
                $product->setDescription($post['description']);
                $product->setPrice($post['price']);
                $product->setDiscountPrice($post['discountPrice']);
            }
        }

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/products/add', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function edit($id)
    {
        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/products/edit', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

}

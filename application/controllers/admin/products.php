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
                try {
                    $this->em->flush();
                    $this->setData('alert', array(
                        'mode'    => 'success',
                        'message' => 'Das Produkt "' . $productName . '" wurde erfolgreich gelöscht.'
                    ));
                } catch (\Exception $e) {
                    $this->setData('alert', array(
                        'mode'    => 'danger',
                        'message' => 'Löschen Sie zuerst die zugewiesenen Keys.'
                    ));
                }
            }
        }

        $search = $this->input->post('search');
        $this->setData('search', $search);
        $criteria = array();
        if (!empty($search)) {
            $fields  = array('name', 'description', 'price', 'discountPrice');
            foreach ($fields as $field) {
                $criteria[$field] = $search;
            }
        }
        $products = $this->productRepo->searchBy($criteria);
        $jsData = array();
        foreach ($products as $product) {
            $jsData[] = array(
                'id'   => $product->getId(),
                'name' => $product->getName(),
            );
        }
        $this->setJsData('products', $jsData);

        $this->renderScripts();
        $this->renderStyles();

        $this->load->view('template/admin/head', $this->getData());
        $this->load->view('admin/products/overview', $this->getData());
        $this->load->view('template/admin/foot', $this->getData());
	}

    public function success()
    {
        $this->setData('alert', array(
            'mode'    => 'success',
            'message' => 'Produkt erfolgreich gespeichert.'
        ));
        $this->index();
    }

    public function add($id = 0)
    {
        $this->setData('isEditView', ($id > 0));

        if (($product = $this->productRepo->find($id)) && !$this->input->post()) {
            $productCategories = $product->getCategories()->toArray();
            $keys = $product->getKeys()->toArray();
            $data['keys'] = '';
            foreach ($keys as $key) {
                $data['keys'] .= $key->getKey() . '<br />';
            }

            if ($product->getStatus()) {
                $post['status'] = 1;
            }

            $post['name']          = $product->getName();
            $post['description']   = $product->getDescription();
            $post['price']         = $product->getPrice();
            $post['discountPrice'] = $product->getDiscountPrice();

            $picture = $product->getPicture();
            if (!empty($picture)) {
                $post['picture'] = '<img src="/assets/images/products/' . $picture . '" class="product-edit-picture" />';
            }
        } else {
            $productCategories = array();
            $post = $this->input->post();
            if (!empty($post['categories']) && $categoryIds = explode(',', $post['categories'])) {
                foreach ($categoryIds as $categoryId) {
                    if ($category = $this->categoryRepo->find($categoryId)) {
                        $productCategories[] = $category;
                    }
                }
            }
        }

        // Multi Select Categories
        $jsData = array();
        $categories = $this->categoryRepo->findAll();
        foreach ($categories as $category) {
            $jsData[] = array(
                'id'     => $category->getId(),
                'name'   => $category->getName(),
                'ticked' => in_array($category, $productCategories),
            );
        }
        $this->setJsData('multiSelectCategories', $jsData);

        $data['status']        = isset($post['status'])        ? 'checked'              : '';
        $data['name']          = isset($post['name'])          ? $post['name']          : '';
        $data['description']   = isset($post['description'])   ? $post['description']   : '';
        $data['price']         = isset($post['price'])         ? $post['price']         : '';
        $data['discountPrice'] = isset($post['discountPrice']) ? $post['discountPrice'] : '';
        $data['picture']       = isset($post['picture'])       ? $post['picture']       : '';
        if (empty($data['keys'])) $data['keys'] = '';
        $this->setData('data', $data);

        if ($this->input->post()) {
            if (($post['name'] === '')
                || ($post['description'] === '')
                || ($post['price'] === '')
            ) {
                $this->setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else {
                if (!$product) {
                    $product = new \Entity\Product();
                }
                $product->setCategories($productCategories);
                $product->setStatus(isset($post['status']));
                $product->setName($post['name']);
                $product->setDescription($post['description']);
                $product->setPrice($post['price']);
                $product->setDiscountPrice($post['discountPrice']);
                if (!empty($_FILES['picture']['name']) && $picture = $this->upload('picture')) {
                    $oldPicture = $product->getPicture();
                    if (!empty($oldPicture)) {
                        $product->removePicture();
                    }
                    $product->setPicture($picture);
                }
                $this->em->persist($product);
                $this->em->flush();
                redirect('/admin/products/success');
            }
        }

        $this->renderScripts();
        $this->renderStyles();

        $this->load->view('template/admin/head', $this->getData());
        $this->load->view('admin/products/add', $this->getData());
        $this->load->view('template/admin/foot', $this->getData());
    }

    private function upload($field)
    {
        $config['upload_path'] = 'assets/images/products';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '2048';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field)) {
            $this->setData('alert', array(
                'mode'    => 'danger',
                'message' => $this->upload->display_errors()
            ));
            return false;
        }

        $data = $this->upload->data();
        return $data['file_name'];
    }

    public function edit($id)
    {
        $this->add($id);
    }

}

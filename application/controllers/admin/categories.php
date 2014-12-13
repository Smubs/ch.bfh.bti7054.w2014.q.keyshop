<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Categories extends KS_Controller {

    public function index()
    {
        if ($id = $this->input->post('remove')) {
            $category = $this->categoryRepo->find($id);
            if ($category) {
                $categoryName = $category->getName();
                $this->em->remove($category);
                $this->em->flush();

                $this->_setData('alert', array(
                    'mode'    => 'success',
                    'message' => 'Die Kategorie "' . $categoryName . '" wurde erfolgreich gelöscht.'
                ));
            }
        }

        $jsData = array();
        $categories = $this->categoryRepo->findAll();
        foreach ($categories as $category) {
            $jsData[] = array(
                'id'   => $category->getId(),
                'name' => $category->getName(),
            );
        }
        $this->_setJsData('categories', $jsData);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/categories/overview', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function success()
    {
        $this->_setData('alert', array(
            'mode'    => 'success',
            'message' => 'Kategorie erfolgreich gespeichert.'
        ));
        $this->index();
    }

    public function add($id = 0)
    {
        if (($category = $this->categoryRepo->find($id)) && !$this->input->post()) {
            $post['name']        = $category->getName();
            $post['description'] = $category->getDescription();
        } else {
            $post = $this->input->post();
        }

        $data['name']        = isset($post['name'])        ? $post['name']        : '';
        $data['description'] = isset($post['description']) ? $post['description'] : '';
        $this->_setData('data', $data);

        if ($this->input->post()) {
            if ($post['name'] === '') {
                $this->_setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else {
                if (!$category) {
                    $category = new \Entity\Category();
                }
                $category->setName($post['name']);
                $category->setDescription($post['description']);
                $this->em->persist($category);
                $this->em->flush();
                redirect('/admin/categories/success');
            }
        }

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/categories/add', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function edit($id)
    {
        $this->add($id);
    }

}

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Keys extends KS_Controller {

    public function index()
    {
        if ($id = $this->input->post('remove')) {
            $key = $this->keyRepo->find($id);
            if ($key) {
                $keyString = $key->getKey();
                $this->em->remove($key);
                $this->em->flush();

                $this->_setData('alert', array(
                    'mode'    => 'success',
                    'message' => 'Der Key "' . $keyString . '" wurde erfolgreich gelöscht.'
                ));
            }
        }

        $search = $this->input->post('search');
        $this->_setData('search', $search);
        $keys     = array();
        $criteria = array();
        if (!empty($search)) {
            $products = $this->productRepo->searchBy(array('name' => $search));
            foreach ($products as $product) {
                $keys = array_merge($keys, $this->keyRepo->searchBy(array('product' => $product)));
            }
            $criteria = array('key' => $search);
        }
        $keys = array_merge($keys, $this->keyRepo->searchBy($criteria));
        $jsData = array();
        foreach ($keys as $key) {
            $jsData[] = array(
                'id'      => $key->getId(),
                'key'     => $key->getKey(),
                'product' => $key->getProduct()->getName(),
            );
        }
        $this->_setJsData('keys', $jsData);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/keys/overview', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function success()
    {
        $this->_setData('alert', array(
            'mode'    => 'success',
            'message' => 'Key(s) erfolgreich gespeichert.'
        ));
        $this->index();
    }

    public function add($id = 0)
    {
        $this->_setData('isEditView', ($id > 0));

        if (($key = $this->keyRepo->find($id)) && !$this->input->post()) {
            $post['product'] = $key->getProduct()->getId();
            $post['key']     = $key->getKey();
        } else {
            $post = $this->input->post();
        }

        $data['products'] = $this->productRepo->findAll();
        $data['product']  = isset($post['product']) ? $post['product'] : 0;
        $data['key']      = isset($post['key'])     ? $post['key']     : '';
        $data['keys']     = isset($post['keys'])    ? $post['keys']    : '';
        $this->_setData('data', $data);

        if ($this->input->post()) {
            if (empty($post['key']) && empty($post['keys'])) {
                $this->_setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else {
                if (!$key) {
                    if (!empty($post['keys'])) {
                        $inputKeys = explode("\n", $post['keys']);
                        foreach ($inputKeys as $inputKey) {
                            $key = new \Entity\Key();
                            $key->setProduct($this->productRepo->find($data['product']));
                            $key->setKey($inputKey);
                            $this->em->persist($key);
                        }
                    } else {
                        $key = new \Entity\Key();
                        $key->setProduct($this->productRepo->find($data['product']));
                        $key->setKey($post['key']);
                        $this->em->persist($key);
                    }
                    $key = new \Entity\Key();
                } else {
                    $key->setProduct($this->productRepo->find($data['product']));
                    $key->setKey($post['key']);
                    $this->em->persist($key);
                }
                $this->em->flush();
                redirect('/admin/keys/success');
            }
        }

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/keys/add', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function edit($id)
    {
        $this->add($id);
    }

}

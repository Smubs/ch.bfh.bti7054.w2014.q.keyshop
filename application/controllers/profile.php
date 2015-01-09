<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profile extends KS_Controller {

    public function index()
    {
			//var_dump($this->user->getEmail()); 
		//die;


		// user dont need to be assigned: allready done by core/ks_controller

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

        $this->load->view('template/head', $this->_getData());
        $this->load->view('profile', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

    public function success()
    {
        $this->_setData('alert', array(
            'mode'    => 'success',
            'message' => 'Kategorie erfolgreich gespeichert.'
        ));
        $this->index();
    }

}

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends KS_Controller {

    public function index()
    {
        if ($id = $this->input->post('remove')) {
            $user = $this->userRepo->find($id);
            if ($user) {
                $userEmail = $user->getEmail();
                $this->em->remove($user);
                $this->em->flush();

                $this->_setData('alert', array(
                    'mode'    => 'success',
                    'message' => 'Der Benutzer "' . $userEmail . '" wurde erfolgreich gelöscht.'
                ));
            }
        }

        $searchEmail = $this->input->post('searchEmail');
        $this->_setData('searchEmail', $searchEmail);
        $criteria = !empty($searchEmail) ? array('email' => $searchEmail) : array();
        $users = $this->userRepo->findBy($criteria);
        $jsData = array();
        foreach ($users as $user) {
            $jsData[] = array(
                'id'    => $user->getId(),
                'email' => $user->getEmail(),
            );
        }
        $this->_setJsData('users', $jsData);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/users/overview', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function success()
    {
        $this->_setData('alert', array(
            'mode'    => 'success',
            'message' => 'Benutzer erfolgreich gespeichert.'
        ));
        $this->index();
    }

    public function add($id = 0)
    {
        if (($user = $this->userRepo->find($id)) && !$this->input->post()) {
            $post['email']     = $user->getEmail();
            $post['admin']     = $user->getAdmin();
            $post['firstname'] = $user->getFirstname();
            $post['lastname']  = $user->getLastname();
            $post['address']   = $user->getAddress();
            $post['zip']       = $user->getZip();
            $post['place']     = $user->getPlace();
            $post['country']   = $user->getCountry()->getId();
        } else {
            $post = $this->input->post();
        }

        $data['countries'] = $this->countryRepo->findAll();
        $data['email']     = isset($post['email'])     ? $post['email']     : '';
        $data['password']  = isset($post['password'])  ? $post['password']  : '';
        $data['admin']     = !empty($post['admin'])    ? true               : false;
        $data['firstname'] = isset($post['firstname']) ? $post['firstname'] : '';
        $data['lastname']  = isset($post['lastname'])  ? $post['lastname']  : '';
        $data['address']   = isset($post['address'])   ? $post['address']   : '';
        $data['zip']       = isset($post['zip'])       ? $post['zip']       : '';
        $data['place']     = isset($post['place'])     ? $post['place']     : '';
        $data['country']   = isset($post['country'])   ? $post['country']   : '';
        $this->_setData('data', $data);

        if ($this->input->post()) {
            if (empty($post['email']) || ($id == 0 && empty($post['password']))) {
                $this->_setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else {
                if (!$user) {
                    $user = new \Entity\User();
                }
                $user->setEmail($post['email']);
                if (!empty($post['password'])) {
                    $user->setPassword($post['password']);
                }
                $user->setAdmin(!empty($post['admin']) ? true : false);
                $user->setFirstname($post['firstname']);
                $user->setLastname($post['lastname']);
                $user->setAddress($post['address']);
                $user->setZip($post['zip']);
                $user->setPlace($post['place']);
                if ($country = $this->countryRepo->find($post['country'])) {
                    $user->setCountry($country);
                }
                $this->em->persist($user);
                $this->em->flush();
                redirect('/admin/users/success');
            }
        }

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/admin/head', $this->_getData());
        $this->load->view('admin/users/add', $this->_getData());
        $this->load->view('template/admin/foot', $this->_getData());
    }

    public function edit($id)
    {
        $this->add($id);
    }

}

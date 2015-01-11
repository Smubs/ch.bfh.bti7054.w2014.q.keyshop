<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profile extends KS_Controller {

    public function index()
    {
        $this->checkAccess();

        $user = $this->getUser();
        $this->setData('countries', $this->countryRepo->findAll());

        if ($post = $this->input->post()) {
            if (empty($post['email'])) {
                $this->setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Bitte füllen Sie alle Pflichtfelder aus.'
                ));
            } else if ((!empty($post['password']) || !empty($post['passwordRetype'])) && $post['password'] !== $post['passwordRetype']) {
                $this->setData('alert', array(
                    'mode'    => 'warning',
                    'message' => 'Passwörter stimmen nicht überein.'
                ));
            } else {
                $user->setEmail($post['email']);
                $user->setFirstname($post['firstname']);
                $user->setLastname($post['lastname']);
                $user->setAddress($post['address']);
                $user->setZip($post['zip']);
                $user->setPlace($post['place']);
                if ($country = $this->countryRepo->find($post['country'])) {
                    $user->setCountry($country);
                }
                if (!empty($post['password'])) {
                    $user->setPassword($post['password']);
                }
                $this->em->persist($user);
                $this->em->flush();
                redirect('/profile/success');
            }
        }

        $this->renderScripts();
        $this->renderStyles();

        $this->load->view('template/head', $this->getData());
        $this->load->view('profile', $this->getData());
        $this->load->view('template/foot', $this->getData());
    }

    public function success()
    {
        $this->setData('alert', array(
            'mode'    => 'success',
            'message' => 'Profil erfolgreich bearbeitet.'
        ));
        $this->index();
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends KS_Controller {

    public function index() {
        
        $this->_setJsData('test', 'wertvontest');
        $this->_setData('test', 'wertvontest');

        $this->_renderScripts();
        $this->_renderStyles();

        // Create user
        /*$user = new \Entity\User();
        $user->setEmail('noreply@example.com');
        $user->setPassword('123456');
        $this->em->persist($user);
        $this->em->flush();*/

        // Find and remove user
        /*$userRepo = $this->em->getRepository('Entity\User');
        $user = $userRepo->find(1);
        $this->em->remove($user);
        $this->em->flush();*/

        $this->load->view('template/head', $this->_getData());
        $this->load->view('home', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends KS_Controller {

    public function index() {
        
        $this->_setJsData('test', 'wertvontest');
        $this->_setData('test', 'wertvontest');

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('home', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

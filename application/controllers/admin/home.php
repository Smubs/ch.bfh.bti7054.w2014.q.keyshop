<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends KS_Controller {

	public function index()
	{
        $this->_renderScripts();
        $this->_renderStyles();

		$this->load->view('template/admin/head', $this->_getData());
		$this->load->view('admin/home', $this->_getData());
		$this->load->view('template/admin/foot', $this->_getData());
	}

}

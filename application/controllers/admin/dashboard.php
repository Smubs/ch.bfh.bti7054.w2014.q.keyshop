<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends KS_Controller {

	public function index()
	{
        // TODO

        $this->_renderScripts();
        $this->_renderStyles();

		$this->load->view('template/admin/head', $this->_getData());
		$this->load->view('admin/dashboard', $this->_getData());
		$this->load->view('template/admin/foot', $this->_getData());
	}

}

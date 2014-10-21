<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('template/admin/head');
		$this->load->view('admin/home');
		$this->load->view('template/admin/foot');
	}

}

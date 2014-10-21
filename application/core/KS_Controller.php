<?php

class KS_Controller extends CI_Controller {
    private $jsdata;
    private $data;
    
    public function __construct() {
        parent::__construct();

        // images url
        $this->data['iurl'] = base_url() . 'assets/images/';
    }
    
    public function _setJsData($name, $object) {
        $this->jsdata[$name] = $array;
    }
    
    public function _setData($name, $object) {
        $this->data[$name] = $object;
    }
    

  // 'constructor' for ajax controllers
    protected $request = null;
    public function _thisIsAjax() {
        $this->output->set_content_type('application/json');
        $this->request = json_decode(file_get_contents("php://input"));
    }

}
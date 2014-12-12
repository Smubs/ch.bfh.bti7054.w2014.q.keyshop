<?php

class KS_Controller extends CI_Controller {

    private $jsdata;
    private $data;
    private $isBackend;

    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    public $em;
    /**
     * @var \Repository\CategoryRepository $categoryRepo
     */
    public $categoryRepo;
    /**
     * @var \Repository\KeyRepository $keyRepo
     */
    public $keyRepo;
    /**
     * @var \Repository\OrderRepository $orderRepo
     */
    public $orderRepo;
    /**
     * @var \Repository\ProductRepository $productRepo
     */
    public $productRepo;
    /**
     * @var \Repository\UserRepository $userRepo
     */
    public $userRepo;
    /**
     * @var \Repository\CountryRepository $countryRepo
     */
    public $countryRepo;

    public function __construct() {
        parent::__construct();

        // images url
        $this->data['iurl'] = base_url() . 'assets/images/';
        $this->isBackend    = $this->uri->segment(1) === 'admin';

        if ($this->isBackend) {
            // Set alert defaults
            $this->data['alert'] = array(
                'mode'    => '',
                'display' => 'hide',
                'message' => ''
            );
        }

        $this->em           = $this->doctrine->em;
        $this->categoryRepo = $this->em->getRepository('Entity\Category');
        $this->keyRepo      = $this->em->getRepository('Entity\Key');
        $this->orderRepo    = $this->em->getRepository('Entity\Order');
        $this->productRepo  = $this->em->getRepository('Entity\Product');
        $this->userRepo     = $this->em->getRepository('Entity\User');
        $this->countryRepo  = $this->em->getRepository('Entity\Country');
    }

    public function _setJsData($name, $object) {
        $this->jsdata[$name] = $object;
    }

    public function _setData($name, $object) {
        $this->data[$name] = $object;
    }
    
    public function _getData() {
        if (!isset($this->data['alert']['display'])) {
            $this->data['alert']['display'] = '';
        }
        return $this->data;
    }

    // 'constructor' for ajax controllers
    protected $request = null;

    public function _thisIsAjax() {
        $this->output->set_content_type('application/json');
        $this->request = json_decode(file_get_contents("php://input"));
    }

    public function _renderScripts($js = array()) {
        // check if there is somewhere no .js 
        $i = 0;
        foreach ($js as $jsitem) {
            if (strpos($jsitem, '.js') === false) {
                $js[$i] = 'assets/scripts/' . $jsitem . '.js';
            }
            $i++;
        }
        // jquery and base64 | need to be seperated because of dependencies
        $preJs = array(
            'assets/scripts/jquery-1.11.1.min.js',
            'assets/scripts/jquery.base64.min.js'
        );

        $this->data['prescripts'] = '';
        foreach ($preJs as $prejsitem) {
            $this->data['prescripts'] .= '<script src="' . base_url() . $prejsitem . '"></script>';
        }

        // default js
        $defaultJs = array(
            'assets/scripts/angular.min.js',
            'assets/scripts/ui-bootstrap-tpls-0.11.2.min.js',
			'assets/scripts/services/authService.js'
        );

        if ($this->isBackend) {
            $defaultJs[] = 'assets/scripts/admin/main.js';
        } else {
            $defaultJs[] = 'assets/scripts/main.js';
        }

        $this->data['scripts'] = '';
        foreach (array_merge($defaultJs, $js) as $jsitem) {
            $this->data['scripts'] .= '<script src="' . base_url() . $jsitem . '"></script>';
        }

        $this->data['jsdata'] = base64_encode(json_encode($this->jsdata));
    }
    
    

    public function _renderStyles($css = array()) {
        // check if there is somewhere no .css 
        $i = 0;
        foreach ($css as $cssitem) {
            if (strpos($cssitem, '.css') === false) {
                $css[$i] = 'assets/styles/' . $cssitem . '.css';
            }
            $i++;
        }

        // default css
        $defaultCss = array(
            'assets/styles/bootstrap.min.css',
            'assets/styles/font-awesome.min.css',
            'assets/styles/main.css'
        );
        
        $this->data['styles'] = '';
        foreach (array_merge($defaultCss, $css) as $cssitem) {
            $this->data['styles'] .= '<link type="text/css" rel="stylesheet" href="' . base_url() . $cssitem . '" />
';
        }
    }


}

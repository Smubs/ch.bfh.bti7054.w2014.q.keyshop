<?php

class KS_Controller extends CI_Controller {

    /**
     * @var array $jsdata
     */
    private $jsdata;
    /**
     * @var array $data
     */
    private $data;
    /**
     * @var bool $isBackend
     */
    private $isBackend;
    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    protected $em;
    /**
     * @var \Repository\CategoryRepository $categoryRepo
     */
    protected $categoryRepo;
    /**
     * @var \Repository\KeyRepository $keyRepo
     */
    protected $keyRepo;
    /**
     * @var \Repository\OrderRepository $orderRepo
     */
    protected $orderRepo;
    /**
     * @var \Repository\ProductRepository $productRepo
     */
    protected $productRepo;
    /**
     * @var \Repository\UserRepository $userRepo
     */
    protected $userRepo;
    /**
     * @var \Repository\CountryRepository $countryRepo
     */
    protected $countryRepo;
    /**
     * @var \Entity\User $user Current user
     */
    private $user = null;

    /**
     * @var boolean $showSearch
     */
    protected $showSearch = false;


    public function __construct() {
        parent::__construct();

        // images url
        $this->data['iurl'] = base_url() . 'assets/images/';
        $this->isBackend    = $this->uri->segment(1) === 'admin';

        // Set alert defaults
        $this->data['alert'] = array(
            'mode'    => '',
            'display' => 'hide',
            'message' => ''
        );

        $this->em           = $this->doctrine->em;
        $this->categoryRepo = $this->em->getRepository('Entity\Category');
        $this->keyRepo      = $this->em->getRepository('Entity\Key');
        $this->orderRepo    = $this->em->getRepository('Entity\Order');
        $this->productRepo  = $this->em->getRepository('Entity\Product');
        $this->userRepo     = $this->em->getRepository('Entity\User');
        $this->countryRepo  = $this->em->getRepository('Entity\Country');
		
		// do authentifaction and load current user
        $this->doUser();

        if ($this->isBackend) {
            $this->checkAccess(true);
        }

        if ($this->isBackend) {
            $this->setData('classOrders', in_array($this->uri->segment(2), array(false, 'orders')) ? 'active' : '');
            $this->setData('classProducts', $this->uri->segment(2) === 'products' ? 'active' : '');
            $this->setData('classKeys', $this->uri->segment(2) === 'keys' ? 'active' : '');
            $this->setData('classCategories', $this->uri->segment(2) === 'categories' ? 'active' : '');
            $this->setData('classUsers', $this->uri->segment(2) === 'users' ? 'active' : '');
        } else {
            $this->setData('classHome', in_array($this->uri->segment(1), array(false, 'home')) ? 'active' : '');
            $this->setData('classProducts', $this->uri->segment(1) === 'products' ? 'active' : '');
            $this->setData('classProfile', $this->uri->segment(1) === 'profile' ? 'active' : '');
        }
    }

    protected function showSearch() {
        $this->showSearch = true;
    }

    protected function setJsData($name, $object) {
        $this->jsdata[$name] = $object;
    }

    protected function setData($name, $object) {
        $this->data[$name] = $object;
    }
    
    protected function getData() {
        if (!isset($this->data['alert']['display'])) {
            $this->data['alert']['display'] = '';
        }
        return $this->data;
    }

    private function doUser() {
        if ($this->session->userdata('logged_in')) {
            $uid = $this->session->userdata('logged_in');
			$u   = $this->userRepo->find($uid);
			$this->user = $u;
			
			$udata['id'] = $u->getId();
			$udata['email'] = $u->getEmail();
			$udata['firstname'] = $u->getFirstname();
			$udata['lastname'] = $u->getLastname();
			$udata['address'] = $u->getAddress();
			$udata['zip'] = $u->getZip();
			$udata['place'] = $u->getPlace();
            
			$this->setData('user', $udata);
            $this->setJsData('user', $udata);

            define('USERID', $u->getId());

            if ($u->getAdmin() > 6) {
                $this->setData('isAdmin', true);
				
            } else
            {
                $this->setData('isAdmin', false);
            }
            
        } else {
            $this->setData('user', false);
            $this->setJsData('user', false);
        }
        $this->setData('user', $this->user);
    }

    protected function getUser()
    {
        return $this->user;
    }


    protected function renderScripts($js = array()) {
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
            'assets/scripts/jquery-2.1.3.min.js',
            'assets/scripts/jquery.base64.min.js'
        );

        $this->data['prescripts'] = '';
        foreach ($preJs as $prejsitem) {
            $this->data['prescripts'] .= '<script src="' . base_url() . $prejsitem . '"></script>';
        }

        // default js
        $defaultJs = array(
            'assets/scripts/angular.min.js',
            'assets/scripts/angular-cookies.min.js',
            'assets/scripts/bootstrap.min.js',
            'assets/scripts/ui-bootstrap-tpls-0.11.2.min.js',
			'assets/scripts/services/authService.js'
        );

        if ($this->isBackend) {
            $defaultJs[] = 'assets/scripts/admin/angular-multi-select.js';
            $defaultJs[] = 'assets/scripts/admin/main.js';
        } else {
            $defaultJs[] = 'assets/scripts/main.js';
        }

        $this->data['scripts'] = '';
        foreach (array_merge($defaultJs, $js) as $jsitem) {
            $this->data['scripts'] .= '<script src="' . base_url() . $jsitem . '"></script>' . "\n";
        }

        if ($this->uri->segment(1) === 'checkout') {
            $this->data['scripts'] .= '<script src="https://media.payrexx.com/modal/v1/modal.js"></script>' . "\n";
            $this->data['scripts'] .= '
                <script type="text/javascript">
                    $("#btn-payrexx-modal").payrexxModal({
                        hidden: function(transaction) {
                            if (transaction.status === "confirmed") {
                                $("#btn-payrexx-modal").hide();
                                $("#checkout-success").show();
                            }
                        },
                        hideObjects: [".contact", "#contact-details"]
                    });
                </script>' . "\n";
        }

        $this->data['jsdata'] = base64_encode(json_encode($this->jsdata));
    }


    // 'constructor' for ajax controllers
    private $request = null;

    protected function request($property) {
        if ($this->request === NULL)
            return '';
        $request = $this->request;
        if(property_exists($request,$property)){
            return $request->{$property};
        }else{
            return ''; //
        }
    }

    protected function thisIsAjax() {
        $this->output->set_content_type('application/json');
        $this->request = json_decode(file_get_contents("php://input"));
    }

    protected function renderStyles($css = array()) {
        $this->setData('showSearch', $this->showSearch);

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
            'assets/styles/animate.css',
            'assets/styles/main.css'
        );

        if ($this->isBackend) {
            $defaultCss[] = 'assets/styles/angular-multi-select.css';
        }
        
        $this->data['styles'] = '';
        foreach (array_merge($defaultCss, $css) as $cssitem) {
            $this->data['styles'] .= '<link type="text/css" rel="stylesheet" href="' . base_url() . $cssitem . '" />' . "\n";
        }
    }

    protected function checkAccess($checkAdmin = false)
    {
        if (!$user = $this->getUser()) {
            redirect('/');
        }
        if ($checkAdmin && !$user->getAdmin()) {
            redirect('/');
        }
    }

}

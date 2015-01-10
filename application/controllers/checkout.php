<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Checkout extends KS_Controller
{

    public function index()
    {
        $order   = $this->orderRepo->find(1);
        $product = $this->productRepo->find(2);
        $user    = $this->userRepo->find(2);

        $params = array(
            'invoice_number'   => $order->getId(),
            'invoice_amount'   => $product->getPrice(),
            'invoice_currency' => 'CHF',
            'contact_forename' => $user->getFirstname(),
            'contact_surname'  => $user->getLastname(),
            'contact_street'   => $user->getAddress(),
            'contact_postcode' => $user->getZip(),
            'contact_place'    => $user->getPlace(),
            'contact_email'    => $user->getEmail()
        );
        $modalQueryString = '';
        foreach ($params as $key => $value) {
            $modalQueryString .= '&' . $key . '=' . urlencode($value);
        }
        $this->_setData('modalQueryString', $modalQueryString);

        $this->_renderScripts();
        $this->_renderStyles();

        $this->load->view('template/head', $this->_getData());
        $this->load->view('checkout', $this->_getData());
        $this->load->view('template/foot', $this->_getData());
    }

}

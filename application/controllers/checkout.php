<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Checkout extends KS_Controller
{

    public function index($id)
    {
        $order   = $this->orderRepo->find($id);

        if ($order->getStatus() != 'waiting' || $order->getUser() != $this->getUser())
            redirect('/');

        $price = 0;
        foreach($order->getProducts() as $product) {
            $quantity = count($this->keyRepo->findBy(array(
                'order'   => $order,
                'product' => $product
            )));
            $price += $product->getRealPrice() * $quantity;
        }


        //$product = $this->productRepo->find(2);
        $user    = $this->getUser();

        $params = array(
            'invoice_number'   => $order->getId(),
            'invoice_amount'   => $price,
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

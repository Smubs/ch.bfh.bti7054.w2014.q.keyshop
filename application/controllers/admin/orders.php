<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Orders extends KS_Controller {

	public function index()
	{
        $search = $this->input->post('search');
        $this->setData('search', $search);
        if (!empty($search)) {
            $orders[] = $this->orderRepo->find($search);
        } else {
            $orders = $this->orderRepo->findAll();
        }
        $jsData = array();
        foreach ($orders as $order) {
            $jsData[] = array(
                'id'       => $order->getId(),
                'status'   => $order->getStatus(),
                'user'     => array(
                    'id'    => $order->getUser()->getId(),
                    'email' => $order->getUser()->getEmail(),
                ),
                'products' => $this->getProductsArray($order->getProducts()->toArray(), $order),
            );
        }
        $this->setJsData('orders', $jsData);

        $this->renderScripts();
        $this->renderStyles();

		$this->load->view('template/admin/head', $this->getData());
		$this->load->view('admin/orders/overview', $this->getData());
		$this->load->view('template/admin/foot', $this->getData());
	}

    private function getProductsArray($products, $paramOrder)
    {
        global $order;
        $order = $paramOrder;

        return array_map(function ($product) {
            global $order;

            $keys = $this->getKeysArray($this->keyRepo->findBy(array(
                'order'   => $order,
                'product' => $product
            )));
            return array(
                'id'       => $product->getId(),
                'name'     => $product->getName(),
                'quantity' => count($keys),
                'keys'     => $keys
            );
        }, $products);
    }

    private function getKeysArray($keys)
    {
        return array_map(function ($key) {
            return array(
                'id'  => $key->getId(),
                'key' => $key->getKey(),
            );
        }, $keys);
    }

    public function detail($id)
    {
        $order = $this->orderRepo->find($id);
        $this->setData('status', $order->getStatus());
        $this->setData('user', $order->getUser());
        $this->setData('products', $this->getProductsArray($order->getProducts()->toArray(), $order));

        $this->renderScripts();
        $this->renderStyles();

        $this->load->view('template/admin/head', $this->getData());
        $this->load->view('admin/orders/detail', $this->getData());
        $this->load->view('template/admin/foot', $this->getData());
    }

}

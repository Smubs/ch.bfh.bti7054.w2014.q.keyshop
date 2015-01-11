<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payrexx extends KS_Controller {

    public function order($token)
    {
        if ($token === '5bzbPzUBStN43bUuxVFa') {
            $post = $this->input->post();
            if (!empty($post['transaction']['invoice']['number'])
                && !empty($post['transaction']['status'])) {
                $orderId = intval($post['transaction']['invoice']['number']);
                $status  = $post['transaction']['status'];
                $order   = $this->orderRepo->find($orderId);
                if ($order) {
                    $order->setStatus($status);
                    $this->em->persist($order);
                    $this->em->flush();

                    if ($order->getStatus() === 'confirmed') {
                        $this->sendMail($order);
                    }
                }
            }
        }
    }

    protected function sendMail(\Entity\Order $order)
    {
        $this->load->library('email');
        $this->email->initialize(array(
            'mailtype' => 'html'
        ));

        $this->email->from('keyshop@kioh.ch', 'Keyshop');
        $this->email->to($order->getUser()->getEmail());

        $products = $order->getProducts()->toArray();
        $message  = $this->getMailMessage($order);

        $this->email->subject('Keyshop | Bestellung #' . $order->getId());
        $this->email->message($message);

        $this->email->send();
    }

    protected function getMailMessage(\Entity\Order $order)
    {
        $products = $order->getProducts()->toArray();
        $strProducts = '';
        foreach ($products as $product) {
            $keys = $this->keyRepo->findBy(array(
                'order'   => $order,
                'product' => $product
            ));
            $strKeys = '';
            foreach ($keys as $key) {
                $strKeys .= $key->getKey() . '<br />';
            }
            $strProducts .= '
                <tr>
                    <td valign="top">' . count($keys) . 'x ' . $product->getName() . '</td>
                    <td valign="top">' . $strKeys . '</td>
                </tr>
            ';
        }

        $productOverview = '
            <table width="50%">
                <tr>
                    <th align="left">Produkt</th>
                    <th align="left">Key(s)</th>
                </tr>
                ' . $strProducts . '
            </table>
        ';

        return '
            Guten Tag<br /><br />
            Vielen Dank für Ihre Bestellung.<br /><br />
            ' . $productOverview . '<br /><br />
            Freundliche Grüsse<br />
            Ihr Keyshop Team
        ';
    }

}

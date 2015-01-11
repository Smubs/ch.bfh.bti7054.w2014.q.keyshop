<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Test extends KS_Controller {

    public function index()
    {
        $curlParameters = array(
            'transaction' => array(
                'status' => 'confirmed',
                'invoice' => array(
                    'number' => 1
                )
            )
        );

        $curlOptions = array(
            CURLOPT_URL => 'http://' . $_SERVER['HTTP_HOST'] . '/api/payrexx/order/5bzbPzUBStN43bUuxVFa',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($curlParameters),
            CURLOPT_HTTP_VERSION => 1.0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false
        );

        $curl = curl_init();
        curl_setopt_array($curl, $curlOptions);
        $result = curl_exec($curl);
        var_dump($result);

        curl_close($curl);
    }

}

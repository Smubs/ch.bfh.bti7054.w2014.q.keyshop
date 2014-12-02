<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends KS_Controller
{

    public function login()
    {
        $email = '';
        $password = '';

        $user = $this->userRepo->findOneByEmail($email);

        if (hash_equals($user->getPassword(), crypt($password, $user->getPassword()))) {
            // Login correct
        }
    }

    public function logout()
    {

    }

}

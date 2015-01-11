<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends KS_Controller {

    public function login()
    {
		
		$post = $this->input->post(); 
        $email = $post['email'];
        $password = $post['password'];

        $user = $this->userRepo->findOneByEmail($email);
		
		if ($user) {
			if ($user->getPassword() === crypt($password, $user->getPassword())) {
				$this->session->set_userdata('logged_in', $user->getId());
				
				echo json_encode(array(
					'success'    => true,
					'message' => 'Erfolgreich angemeldet.'
				));
				die;
			} else {
				echo json_encode(array(
					'success'    => false,
					'message' => 'Passwort ist falsch.'
				));
				die;
			}
			 
		}
		echo json_encode(array(
			'success'    => false,
			'message' => 'Diese Mail ist nicht in unserer Datenbank.'
		));
		die;
    }

    public function logout()
    {
		$this->session->unset_userdata('logged_in');
		echo json_encode(array(
			'success'    => true
		));
    }
	
	public function register() {
		$post = $this->input->post();
				
		// post -> data
		$fi = array('email', 'password', 'firstname', 'lastname', 'address', 'zip', 'country_id', 'place'); 
		$data = array();
		foreach	($fi as $pk) {
			switch ($pk) {
				case 'country_id':
					$data[$pk] = isset($post[$pk])? intval($post[$pk])   : 0;
					break;
				default: 
					$data[$pk] 		= isset($post[$pk])		? $post[$pk]		: '';
			}
		}

        if ($this->input->post()) {
			
			// check if there is empty stuff 
			if (	$post['email'] === '' || 
					$post['email'] === 'undefined' ||
					$post['password'] === '' || 
					$post['password'] != $post['password2']) {
				$this->sendError('Bitte füllen Sie alle Felder korrekt aus.');
			}
			
			// check if mail allready exist in database
			$user = $this->userRepo->findOneByEmail($data['email']);
			if ($user) {
				$this->sendError('Diese Mail ist bereits in unserer Datenbank!');
			}
			
			// check password
			$this->checkPassword($data['password']); 

			// create new user
			$nuser = new \Entity\User();               
			$nuser->setAdmin(0);
			$nuser->setEmail($data['email']);
			$nuser->setPassword($data['password']);
			$nuser->setCountry($this->countryRepo->find(208));
			$this->em->persist($nuser);
			$this->em->flush();
			
			// autologin!
			$this->login(); 
		}
    
	}
	
	private function sendError($error) {
		echo json_encode(array(
				'success'    => false,
				'message' => $error
			));
		die; 
	}
	
	private function checkPassword($pwd) {
		$error = '';
		if (strlen($pwd) < 8) {
			$error .= "Passwort ist zu kurz.";
			
		}

		if (!preg_match("#[0-9]+#", $pwd)) {
			$error .= "Passwort muss mindestens eine Nummer beinhalten.";
		}

		if (!preg_match("#[a-zA-Z]+#", $pwd)) {
			$error .= "Passwort muss mindestens ein Buchstabe beinhalten!";
		}     
		
		if (strlen($error) > 0) {
			$this->sendError($error);
		}
	}
}

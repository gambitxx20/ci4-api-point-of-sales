<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Auth extends BaseController
{	

	public function index()
	{
		if($this->session->has('logged_in') == 1){
			return redirect()->to(base_url('home')); 
		}

	    $message = $this->session->getFlashdata('message');
	    $std = new UsersModel();
	    $users = $std->findAll();
	    
		//print_r($this->session->username);
		return view('Login');
	}

	public function logout(){
		$this->session->destroy();
		return redirect()->to(base_url('auth'));
	}

	//--------------------------------------------------------------------

}

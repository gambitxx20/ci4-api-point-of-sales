<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Home extends BaseController
{	
	
	public function index()
	{
		
	    $message = $this->session->getFlashdata('message');
	    $std = new UsersModel();
	    $users = $std->findAll();
		
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

}

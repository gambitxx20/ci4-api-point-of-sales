<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Users extends BaseController
{	
	
	public function index()
	{
		
	    $message = $this->session->getFlashdata('message');
	    
		$data = array(
			'title' => 'Users',
			'content' => 'Users/index',
			'message' => $message,
		);	

		return view('Layouts',$data);
	}

	//--------------------------------------------------------------------

}

<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Home extends BaseController
{	
	
	public function index()
	{
		
	    $message = $this->session->getFlashdata('message');
	    
		$data = array(
			'title' => 'Home',
			'content' => 'Home',
			'message' => $message,
		);	

		return view('Layouts',$data);
	}

	//--------------------------------------------------------------------

}

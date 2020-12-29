<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Home extends BaseController
{	
	
	public function index()
	{
		if($this->session->has('logged_in') != 1){
			return redirect()->to(base_url('auth')); 
		}
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

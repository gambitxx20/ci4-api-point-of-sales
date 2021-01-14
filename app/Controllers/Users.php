<?php namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RolesModel;
use CodeIgniter\Config\Config;
use CodeIgniter\Controller;

class Users extends BaseController
{	
	
	public function index()
	{	
		if($this->session->has('logged_in') != 1){
			return redirect()->to(base_url('auth')); 
		}
		$message = $this->session->getFlashdata('message');
	    
		$data = array(
			'title' => 'Users',
			'content' => 'Users/index',
			'message' => $message,
		);	

		return view('Layouts',$data);
	}
	public function create(){
		if($this->session->has('logged_in') != 1){
			return redirect()->to(base_url('auth')); 
		}
		$message = $this->session->getFlashdata('message');
	    $rolesModel = new RolesModel;
	    $roles = $rolesModel->findAll();
		$data = array(
			'title' => 'Users',
			'content' => 'Users/create',
			'message' => $message,
			'roles' => $roles,
		);	

		return view('Layouts',$data);
	}

	public function edit($id = null){

		if($this->session->has('logged_in') != 1){
			return redirect()->to(base_url('auth')); 
		}

		$UsersModel = new UsersModel;
		$user = $UsersModel->find($id);
		unset($user->password);
		
		$message = $this->session->getFlashdata('message');
	    $rolesModel = new RolesModel;
	    $roles = $rolesModel->findAll();
	    $user->role = $rolesModel->find($user->role_id);
		$data = array(
			'title' => 'Users',
			'content' => 'Users/edit',
			'message' => $message,
			'roles' => $roles,
			'user' => $user,

		);	

		return view('Layouts',$data);
	}

	//--------------------------------------------------------------------

}

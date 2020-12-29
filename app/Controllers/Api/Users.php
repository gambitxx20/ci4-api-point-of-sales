<?php namespace App\Controllers\Api;

use CodeIgniter\API\ResponseTrait; 
use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;
use CodeIgniter\Config\Config;

use CodeIgniter\I18n\Time;
date_default_timezone_set('Asia/Jakarta');
 
class Users extends ResourceController
{
    use ResponseTrait;
    protected $format = 'json';
    public function __construct(){
        $this->session = \Config\Services::session();
    }
    // get all product
    public function index()
    {
        $model = new UsersModel();
        $data = $model->join('roles','users.role_id = roles.id');
        $data = $data->select('roles.name as role_name');
        $data = $data->select('users.*')->findAll();

        foreach ($data as $d) {
            unset($d->password);
        }
        $response = [
            'data' => $data,
        ];
        return $this->respond($response, 200);
    }
 
    // get single product
    public function show($id = null)
    {
        $model = new UsersModel();
        $data = $model->getWhere(['id' => $id])->getResult();
        if($data){
            return $this->respond($data[0]);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }
 
    // create a product
    public function create()
    {   
        if($this->session->has('logged_in') != 1){
            $response = [
                'status'   => 403,
                'error'    => null,
                'messages' => [
                    'success' => 'Your Session Has Expired, Please Login Before Continue'
                ]
            ];
            return $this->respondCreated($response, $response['status']); 
        }

        $model = new UsersModel();

        $json =  $this->request->getJSON();
        $data = array(
        	'name' => $json->name,
            'username' => $json->username,
        	'password' => md5($json->password),
            'role_id' => $json->role_id,
        );

        $dataName = $model->where('username',$data['username'])->first();
        if ($dataName != null || $dataName != '') {
        	$response = [
        	    'status'   => 409,
        	    'error'    => 'error_duplicate',
        	    'messages' => [
        	        'success' => 'Duplicate Found for Username '.$data['username'],
        	    ]
        	];	
        }else{
        	//print_r($data);
        	$model->insert($data);
        	$response = [
        	    'status'   => 201,
        	    'error'    => null,
        	    'messages' => [
        	        'success' => 'User Created'
        	    ]
        	];	
        }

        $date = Time::createFromTimestamp(time(), 'utc');
        //echo $date->format('Y-m-d H:i:s');
         
        return $this->respondCreated($response, $response['status']);
    }
 
    // update product
    public function update($id = null)
    {
        $model = new UsersModel();
        $json = $this->request->getJSON();
       // print_r($json);
        if($json){
            $data = [
                'name' => $json->name,
                'password' => md5($json->password)
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'name' => $input['name'],
                'password' => md5($input['password'])
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
 
    // delete product
    public function delete($id = null)
    {
        $model = new UsersModel();
        if($this->session->has('logged_in') != 1){
            $response = [
                'status'   => 403,
                'error'    => null,
                'messages' => [
                    'success' => 'Your Session Has Expired, Please Login Before Continue'
                ]
            ];
            return $this->respondCreated($response, $response['status']); 
        }else{
            if (condition) {
                # code...
            }
        }
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
         
    }
 
}
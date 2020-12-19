<?php namespace App\Controllers\Api;

use CodeIgniter\API\ResponseTrait; 
use CodeIgniter\RESTful\ResourceController;
use App\Models\AuthModel;
use CodeIgniter\Config\Config;

use CodeIgniter\I18n\Time;
date_default_timezone_set('Asia/Jakarta');
 
class Authenticate extends ResourceController
{
    use ResponseTrait;
    protected $format = 'json';

    public function __construct(){
        $this->session = \Config\Services::session();
    }

    // create a product
    public function create()
    {
        $model = new AuthModel();
        

        $json =  $this->request->getJSON();
        $data = array(
        	'username' => $json->username,
        	'password' => md5($json->password)
        );
        $data = $model->getWhere($data)->getRow();
        if ($data != '' || $data != null) {
            # code...
            unset($data->password);
            

            //update last login
            $date = Time::createFromTimestamp(time(), 'utc');
            $data->last_login = $date->format('Y-m-d H:i:s');
            //echo 
            $data->updated = $data->updated;
            $model->update($data->id, $data);
            
            //saving session data
            $sessData = [
                'id'  => $data->id,
                'username'     => $data->username,
                'logged_in' => TRUE
            ];

            $this->session->set($sessData);
                
            $response = [
                'status'   => 200,
                'error'    => null,
                'data' => $data,
                'messages' => 'Login Success',
            ];
        }else{
            $response = [
                'status'   => 401,
                'error'    => null,
                'data' => $data,
                'messages' => 'Login Failed Incorrect Username / Password!',
            ];
        }  
        return $this->respondCreated($response, $response['status']);
    }

 
}
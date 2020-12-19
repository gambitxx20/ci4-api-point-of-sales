<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'users';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useTimestamps = true;
   protected $allowedFields = ['username','password','name','role_id','last_login','updated'];
   protected $createdField = 'created';
   protected $updatedField = 'last_login';
}
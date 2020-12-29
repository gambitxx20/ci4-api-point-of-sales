<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'users';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useTimestamps = true;
   protected $allowedFields = ['username','password','name','role_id','last_login'];
   protected $createdField = 'created';
   protected $updatedField = 'updated';

}
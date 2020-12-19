<?php namespace App\Models;
use CodeIgniter\Model;
class UsersModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'users';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useTimestamps = true;
   protected $allowedFields = ['name','password'];
   protected $createdField = 'u_date';
   protected $updatedField = 'u_update';
}
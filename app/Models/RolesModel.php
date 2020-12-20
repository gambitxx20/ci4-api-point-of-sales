<?php namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
   protected $DBGroup = 'default';
   protected $table = 'roles';
   protected $primaryKey = 'id';
   protected $returnType = 'object';
   protected $useTimestamps = false;
   protected $allowedFields = ['name'];
}
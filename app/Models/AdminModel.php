<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 'email', 'password', 'profile_pic'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $returnType     = 'object';


}
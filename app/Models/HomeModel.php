<?php namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'author', 'title', 'slug', 'views', 'image', 'intro', 'body', 'published'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $returnType     = 'object';

}
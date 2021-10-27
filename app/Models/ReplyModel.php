<?php namespace App\Models;

use CodeIgniter\Model;

class ReplyModel extends Model
{
    protected $table = 'replies';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'post_id', 'comment_id', 'name', 'email', 'reply'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $returnType     = 'object';

}
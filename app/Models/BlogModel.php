<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
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

    public function limit($start,$per_page)
    {
        $cmdtext = "SELECT  * FROM `posts` WHERE `published`='YES' ORDER BY created_at DESC LIMIT $start, $per_page";

        $query = $this->db->query($cmdtext)->getResult();

        return $query;
    }

    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()->where(['slug' => $slug])->first();
    }

    public function getComments($id)
    {
        $cmdtext = "SELECT * FROM `comments` WHERE post_id = $id ORDER BY created_at DESC";
        $result = $this->db->query($cmdtext)->getResult();

        return $result;
    }

    public function getUsernameById($id){
        $cmdtext = "SELECT `name` FROM `comments` WHERE post_id = '$id' ";
        $result = $this->db->query($cmdtext)->getRow();

        return $result;
    }

    public function getRepliesByCommentId($a,$b)
    {
        $cmdtext = "SELECT * FROM `replies` WHERE `comment_id` = $a AND `post_id` = $b";
        $result = $this->db->query($cmdtext)->getResult();

        return $result;
    }
}
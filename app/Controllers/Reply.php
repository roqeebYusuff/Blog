<?php namespace App\Controllers;

class Reply extends BaseController
{
    function __construct()
    {
        $this->replyModel = model('App\Models\ReplyModel');
    }

    public function saveReply()
    {
        $data = $this->request->getPost();

        $res = $this->replyModel->save($data);

        if($res)
        {
            echo 'success';
        }

        else{
            echo $res;
        }
    }
}
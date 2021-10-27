<?php namespace App\Controllers;

class Comment extends BaseController
{
    function __construct()
    {
        $this->CommentModel = model('App\Models\CommentModel');
    }

    public function saveComment()
    {
        $data = $this->request->getPost();

		$res = $this->CommentModel->save($data);

        if($res)
        {

            $result = $this->CommentModel->get()->getLastRow('array');

            $dat['status'] = 'success';

            $dat['comment'] = '<header class="comment-header">
				<img src="assets/img/p.png" alt="" class="profile-pic" width="50px" height="50px"/>
				<div class="comment-author"><div class="comment-name">'.$result['name'].'</div>
				<div class="comment-date">'.date('d F, Y', strtotime($result['created_at'])).' at '.date('h:i a', strtotime($result['created_at'])).'</div></div>
			</header>

			<div class="comment-content">
				<p>'.$result['comment'].'</p>
				<i class="fas fa-reply reply-btn" data-id="'.$result['id'].'"></i><i>Reply to '.$result['name'].'</i>
			</div>';
            
			echo json_encode($dat);
		}

        else
        {
			echo $res;
		}
    }
}
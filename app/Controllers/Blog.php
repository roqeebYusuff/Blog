<?php namespace App\Controllers;

class Blog extends BaseController
{
	function __construct()
	{
		$this->model = model('App\Models\BlogModel');	
	}
	
	public function index()
	{
		if(isset($_GET['page'])){
			$pageno=$_GET['page'];
		}

		else{
			$pageno=1;
		}
		$uri = $this->request->uri;
		// echo $uri;
		$test = $uri->getSegment(2);
		//number of posts to be displayed on a page
		$post_per_page= 12;
		
		$calc=($pageno) * $post_per_page;

		$start = $calc - $post_per_page;
	
		$all = $this->model->limit($start,$post_per_page);
		
		$nrows = $this->model->countAll();
		$data['posts'] = $all;
		$data['number_rows'] = $nrows;

        echo view('layout/header');
        echo view('layout/nav');
        echo view('blog/new',$data);
        echo view('blog/pagination');
        echo view('layout/footer');		
	}

	public function view($slug = null)
	{
		$data['post'] = $this->model->getNews($slug);

		$post_id = ($data['post']['id']);
		// $post_id=1;

		if(empty($data['post']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the blog item: '.$slug);
		}

		if(!empty($data['post']))
		{
			// Get all comments
			$data['comments'] = $this->model->getComments($post_id);

			//Get all replies to each comment


			if(!empty($data['comments']))
			{
				$data['username'] = $this->model->getUsernameById($post_id);

				$comment_id = 1;
				$data['replies'] = $this->model->getRepliesByCommentId($comment_id,$post_id);
			}
			
		}

		echo view('layout/header');
        echo view('layout/nav');
        echo view('blog/view',$data);
        echo view('layout/footer');			
	}

	public function create()
	{
		if($this->request->getMethod() === 'post')
		{
			
			$data = $this->request->getPost();

			$data['slug'] = url_title($this->request->getPost('title'), '-', TRUE);

			$n = $this->model->save($data);


			if($n)
			{
				echo 'Success';
			}

			else
			{
				echo 'Error';
			}
		}

		else
		{
			echo view('layout/header');
			echo view('layout/nav');
			echo view('blog/create');
			echo view('layout/footer');
		}
	}

}

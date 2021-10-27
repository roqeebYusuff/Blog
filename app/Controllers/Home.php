<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct()
	{
		$this->Model = model('App\Models\HomeModel');		
	}
	public function index()
	{
		
		$all = $this->Model->where('published','YES')->orderBy('created_at','DESC')->findAll();

		if($all)
		{
			$data['result'] =  $all;
		}

		else
		{
			$data['result'] =  'Error';
		}

		echo view('layout/header');
		echo view('home/index',$data);
		echo view('layout/footer');
	}
}

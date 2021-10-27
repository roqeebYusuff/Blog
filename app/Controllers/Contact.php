<?php namespace App\Controllers;

Class Contact extends BaseController
{
    public function index()
    {
        echo view('layout/nav');
        echo view('layout/header');
        echo view('contact/index');
        echo view('layout/footer');
    }

    public function sendmail()
	{
		$from = $this->request->getVar('email');
        $subject = $this->request->getVar('subject');
		$message = $this->request->getVar('message');
		$name = $this->request->getVar('name');
		
		$email = \Config\Services::email();

		$email->setTo('roqeebyusuff001@gmail.com', 'Mail sent Via Codeigniter 4 Email');
		$email->setFrom($from);

		$email->setSubject($subject);

		$email->setMessage($message.' '.$name);
		
		if($email->send()){	
			echo "success";
		}else{
			$data =  $email->printDebugger(['headers']);
			echo "error";
		}
	}
}
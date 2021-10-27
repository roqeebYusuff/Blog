<?php namespace App\Controllers;

Class About extends BaseController
{
    public function index()
    {
        echo view('layout/nav');
        echo view('layout/header');
        echo view('about/index');
        echo view('layout/footer');
    }
}
<?php
namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['title' => 'Home','name' => 'Matheus']);
    }

    public function sair()
    {
        $this->view('/login', ['title' => 'Home']);
    }
}

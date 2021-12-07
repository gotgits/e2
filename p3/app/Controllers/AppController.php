<?php

namespace App\Controllers;

class AppController extends Controller
{
    public function index()
    {
        return $this->app->view('index');
    }
}
<?php

namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        return $this->app->view('index');
    }
    public function contact()
    {
        return $this->app->view('contact', ['email' => 'support@zipfoods.com']);
    }
    public function about()
    {
        return $this->app->view('about', ['about' => 'about...']);
    }
    // public function missing()
    // {
    //     return $this->app->view('/products/missing', ['missing' => 'products/missing']);
    // }
}
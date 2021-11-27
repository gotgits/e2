<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $begin = ['Begin', 'Start', 'Which Player Goes First'];
        
        return $this->app->view('index', [
            'begin' => $begin[array_rand($begin)]
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends AdminController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->setContent('home');
    }
}

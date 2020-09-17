<?php

namespace App\Controllers;

class PagesController
{

    public function index()
    {
        return view('home');
    }

    public function todo()
    {
        return view('todo');
    }

}
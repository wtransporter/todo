<?php

namespace App\Controllers;

class LoginController
{

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('auth.login');
    }

}
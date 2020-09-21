<?php

namespace App\Controllers;

class RegisterController
{

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('auth.register');
    }

}
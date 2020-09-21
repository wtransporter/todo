<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Session;

class LoginController
{

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        if (isLoggedIn()) {
            return redirect('home');
        }

        return view('auth.login');
    }

    public function login()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'errors' => []
        ];

        if (empty($data['email'])) {
            $data['errors']['email'] = 'E-mail must be filled out !';
        }

        if (empty($data['password'])) {
            $data['errors']['email'] = 'Password must be entered !';
        }

        $loginData = $data;
        unset($loginData['errors']);

        if (empty($data['errors'])) {
            $loggedInUser = App::get('database')->login('users', $loginData);

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
            } else {
                $data['errors']['email'] = 'Credentials do not match our database !';
                return view('auth.login', $data);
            }
        } else {
            return view('auth.login', $data);
        }
    }

    public function logout()
    {
        Session::destroy();

        return redirect('home');
    }

    public function createUserSession($user)
    {
        Session::put('user', $user->id);
        Session::put('user_name', $user->first_name .' '.$user->last_name);

        return redirect('todo-list');
    }
}
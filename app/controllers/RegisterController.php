<?php

namespace App\Controllers;

use App\Core\App;

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

    public function register()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'first_name' => trim($_POST['first_name']),
            'last_name' => trim($_POST['last_name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'errors' => []
        ];

        if (empty($data['first_name'])) {
            $data['errors']['first_name'] = 'First name is required !';
        }
        
        if (empty($data['last_name'])) {
            $data['errors']['last_name'] = 'Last name is required !';
        }
        
        if (empty($data['email'])) {
            $data['errors']['email'] = 'E-mail address is required !';
        }
        
        if (empty($data['password'])) {
            $data['errors']['password'] = 'Password is required !';
        }
        
        if (empty($data['confirm_password'])) {
            $data['errors']['confirm_password'] = 'Please confirm password !';
        } elseif ($data['password'] !== $data['confirm_password']) {
            $data['errors']['confirm_password'] = 'Password do not match !';
        }

        if (empty($data['errors'])) {
            //check if registered            

            if (App::get('database')->getByEmail($data['email'])) {
                $data['errors']['email'] = 'User already registered with provided e-mail address !';
                return view('auth.register', $data);
            } else {
                $userData = $data;
                unset($userData['confirm_password']);
                unset($userData['errors']);

                $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

                if (App::get('database')->save('users', $userData)){
                    $data['errors']['success'] = 'Successfuly registered !';
                    return redirect('login');
                }
            }
        } else {
            return view('auth.register', $data);
        }


    }

}
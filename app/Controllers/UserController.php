<?php

namespace App\Controllers;

use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class UserController extends BaseController
{
    protected $helpers = ['form'];

    function index()
    {
        // on form submission
        if ($this->request->is('post')) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = model('userModel');
            $user = $userModel->where('email', $username)->first();

            if ($user) {
                session()->set('user', $user);
                return redirect()->to('/');
            } else {

                $data = [
                    'formInfo' => 'invalid user',
                    'username' => $username,
                    'password' => $password,
                ];

                return view('loginView', $data);
            }
        }

        // default to login view
        return view('loginView');
    }

    function register()
    {
        $data = [
            'formData' => [],
            'info' => "",
        ];

        if ($this->request->is('post')) {

            // validation
            if (!$this->validateRegisterForm($_POST)) {
                $data['formData'] = $_POST;
                return view('registerView', $data);
            }

            // if user already exists.
            $userModel = model('userModel');
            $user =  $userModel->find($_POST['email']);
            if ($user) {
                $data['info'] = "user already exists";
                return view('registerView', $data);
            }

            $result =   $userModel->insert($_POST);
            $data['info']  = $result ?? "successfully registered";

            if (!$result) {
                return view('registerView', $data);
            }

            return redirect()->to('user');
        }

        return view('registerView', $data);
    }

    function logout()
    {
        session()->set('user', null);
        return redirect()->to('/');
    }

    function profile()
    {
        $props = [];

        $vehicleModel = model('vehicleModel');
        $vehicles =  $vehicleModel->findAll();

        $props['vehicles'] = $vehicles;

        return view('profileView', $props);
        // $user = session('user');
        // print_r(str_replace("\n", "<br>", json_encode($user, JSON_PRETTY_PRINT)));  
        // echo "<h1>display vehicle details and rental details for this user</h1>";
    }

    private function validateRegisterForm($post)
    {

        //form validation
        $rules = [
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'contact' => 'numeric|exact_length[10]|regex_match[/^0/]',
            'nic' => 'regex_match[/^\d{9}[Vv]$|^\d{12}$/]',
            'email' => 'valid_email',
            'password' => 'min_length[8]|regex_match[/^[a-zA-Z0-9!@#$%^&*()-_=+,.?;:]+$/]',
            'confirmPassword' => 'matches[password]',
        ];

        return $this->validate($rules, $post);
    }
}

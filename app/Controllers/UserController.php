<?php

namespace App\Controllers;

use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class UserController extends BaseController
{
    protected $helpers = ['form'];

    function index()
    {
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
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->withInput();
            }

            // if user already exists.
            $userModel = model('userModel');
            $user =  $userModel->where('email', $_POST['email']);
            if ($user) {
                session()->setFlashdata('info', "user already exists");
                return redirect()->back()->withInput();
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

    function login()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = db_connect();
        $builder = $db->table('users');

        $builder->select();
        $builder->where('email', $username);
        $builder->where('password', $password);
        $user = $builder->get()->getRowArray();

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

    function logout()
    {
        session()->set('user', null);
        return redirect()->to('/');
    }

    function profile()
    {
        $props = [];

        $vehicleModel = model('vehicleModel');
        $vehicles =  $vehicleModel->findAll(); // should be fixed 

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

        return $this->validateData($post, $rules);
    }
}

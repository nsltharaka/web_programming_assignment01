<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    protected $helpers = ['form'];

    function index()
    {
        // on form submission
        if ($this->request->is('post')) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = db_connect();
            $builder = $db->table('users');
            $query =  $builder
                ->where('email', $username)
                ->where('password', $password)
                ->get();

            $user = $query->getRow();

            if ($user) {
                session()->set('user', $user);
                return view('home');
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

        if ($this->request->is('post')) {
           // form validation
            // $rules = [
            //     'firstName' => 'alpha',
            //     'lastName' => 'alpha',
            //     'contact' => 'numeric|exact_length[10]|regex_match[/^0/]',
            //     'email' => 'valid_email',
            //     'password' => 'min_length[8]|regex_match[/^[a-zA-Z0-9!@#$%^&*()-_=+,.?;:]+$/]',
            //     'confirmPassword' => 'matches[password]',
            // ];

            // if (!$this->validate($rules, $_POST)) {
            //     return view('registerView', ['data' => $_POST]);
            // }

            // // insert the user
            // $userModel = model('userModel');
            // $result =  $userModel->save([
            //     'first_name' => $_POST['firstName'],
            //     'last_name' => $_POST['lastName'],
            //     'contact' => $_POST['contact'],
            //     'email' => $_POST['email'],
            //     'password' => $_POST['password'],
            // ]);

            // return view('registerView', ['info' => $result ? "insertion success" : "insertion failed"]);
            return view('registerView', ['info' => true]);
        }

        return view('registerView', ['info' => false]);
    }
}

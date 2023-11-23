<?php

namespace App\Controllers;

class LoginController extends BaseController
{

    function index()
    {
        return view('loginView');
    }

    function auth()
    {
        if ($this->request->getMethod() != 'post') {
            return;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = db_connect();
        $builder = $db->table('users');
        $builder
            ->where('email', $username)
            ->where('password', $password);

        $user = $builder->get()->getRow();

        if ($user) {
            return view('home');

        } else {
            $data['formInfo'] = 'invalid user';
            return view('loginView', $data);
        }
    }

    function register()
    {
        return "handle registration";
    }
}   

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
            $data['formInfo'] = 'invalid user';
            return view('loginView', $data);
        }
    }

    function register()
    {
        return "handle registration";
    }
}

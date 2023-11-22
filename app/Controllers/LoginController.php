<?php

namespace App\Controllers;

class LoginController extends BaseController
{

    function index()
    {
        return "show login form";
    }

    function auth($username, $password)
    {
        $db = db_connect();
        $builder = $db->table('users');
        $builder
            ->where('email', $username)
            ->where('password', $password);

        $user = $builder->get()->getRow();
        print_r(json_encode($user, JSON_PRETTY_PRINT));

        if ($user) {
            $homeController = new HomeController();
            echo $homeController->index();
        }else {
            // error msg?
        }

    }
}

<?php

namespace App\Controllers;

class Test extends BaseController
{
    public function index()
    {
        $userModel = model('UserModel');
        print_r($userModel->find(1));
    }
}

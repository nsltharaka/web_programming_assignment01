<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $vehicleModel = model('vehicleModel');
        $props['vehicles'] =  $vehicleModel->findAll(3);

        return view('homeView', $props);
    }
}

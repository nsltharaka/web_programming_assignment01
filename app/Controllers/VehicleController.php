<?php

namespace App\Controllers;

class VehicleController extends BaseController
{
    function new() {
        return view('vehicleForm');
    }
}

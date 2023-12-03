<?php

namespace App\Controllers;

class RentalController extends BaseController
{
    public function index(): string
    {
        return view('rentalForm');
    }

    function create() {
        echo "create a rental";
    }
}

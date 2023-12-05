<?php

namespace App\Controllers;

class RentalController extends BaseController
{
    public function index($vehicle_number): string
    {
        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($vehicle_number);

        return view('rentalForm', $vehicle);
    }

    function create()
    {
        $rentalModel = model('rentalModel');
        $rentalModel->insert($_POST, true);

        $builder = db_connect()->table('vehicle');
        $builder -> set('status', false);
        $builder -> where('vehicle_number', $_POST['vehicle_number']);
        $builder -> update();

        $id = str_replace('-', '', $_POST['from_date']) . str_replace('-', '', $_POST['vehicle_number']);

        session()->setFlashdata('info', $id);
        return view('rentalForm');
    }
}

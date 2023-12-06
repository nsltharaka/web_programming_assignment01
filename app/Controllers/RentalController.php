<?php

namespace App\Controllers;

class RentalController extends BaseController
{
    public function index($vehicle_number)
    {
        $currentUser = session()->has('user');
        if (!$currentUser) {
            return redirect()->to('user/rentals');
        }

        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($vehicle_number);

        return view('rentalForm', $vehicle);
    }

    function create()
    {
        $rentalModel = model('rentalModel');
        $id = str_replace('-', '', $_POST['from_date']) . str_replace('-', '', $_POST['vehicle_number']);
        $_POST['rental_id'] = $id;
        $rentalModel->insert($_POST, true);

        $builder = db_connect()->table('vehicle');
        $builder->set('status', false);
        $builder->where('vehicle_number', $_POST['vehicle_number']);
        $builder->update();


        session()->setFlashdata('info', $id);

        $username = session()->get('user')['user_id'];
        log_message('info', "{file} /create {$username} -> created a rent");
        return view('rentalForm');
    }
}

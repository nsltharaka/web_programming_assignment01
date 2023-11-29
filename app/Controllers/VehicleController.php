<?php

namespace App\Controllers;

class VehicleController extends BaseController
{
    protected $helpers = ['form'];

    function index()
    {
        $vehicleModel = model('vehicleModel');
        $vehicles = $vehicleModel->findAll();

        $props['vehicles'] = $vehicles;
        return view('vehicleView', $props);
    }

    function new()
    {
        $props = [
            'formData' => [],
            'info' => "",
        ];

        if ($this->request->is('post')) {

            // form validation
            if (!$this->validateFormData($_POST)) {
                $props['formData'] = $_POST;
                return view('vehicleForm', $props);
            }

            // check the vehicle is already exists
            $vehicleModel = model('vehicleModel');
            $vehicle = $vehicleModel->find($_POST['vehicle_number']);
            if ($vehicle) {
                $props['info'] = "vehicle already exists";
                return view('vehicleForm', $props);
            }

            // insert the vehicle and redirect
            $result = $vehicleModel->insert($_POST);
            if (!$result) {
                $props['info'] = "something went wrong, please try again later";
                return view('vehicleView', $props);
            }

            return redirect()->to('/');
        }

        return view('vehicleForm', $props);
    }

    function showVehicle($vehicle_id)
    {
        return $vehicle_id;
    }

    private function  validateFormData($post)
    {
        // validation rules
        $rules = [
            'vehicle_number' => 'regex_match[/^[A-Z]{2,3}-[0-9]{4}$/]',
            'brand' => 'alpha',
            'seats' => 'regex_match[/^[1-9]{1,2}$/]',
            'daily_rate' => 'regex_match[/^\d+(\.\d{2})?$/]',
        ];

        return $this->validate($rules, $post);
    }
}

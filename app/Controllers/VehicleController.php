<?php

namespace App\Controllers;

use PhpParser\Node\Expr\AssignOp\Mod;

class VehicleController extends BaseController
{
    // protected $helpers = ['form'];

    function index()
    {
        $vehicleModel = model('vehicleModel');
        $vehicles = $vehicleModel->where('status', TRUE) -> findAll();

        $props['vehicles'] = $vehicles;
        return view('vehicleView', $props);
    }

    function new()
    {
        $props = [
            'formData' => [],
            'action' => "new",
            'info' => "",
            'errors' => [],
        ];

        return view('vehicleForm', $props);
    }

    function view($vehicle_id)
    {
        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($vehicle_id);

        $props = [
            'formData' => $vehicle,
        ];

        return view('vehicleDetailsView', $props);
    }


    function create()
    {
        // form validation
        if (!$this->validateFormData("new")) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            $props['formData'] = $_POST;
            $props['action'] = "new";
            return view('vehicleForm', $props);
        }

        // check the vehicle is already exists
        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($_POST['vehicle_number']);
        if ($vehicle) {
            session()->setFlashdata('info', "vehicle already exists");
            return redirect()->back()->withInput();
        }

        // insert the vehicle and redirect
        $image = $this->request->getFile('image_url');
        if ($image->isValid() && !$image->hasMoved()) {
            $image->move('./images/cars', $image->getRandomName());
        }

        $username = session()->get('user')['user_id'];

        $_POST['image_url'] = $image->getName();
        $_POST['owner'] = $username;
        $_POST['status'] = $_POST['status'] ? true : false;
        $result = $vehicleModel->insert($_POST);
        if (!$result) {
            $props['info'] = "something went wrong, please try again later";
            return view('vehicleView', $props);
        }

        log_message('info', "{file} {$username} created a vehicle");

        return redirect()->to('/user/profile');
    }

    function update($vehicle_id)
    {
        $props = [
            'formData' => [],
            'action' => 'update',
            'info' => "",
        ];

        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($vehicle_id);

        if (!$this->validateFormData("update")) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $imageName = $vehicle['image_url'];
        $newVehicleImage = $this->request->getFile('image_url');
        if ($newVehicleImage->isValid() && !$newVehicleImage->hasMoved()) {
            unlink("./images/cars/$imageName");
            $imageName =  $newVehicleImage->getRandomName();
            $newVehicleImage->move('./images/cars', $imageName);
        }

        $_POST['image_url'] = $imageName;
        $_POST['status'] = isset($_POST['status']) ? 1 : 0;
        $result = $vehicleModel->update($vehicle_id, $_POST);
        if (!$result) {
            $props['info'] = "something went wrong, please try again later";
            return view('vehicleView', $props);
        }

        $username = session()->get('user')['user_id'];
        log_message('info', "{file} {$username} updated  a vehicle: {$vehicle_id}");
        return redirect()->to('/user/profile');
    }

    function delete($vehicle_id)
    {
        model('vehicleModel')->delete($vehicle_id);

        $username = session()->get('user')['user_id'];
        log_message('info', "{file} {$username} deleted a vehicle: {$vehicle_id}");
        return redirect()->to('user/profile');
    }

    function showVehicle($vehicle_id)
    {
        $props = [
            'formData' => [],
            'errors' => [],
            'action' => 'update',
            'info' => "",
        ];

        $vehicleModel = model('vehicleModel');
        $vehicle = $vehicleModel->find($vehicle_id);

        $props['formData'] = $vehicle;
        return view('vehicleForm', $props);
    }

    // function find()
    // {

    //     $db = db_connect();
    //     $query = $db->query("SELECT * FROM vehicle WHERE category LIKE {$_POST['category']} AND fuel_type LIKE {$_POST['fuel_type']} AND transmission_type LIKE {$_POST['transmission_type']} ");

    //     print_r($query); exit;

    //     // $props['vehicles'] = $vehicles;
    //     // return view('vehicleView', $props);
    // }

    private function  validateFormData($action)
    {
        // validation rules
        $rules = [
            'vehicle_number' => [
                'rules' => 'regex_match[/^[A-Z]{2,3}-[0-9]{4}$/]',
                'errors' => [
                    'regex_match' => "Vehicle Number should match the format : 'AAA-9999'"
                ],
            ],
            'seats' => [
                'rules' => 'regex_match[/^(?:[1-9]|[1-9][0-9])$/]',
                'errors' => [
                    'regex_match' => "seats field must be between 1-99"
                ]
            ],
            'daily_rate' => [
                'rules' => 'regex_match[/^\d+(\.\d{2})?$/]',
                'errors' => [
                    'regex_match' => "Daily Rate should match the format : '4999.99'"
                ]
            ],
            'image_url' => [
                'rules' => $action == 'update' ? "is_image[image_url]" : "uploaded[image_url]|is_image[image_url]",
                'errors' => [
                    'uploaded' => "Vehicle Image should be uploaded",
                    'is_image' => "uploaded file should be an image (.jpg, .jpeg, .png)"
                ],
            ]
        ];

        return $this->validate($rules);
    }
}

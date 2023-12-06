<?php

namespace App\Controllers;

use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class UserController extends BaseController
{
    protected $helpers = ['form'];

    function index()
    {
        log_message('info', "{file} /index --> login attempt");
        return view('loginView');
    }

    function register()
    {
        $data = [
            'formData' => [],
            'info' => "",
        ];

        if ($this->request->is('post')) {

            // validation
            if (!$this->validateRegisterForm($_POST)) {
                session()->setFlashdata('errors', $this->validator->getErrors());
                return redirect()->back()->back()->withInput();
            }

            // if user already exists.
            $db = db_connect();
            $builder = $db->table('users');

            $builder->select();
            $builder->where('email', $_POST['email']);
            $user = $builder->get()->getRowArray();

            if ($user) {
                session()->setFlashdata('info', "user already exists");
                return redirect()->back()->withInput();
            }

            $userModel = model('userModel');
            $userModel->insert($_POST);

            log_message('info', "{file} /register --> user created {$_POST['email']}");
            return redirect()->to('user');
        }

        return view('registerView', $data);
    }

    function login()
    {

        log_message('info', "{file} /login {$_POST['username']} tried to log in");

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = db_connect();
        $builder = $db->table('users');

        $builder->select();
        $builder->where('email', $username);
        $builder->where('password', $password);
        $user = $builder->get()->getRowArray();

        if ($user) {
            session()->set('user', $user);
            return redirect()->to('/');
            log_message('info', "{file} /login {$_POST['username']} login was successful");
        } else {

            $data = [
                'formInfo' => 'invalid user',
                'username' => $username,
                'password' => $password,
            ];

            log_message('info', "{file} /login {$_POST['username']} login was unsuccessful");
            return view('loginView', $data);
        }
    }

    function logout()
    {
        $username = session()->get('user')['user_id'];
        session()->set('user', null);
        log_message('info', "{file} /login {$username} logout was successful");
        return redirect()->to('/');
    }

    function profile()
    {
        $props = [
            'currentPage' => 'profile'
        ];

        $vehicleModel = model('vehicleModel');
        $vehicles =  $vehicleModel->findAll(); // should be fixed 

        $props['vehicles'] = $vehicles;

        $username = session()->get('user')['user_id'];
        log_message('info', "{file} /profile {$username} accessed profile ");
        return view('profileView', $props);
        // $user = session('user');
        // print_r(str_replace("\n", "<br>", json_encode($user, JSON_PRETTY_PRINT)));  
        // echo "<h1>display vehicle details and rental details for this user</h1>";
    }

    function rentals()
    {
        $props = [
            'currentPage' => 'rentals'
        ];

        $table = new \CodeIgniter\View\Table();
        $template = [
            'table_open' => '<table class="table-fill">',

            'thead_open'  => '<thead>',
            'thead_close' => '</thead>',

            'heading_row_start'  => '<tr>',
            'heading_row_end'    => '</tr>',
            'heading_cell_start' => '<th class="text-left">',
            'heading_cell_end'   => '</th>',

            'tfoot_open'  => '<tfoot>',
            'tfoot_close' => '</tfoot>',

            'footing_row_start'  => '<tr>',
            'footing_row_end'    => '</tr>',
            'footing_cell_start' => '<td >',
            'footing_cell_end'   => '</td>',

            'tbody_open'  => '<tbody>',
            'tbody_close' => '</tbody>',

            'row_end'    => '</tr>',
            'cell_start' => '<td>',
            'cell_end'   => '</td>',

            'row_alt_start'  => '<tr>',
            'row_alt_end'    => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end'   => '</td>',

            'table_close' => '</table>',
        ];

        $table->setTemplate($template);

        $db = db_connect();
        $query = $db->query("SELECT rental_id, vehicle_number, from_date, to_date, pickup_location, return_location, total_bill FROM rental");

        $props['table'] = $table->generate($query);

        $username = session()->get('user')['user_id'];
        log_message('info', "{file} /profile {$username} accessed rental table ");
        return view('profileView', $props);
    }


    private function validateRegisterForm($post)
    {

        //form validation
        $rules = [
            'first_name' => 'alpha',
            'last_name' => 'alpha',
            'contact' => 'numeric|exact_length[10]|regex_match[/^0/]',
            'nic' => 'regex_match[/^\d{9}[Vv]$|^\d{12}$/]',
            'email' => 'valid_email',
            'password' => 'min_length[8]|regex_match[/^[a-zA-Z0-9!@#$%^&*()-_=+,.?;:]+$/]',
            'confirmPassword' => 'matches[password]',
        ];

        return $this->validateData($post, $rules);
    }
}

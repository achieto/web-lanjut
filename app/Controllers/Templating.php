<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Templating extends BaseController
{
    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index() 
    {
        $data = [
            'title' => 'Blog - Admin'
        ];

        return view('v_admin');
    }

    public function register()
    {
        $data = [
            'title' => 'Blog - Register'
        ];

        return view('v_register', $data);
    }

    public function save()
    {
        $request = service('request');
        $data = [
            'fullname' => $request->getVar('fullname'),
            'email'    => $request->getVar('email'),
            'password' => $request->getVar('password'),
        ];
        $this->userModel->insert($data);
        return redirect()->to('/register');
    }
}

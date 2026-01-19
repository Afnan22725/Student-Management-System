<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController{

    public function __construct()
    {

        helper(['form']);
        $this->UsersModel = new UsersModel();

    }

    public function index(){



    }

    public function view_users()
    {

        $data['users'] = $this->UsersModel->getUsers();
        return view('layout/header').view('users/users',$data).view('layout/footer');

    }

    public function create_users(){

        if ($this->request->getVar('action') == 'Add') {

            $firstname = $this->request->getVar('firstname');
            $lastname = $this->request->getVar('lastname');
            $email = $this->request->getVar('email');
            $nic = $this->request->getVar('nic');
            $username = $this->request->getVar('username');
            $user_type = $this->request->getVar('user_type');
            $status = $this->request->getVar('status');
            $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

            $newData = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'nic' => $nic,
                'username' => $username,
                'user_type' => $user_type,
                'user_status' => $status,
                'password' => $password
            ];

            $result = $this->UsersModel->addUser($newData);
            if ($result) {
                echo "<script>alert('User created successfully');</script>";
            }else{
                echo "<script>alert('User creation unsuccessful');</script>";
            }

        }

        $data['user_types'] = $this->UsersModel->getUserTypes();
        return view('layout/header').view('users/user_create',$data).view('layout/footer');

    }

}
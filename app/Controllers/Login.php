<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController {

    public function __construct()
    {

        $this->loginModel = new LoginModel();

    }

    public function index(){

        if($this->request->getMethod() == 'POST'){

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $result = $this->loginModel->verifyEmail($email);
            if($result){
                //if($password == $result['password']){
                if(password_verify($password,$result['password'])){
                    //$x = session();
                    session()->set('logged_user', $result['user_id']);
                    session()->set('logged_user_type', $result['user_type']);
                    session()->set('logged_user_email', $result['email']);
                    session()->set('logged_user_firstname', $result['firstname']);
                    session()->set('logged_user_lastname', $result['lastname']);
                    return redirect()->to(base_url('dashboard'));
                }else{
                    echo "Wrong Password";
                }
            }else{
                echo "Username doesnot exist";
            }

        }

        return view('login/login');

    }

    public function logout(){

        /*session()->remove('logged_user');
        session()->remove('logged_user_type');
        session()->remove('logged_user_email');*/
        session()->destroy();
        return redirect()->to(base_url('login'));

    }


}
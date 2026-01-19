<?php

namespace App\Controllers;

class Profile extends BaseController{

    public function index(){

        return view('layout/header').view('profile/profile').view('layout/footer');

    }

}
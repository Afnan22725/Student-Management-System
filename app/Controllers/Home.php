<?php

namespace App\Controllers;
$session = \Config\Services::session();

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}

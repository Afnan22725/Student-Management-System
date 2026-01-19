<?php

namespace App\Controllers;

use App\Models\StudentsModel;

class Students extends BaseController{

    public function __construct()
    {
        helper(['form']);
        $this->studentsModel = new StudentsModel();
    }

    public function index(){
        return redirect()->to(base_url('students/view_students'));
    }

    public function view_students()
    {
        $data['students'] = $this->studentsModel->getStudents();
        return view('layout/header').view('students/students',$data).view('layout/footer');
    }

    public function create_student(){

        if ($this->request->getMethod() == 'POST') {

            $reg_no = $this->request->getVar('reg_no');
            $first_name = $this->request->getVar('first_name');
            $last_name = $this->request->getVar('last_name');
            $name_with_initials = $this->request->getVar('name_with_initials');
            $nic = $this->request->getVar('nic');

            $newData = [
                'reg_no' => $reg_no,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'name_with_initials' => $name_with_initials,
                'nic' => $nic
            ];

            $result = $this->studentsModel->addStudent($newData);
            if ($result) {
                session()->setFlashdata('success', 'Student created successfully');
                return redirect()->to(base_url('students/view_students'));
            }else{
                session()->setFlashdata('error', 'Student creation unsuccessful');
            }

        }

        return view('layout/header').view('students/student_create').view('layout/footer');

    }

}

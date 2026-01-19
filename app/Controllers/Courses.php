<?php

namespace App\Controllers;

use App\Models\CoursesModel;
use App\Models\StudentsModel;

class Courses extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->coursesModel = new CoursesModel();
        $this->studentsModel = new StudentsModel();
    }

    public function index()
    {
        return redirect()->to(base_url('courses/view_courses'));
    }

    public function view_courses(){

        $data['courses'] = $this->coursesModel->getCourses();
        return view('layout/header').view('courses/courses',$data).view('layout/footer');

    }

    public function create_course(){

        if ($this->request->getMethod() == 'POST') {

            $course_code = $this->request->getVar('course_code');
            $course_title = $this->request->getVar('course_title');
            $credits = $this->request->getVar('credits');

            $newData = [
                'course_code' => $course_code,
                'course_title' => $course_title,
                'credits' => $credits
            ];

            $result = $this->coursesModel->addCourse($newData);
            if ($result) {
                session()->setFlashdata('success', 'Course created successfully');
                return redirect()->to(base_url('courses/view_courses'));
            }else{
                session()->setFlashdata('error', 'Course creation unsuccessful');
            }

        }

        return view('layout/header').view('courses/course_create').view('layout/footer');

    }

    public function student_courses(){

        if ($this->request->getMethod() == 'POST') {

            $student_id = $this->request->getVar('student_id');
            $course_id = $this->request->getVar('course_id');

            $result = $this->studentsModel->enrollCourse($student_id, $course_id);
            if ($result) {
                session()->setFlashdata('success', 'Course assigned to student successfully');
            }else{
                session()->setFlashdata('error', 'Course assignment unsuccessful. Student may already be enrolled in this course.');
            }

            return redirect()->to(base_url('courses/student_courses'));

        }

        $data['students'] = $this->studentsModel->getStudents();
        $data['courses'] = $this->coursesModel->getCourses();
        $data['student_courses'] = $this->getStudentCoursesWithDetails();

        return view('layout/header').view('courses/student_courses',$data).view('layout/footer');
    }

    private function getStudentCoursesWithDetails(){

        $builder = $this->coursesModel->db->table('student_courses');
        $builder->join('students', 'students.student_id = student_courses.student_id');
        $builder->join('courses', 'courses.course_id = student_courses.course_id');
        $builder->select('students.reg_no, students.first_name, students.last_name, courses.course_code, courses.course_title');
        $query = $builder->get();
        return $query->getResultArray();

    }

}
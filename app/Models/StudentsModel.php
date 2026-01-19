<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model{

    public function getStudents(){

        $builder = $this->db->table('students');
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function getStudent($student_id){

        $builder = $this->db->table('students');
        $builder->where('student_id', $student_id);
        $query = $builder->get();
        if($query->getNumRows() == 1){
            return $query->getRowArray();
        }else{
            return false;
        }

    }

    public function addStudent($data){

        $builder = $this->db->table('students');
        $builder->insert($data);
        if($this->db->affectedRows() > 0){
            return $this->db->insertID();
        }else{
            return false;
        }

    }

    public function updateStudent($student_id, $data){

        $builder = $this->db->table('students');
        $builder->where('student_id', $student_id);
        $builder->update($data);
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function deleteStudent($student_id){

        $builder = $this->db->table('students');
        $builder->where('student_id', $student_id);
        $builder->delete();
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function getStudentCourses($student_id){

        $builder = $this->db->table('student_courses');
        $builder->join('courses', 'courses.course_id = student_courses.course_id');
        $builder->where('student_courses.student_id', $student_id);
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function enrollCourse($student_id, $course_id){

        $builder = $this->db->table('student_courses');
        $data = [
            'student_id' => $student_id,
            'course_id' => $course_id
        ];
        $builder->insert($data);
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function unenrollCourse($student_id, $course_id){

        $builder = $this->db->table('student_courses');
        $builder->where('student_id', $student_id);
        $builder->where('course_id', $course_id);
        $builder->delete();
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

}

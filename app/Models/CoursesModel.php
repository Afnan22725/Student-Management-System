<?php

namespace App\Models;

use CodeIgniter\Model;

class CoursesModel extends Model{

    public function getCourses(){

        $builder = $this->db->table('courses');
        $query = $builder->get();
        return $query->getResultArray();

    }

    public function getCourse($course_id){

        $builder = $this->db->table('courses');
        $builder->where('course_id', $course_id);
        $query = $builder->get();
        if($query->getNumRows() == 1){
            return $query->getRowArray();
        }else{
            return false;
        }

    }

    public function addCourse($data){

        $builder = $this->db->table('courses');
        $builder->insert($data);
        if($this->db->affectedRows() > 0){
            return $this->db->insertID();
        }else{
            return false;
        }

    }

    public function updateCourse($course_id, $data){

        $builder = $this->db->table('courses');
        $builder->where('course_id', $course_id);
        $builder->update($data);
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function deleteCourse($course_id){

        $builder = $this->db->table('courses');
        $builder->where('course_id', $course_id);
        $builder->delete();
        if($this->db->affectedRows() > 0){
            return true;
        }else{
            return false;
        }

    }

}

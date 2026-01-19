<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{

    public function verifyEmail($email){

        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $query = $builder->get();
        if($query->getNumRows() == 1){
            return $query->getRowArray();
        }else{
            return false;
        }

    }
}

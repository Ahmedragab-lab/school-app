<?php

namespace App\Repo;

use App\Models\Teacher;

class TeacherRepo implements TeacherInterface{
    public function getAllTeachers(){
        return Teacher::all();
    }
 }

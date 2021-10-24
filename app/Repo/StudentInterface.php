<?php
namespace App\Repo;

interface StudentInterface{


    public function Create_Student();
    public function get_classrooms($Grade_id);
    public function Get_sections($Classroom_id);
    public function Store_Student($request);

}

<?php
namespace App\Repo;

interface StudentInterface{

    public function Get_Student();
    public function Create_Student();
    public function get_classrooms($Grade_id);
    public function Get_sections($Classroom_id);
    public function Store_Student($request);
    public function Edit_Student($student);
    public function Update_Student($request);
    public function Delete_Student($id);

}

<?php
namespace App\Repo;

interface TeacherInterface{


    public function getAllTeachers();
    public function getSpeacialization();
    public function getGender();
    public function StoreTeachers($request);
    public function editTeachers($id);
    public function UpdateTeachers($request);
    public function DeleteTeachers($request);


}

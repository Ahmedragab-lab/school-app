<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeachers;
use App\Models\Gender;
use App\Models\Speacialization;
use App\Models\Teacher;
use App\Repo\TeacherInterface;
use Exception;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        // $Teachers = Teacher::all();
        return view('teachers.teachers',compact('Teachers'));
        // return 'hello';
    }

    public function create()
    {
        $genders = $this->Teacher->getGender();
        $specializations = $this->Teacher->getSpeacialization();
        return view('teachers.create',compact('genders','specializations'));
    }

    public function store(StoreTeachers $request){
        return $this->Teacher->StoreTeachers($request);
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $genders = $this->Teacher->getGender();
        $specializations = $this->Teacher->getSpeacialization();
        return view('teachers.Edit',compact('genders','specializations','Teachers'));
    }

    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }

    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentsRequest;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Repo\StudentInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;
    public function __construct(StudentInterface $Student)
    {
      $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->Get_Student();
    }


    public function create()
    {
        return $this->Student->Create_Student();
    }


    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->Store_Student($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function get_classrooms($Grade_id){
        return $this->Student->get_classrooms($Grade_id);
    }
    public function Get_sections($Classroom_id){
        return $this->Student->Get_sections($Classroom_id);
    }
}

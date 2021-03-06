<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $grades = Grade::with(['sections'])->get();
        $teachers = Teacher::all();
        return view('sections.index',compact('grades','sections','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Section $section)
    {
        $grades = Grade::with(['classrooms'])->get();
        $teachers = Teacher::all();
        return view('sections.create',compact('grades','section','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section=Section::create([
          'section_name'=> $request->name,
          'status'=>'1',
          'grade_id'=>$request->Grade_id,
          'class_id'=>$request->Class_id,
        ]);
        // $section = new Section();
        // $section->section_name = $request->name;
        // $section->status = '1';
        // $section->grade_id = $request->Grade_id;
        // $section->class_id = $request->Class_id;
        $section->save();
        $section->teachers()->attach($request->teacher_id);
        session()->flash('Add', 'create successfully');
        return redirect('sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $grades = Grade::with(['classrooms'])->get();
        $teachers = Teacher::all();
        return view('sections.edit',compact('grades','section','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section->update([
            'section_name'=> $request->name,
            'status'=>'1',
            'grade_id'=>$request->Grade_id,
            'class_id'=>$request->Class_id,
          ]);
          $section->save();
        //   $section->teachers()->attach($request->teacher_id);
          // update pivot tABLE
          if (isset($request->teacher_id)) {
            $section->teachers()->sync($request->teacher_id);
        } else {
            $section->teachers()->sync(array());
        }
        session()->flash('Edit', 'update successfully');
        return redirect('sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        session()->flash('Delete', 'delete successfully');
        return redirect('sections');
    }
    public function getclass($Grade_id)
    {
        $list_class = Classroom::where('grade_id',$Grade_id)->pluck('classname','id');
        return $list_class ;
    }
}

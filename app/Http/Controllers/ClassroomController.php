<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index',compact('classrooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('classrooms.create',compact('grades'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'class_list.*.classname'=>'required|unique:classrooms,classname',
            'class_list.*.grade_id'=>'required',
        ]);

        try{
            $class_lists = $request->class_list;
            foreach($class_lists as $class_list){

            $class = new Classroom();
            $class->classname = $class_list['classname'];
            $class->grade_id = $class_list['grade_id'];
            $class->save();
            }
            session()->flash('Add', 'create successfully');
            return redirect('classrooms');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }

    public function show(Classroom $classroom)
    {
        //
    }


    public function edit(Classroom $classroom)
    {
        $grades = Grade::all();
        return view('classrooms.edit', compact('grades','classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        // $request->validate([
        //     'classname'=>'required|unique:classrooms,classname',
        //     'grade_id'=>'required',
        // ]);

        try{
            $classroom->update($request->all());
            session()->flash('Edit', 'update successfully');
            return redirect('classrooms');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }

    public function destroy(Classroom $classroom)
    {
        try{
            $classroom->delete();
            session()->flash('Delete', 'deleted successfully');
            return redirect('classrooms');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }
    public function delete_all(Request $request){
        // return 'hi';
        $delete_all = explode(',', $request->delete_all_id);
        Classroom::whereIn('id',$delete_all)->delete();
        session()->flash('Delete', 'deleted successfully');
        return redirect('classrooms');
    }
}

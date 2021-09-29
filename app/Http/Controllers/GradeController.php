<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:grades,name',
        ]);

        try{
            $input = $request->all();
            Grade::create($input);
            session()->flash('Add', 'create successfully');
            return redirect('grades');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name'=>'required',
        ]);

        try{
            $input = $request->all();
            $grade->update($input);
            session()->flash('Edit', 'update successfully');
            return redirect('grades');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        try{
            $grade->delete();
            session()->flash('Delete', 'deleted successfully');
            return redirect('grades');
       } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }
}

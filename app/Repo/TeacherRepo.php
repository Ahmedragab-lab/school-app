<?php

namespace App\Repo;

use App\Models\Gender;
use App\Models\Speacialization;
use App\Models\Teacher;
// use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepo implements TeacherInterface{
    public function getAllTeachers(){
        return Teacher::all();
    }
    public function getSpeacialization(){
        return Speacialization::all();
    }
    public function getGender(){
        return Gender::all();
    }
    public function StoreTeachers($request){
        try {
                $Teachers = new Teacher();
                $Teachers->Email = $request->Email;
                $Teachers->Password =  Hash::make($request->Password);
                $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $Teachers->Specialization_id = $request->Specialization_id;
                $Teachers->Gender_id = $request->Gender_id;
                $Teachers->Joining_Date = $request->Joining_Date;
                $Teachers->Address = $request->Address;
                $Teachers->save();
                session()->flash('Add', 'create successfully');
                return redirect()->route('teachers.index');
            }catch (Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }
    public function editTeachers($id){
            return Teacher::findOrFail($id);
        }

    public function UpdateTeachers($request){
            try {
                $Teachers = Teacher::findOrFail($request->id);
                $Teachers->Email = $request->Email;
                $Teachers->Password =  Hash::make($request->Password);
                $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $Teachers->Specialization_id = $request->Specialization_id;
                $Teachers->Gender_id = $request->Gender_id;
                $Teachers->Joining_Date = $request->Joining_Date;
                $Teachers->Address = $request->Address;
                $Teachers->save();
                session()->flash('Edit', 'update successfully');
                return redirect()->route('teachers.index');
            }
            catch (Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
        }

    public function DeleteTeachers($request){
        Teacher::findOrFail($request->id)->delete();
        session()->flash('Delete', 'delete successfully');
        return redirect()->route('teachers.index');
    }
 }

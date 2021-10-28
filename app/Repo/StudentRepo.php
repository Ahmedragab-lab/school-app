<?php

namespace App\Repo;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class studentRepo implements StudentInterface{


    public function Get_Student(){
        $students= Student::all();
        return view('Students.index',compact('students'));
    }
    // create new student
    public function Create_Student(){
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        $data['my_classes'] = Grade::all();
        $data['parents'] = Myparent::all();
        return view('Students.add',$data);
    }
    public function get_classrooms($Grade_id){
        $list_classes = Classroom::where("grade_id", $Grade_id)->pluck("classname", "id");
        return $list_classes;
    }
    public function Get_sections($Classroom_id){
        $list_classes = Section::where("class_id", $Classroom_id)->pluck("section_name", "id");
        return $list_classes;
    }
    public function Store_Student($request){
        DB::beginTransaction();  // begin transaction
        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');
                    // insert in image_table
                    $images= new Image();
                    $images->filename       = $name;
                    $images->imageable_id   = $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // commit
            toastr()->success(trans('messages.success'));
            return redirect()->route('Students.index');
        }
        catch (\Exception $e){
            DB::rollback();  // rollback
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function Edit_Student($id){
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Type_Blood::all();
        $data['my_classes'] = Grade::all();
        $data['parents'] = Myparent::all();
        $student = Student::findOrFail($id);
        return view('Students.edit',$data , compact('student'));
    }

    public function Update_Student($request)
    {
        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Delete_Student($id){
        // Student::findOrFail($id)->delete();
        Student::destroy($id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.index');
    }

    public function Show_Student($id){

        $Student = Student::findorfail($id);
        return view('Students.show',compact('Student'));
    }
    public function Upload_attachment($request){

        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');
            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.show',$request->student_id);
    }
    public function Download_attachment($studentname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
       // Delete img in server disk
       Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);
       // Delete in data
       image::where('id',$request->id)->where('filename',$request->filename)->delete();
       toastr()->error(trans('messages.Delete'));
       return redirect()->route('Students.show',$request->student_id);
    }
 }

<?php
namespace App\Repo;

use App\Models\Fee;
use App\Models\Grade;

class FeesRepo implements FeesInterface{
    public function index(){
        $fees = Fee::all();
        $grades = Grade::all();
        return view('Fees.index',compact('grades','fees'));
    }
    public function create(){

        $Grades = Grade::all();
        return view('Fees.add',compact('Grades'));
    }
    public function store($request)
    {
        try {
            // dd($request);
            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->year  =$request->year;
            $fees->Fee_type  =$request->Fee_type;
            $fees->description  =$request->description;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Fees.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){

        $fee = Fee::findorfail($id);
        $Grades = Grade::all();
        return view('Fees.edit',compact('fee','Grades'));

    }

    public function update($request)
    {
        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type  =$request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}

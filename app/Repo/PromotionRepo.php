<?php
namespace App\Repo;

use App\Models\Grade;

class PromotionRepo implements PromotionInterface{
    public function index()
    {
        $Grades = Grade::all();
        return view('Students.promotion.index',compact('Grades'));
    }
}

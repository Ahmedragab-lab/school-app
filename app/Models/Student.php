<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;
    use SoftDeletes;
    public $translatable = ['name'];
    protected $guarded=[];

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id');
    }
    public function grade(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }
    public function Nationality(){
        return $this->belongsTo(Nationalitie::class,'nationalitie_id');
    }
    public function myparent(){
        return $this->belongsTo(Myparent::class,'parent_id');
    }
    public function images(){
        return $this->morphMany(Image::class , 'imageable');
    }

    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany(Student_Account::class, 'student_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

    public function genders(){
        return $this->belongsTo(Gender::class,'Gender_id');
    }
    public function specializations()
    {
        return $this->belongsTo(Speacialization::class,'Specialization_id');
    }
    public function Sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}

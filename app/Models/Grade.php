<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }
    public function sections(){
        return $this->hasMany(Section::class);
    }
}

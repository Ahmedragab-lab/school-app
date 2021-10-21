<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Speacialization extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    public $fillable = ['name'];
}

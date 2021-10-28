<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers;
Route::get('/', function () {
    return view('welcome');
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){
        Auth::routes();
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::group(['middleware' => ['auth']], function() {
           Route::resource('users',Controllers\UserController::class);
           Route::resource('roles',Controllers\RoleController::class);
           Route::resource('grades',Controllers\GradeController::class);
           Route::resource('classrooms',Controllers\ClassroomController::class);
           Route::post('delete_all',[Controllers\ClassroomController::class,'delete_all'])->name('delete_all');
           Route::resource('sections',Controllers\SectionController::class);
           Route::resource('cruds',Controllers\CrudController::class);
           Route::get('/classes/{Grade_id}',[Controllers\SectionController::class,'getclass']);
           Route::get('test', function () {
               return view('empty');
            });
//=======================================parent ==============================
           Route::view('parent', 'livewire.parent')->name('parent');
//=======================================teacher =============================
           Route::resource('teachers',Controllers\TeacherController::class);
//======================================= students ===========================
            Route::resource('Students',Controllers\StudentController::class);
            Route::get('Get_classrooms/{Grade_id}',[Controllers\StudentController::class,'get_classrooms']);
            Route::get('Get_sections/{Classroom_id}',[Controllers\StudentController::class,'Get_sections']);
            Route::post('Upload_attachment',[Controllers\StudentController::class,'Upload_attachment'])->name('Upload_attachment');
            Route::get('Download_attachment/{studentname}/{filename}',[Controllers\StudentController::class,'Download_attachment'])->name('Download_attachment');
            Route::post('Delete_attachment',[Controllers\StudentController::class,'Delete_attachment'])->name('Delete_attachment');

            Route::resource('Promotion',Controllers\PromotionController::class);
            
        });
    });

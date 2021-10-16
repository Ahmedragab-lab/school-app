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
           Route::view('parent', 'livewire.parent')->name('parent');
        });
    });

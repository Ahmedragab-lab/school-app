<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
           Route::resource('users',App\Http\Controllers\UserController::class);
           Route::resource('roles',App\Http\Controllers\RoleController::class);
           Route::resource('grades',App\Http\Controllers\GradeController::class);
           Route::resource('classrooms',App\Http\Controllers\ClassroomController::class);


        });
    });

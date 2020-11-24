<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', function () {return view('index');})
    -> name('index');

Route::get('index', function () {return view('index');})
    -> name('index');




/**************** Student routes *************************/
Route::get('student', 'StudentController@index')
    ->name('student');

Route::get('student/reg', 'StudentController@reg')
    ->name('student.reg');

/*************** Asistant routes *************************/
Route::get('asistent', 'AsistentController@index')
    ->name('asistent');

Route::get('asistent/profile', 'AsistentController@profile')
    ->name('asistent.profile');

Route::get('asistent/reg', 'AsistentController@reg')
    ->name('asistent.reg');

Route::get('asistent/test', 'AsistentController@test')
    ->name('asistent.test');



/*************** Profesor routes *************************/
Route::get('profesor', 'ProfesorController@index')
    ->name('profesor');

Route::get('profesor/show/{id}', 'ProfesorController@showTest');


/**************** Admin routes ***************************/
Route::get('admin', 'AdminController@index')
    ->name('admin');

Route::delete('user/delete/{id}', 'AdminController@delete');


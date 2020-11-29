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

Route::get('student/profile', 'StudentController@profile')
    ->name('student.profile');

Route::post('student/reg', 'StudentController@register');

Route::get('student/eval', 'StudentController@eval')
    ->name('student.eval');

Route::get('student/testfill/{id}', 'StudentController@testshow')
    ->name('student.testfill');

Route::post('student/testfill/{id}', 'StudentController@testfill');

/*************** Asistent routes *************************/
Route::get('asistent', 'AsistentController@index')
    ->name('asistent');

Route::get('asistent/eval', 'AsistentController@eval')
    ->name('asistent.eval');



/*************** Profesor routes *************************/
Route::get('profesor/', 'ProfesorController@index')
    ->name('profesor');

Route::get('profesor/show/{id}', 'ProfesorController@showTest')
    ->name('profesor.show');

Route::get('profesor/addqst/{id}', 'ProfesorController@addqst')
    ->name('profesor.addqst');

Route::get('profesor/addtest', 'ProfesorController@addtest')
    ->name('profesor.addtest');

Route::get('profesor/modify/{id}', 'ProfesorController@modifyqst')
    ->name('profesor.modifyqst');

Route::get('profesor/addans/{id}', 'ProfesorController@addans')
    ->name('profesor.addans');

Route::post('profesor/addtest', 'TestController@add')
    ->name('profesor.add');

Route::post('profesor/addqst/{id}', 'QuestionController@add')
    ->name('profesor.addToDB');

Route::post('profesor/addans/{id}', 'AnswerController@add')
    ->name('profesor.addAnsDB');

Route::delete('profesor/deleteQ/{id}', 'QuestionController@deleteQ')
    ->name('question.deleteQ');

Route::delete('profesor/deleteA/{id}', 'QuestionController@deleteA')
    ->name('question.deleteA');

/**************** Admin routes ***************************/
Route::get('admin', 'AdminController@index')
    ->name('admin');

Route::delete('user/delete/{id}', 'AdminController@delete');


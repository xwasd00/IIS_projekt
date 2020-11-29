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
Route::get('profesor/', 'ProfesorController@index')
    ->name('profesor');

Route::get('profesor/mytests', 'ProfesorController@mytests')
    ->name('profesor.mytests');

Route::get('profesor/profile', 'ProfesorController@profile')
    ->name('profesor.profile');

Route::get('profesor/show/{id}', 'ProfesorController@showTest', '{id}')
    ->name('profesor.show');

Route::get('profesor/addqst/{id}', 'ProfesorController@addqst', '{id}')
    ->name('profesor.addqst');

Route::get('profesor/addtest', 'ProfesorController@addtest')
    ->name('profesor.addtest');

Route::get('profesor/modify/{id}', 'ProfesorController@modifyqst', '{id}')
    ->name('profesor.modifyqst');

Route::get('profesor/addans/{id}', 'ProfesorController@addans', '{id}')
    ->name('profesor.addans');

Route::post('profesor/addtest', 'TestController@add')
    ->name('profesor.add');

Route::post('profesor/modifyqst/{id}', 'QuestionController@modify', '{id}')
    ->name('profesor.modifyqstDB');

Route::post('profesor/addqst/{id}', 'QuestionController@add', '{id}')
    ->name('profesor.addToDB');

Route::post('profesor/addans/{id}', 'AnswerController@add', '{id}')
    ->name('profesor.addAnsDB');

Route::delete('profesor/deleteQ/{id}', 'QuestionController@deleteQ', '{id}')
    ->name('question.deleteQ');

Route::delete('profesor/deleteA/{id}', 'QuestionController@deleteA', '{id}')
    ->name('question.deleteA');

/**************** Admin routes ***************************/
Route::get('admin', 'AdminController@index')
    ->name('admin');

Route::delete('user/delete/{id}', 'AdminController@delete');


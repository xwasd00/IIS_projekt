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


/**************** Admin routes ***************************/
Route::get('admin', 'AdminController@index')
    ->name('admin');


/*************** Asistant routes *************************/
Route::get('asistant', 'AsistantController@index')
    ->name('asistant');


/*************** Profesor routes *************************/
Route::get('profesor', 'ProfesorController@index')
    ->name('profesor');


/**************** Student routes *************************/
Route::get('student', 'StudentController@index')
    ->name('student');

/*

Route::get('/test_reg', function (){
    return view('student/test_reg');
}) -> name('test_reg');

Route::get('/my_tests', function (){
    return view('student/my_tests');
}) -> name('my_tests');

 */

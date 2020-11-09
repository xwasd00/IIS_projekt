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

Route::get('/', function () {
    return view('index');
}) -> name('index');

/////////////// Global routes ///////////////
Route::get('/profile', function () {
    return view('all/profile');
}) -> name('profile');

/////////////// Student routes ///////////////
Route::get('/student_menu', function () {
   return view( 'student/student_menu');
}) -> name('student_menu');

Route::get('/test_reg', function (){
    return view('student/test_reg');
}) -> name('test_reg');

Route::get('/my_tests', function (){
    return view('student/my_tests');
}) -> name('my_tests');

/////////////// Asistent routes ///////////////
Route::get('asist_menu', function (){
    return view('asistent/asist_menu');
}) -> name('asist_menu');

/////////////// Prof routes //////////////
Route::get('prof_menu', function (){
    return view('profesor/prof_menu');
}) -> name('prof_menu');
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

Route::get('/','CourseController@courseShow');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/contact', function () {
    return view('contact');
});

// หน้าแรกของ student
Route::group(['middleware' => ['auth']],function(){ Route::get('/home','HomeController@index');});
// หน้าแรกของ admin
Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/infor', 'admin\AdminController@index');
    });
});
// หน้าแรกของ tutor
// Route::group(['prefix' => 'tutor'],function(){
//     Route::group(['middleware' => ['tutor']], function(){
//         Route::get('/course', 'tutor\TutorController@index');
//     });
// });

Route::get('/course', 'CourseController@fillter');


Auth::routes(['verify' => true]);

// ต้อง login ก่อน ถึงจะเข้าได้
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/contact', 'LoginController@index')->$this->middleware('auth'); เจาะจง route

Route::get('/addCourse', function () {
    return view('addCourse');
});

Route::get('/course/add/check', 'CourseController@addCheck');


Route::get('/test', function () {
    return view('test');
});

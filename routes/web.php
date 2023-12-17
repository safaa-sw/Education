<?php

use Illuminate\Support\Facades\Route;

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
    return view('Home');
});

Route::resource('courses', 'CourseController');
Route::get('/course/userCourses', 'CourseController@getUserCourses')->name('getUserCourses');
Route::post('/course/joinCourse/{id}', 'CourseController@joinCourse')->name('joinCourse');
Route::post('/course/disJoinCourse/{id}', 'CourseController@disJoinCourse')->name('disJoinCourse');
  
Route::resource('profiles', 'ProfileController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

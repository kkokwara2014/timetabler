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
    return view('welcome');
});


Route::resource('students','StudentController');
Route::get('student/pdfexport/{id}','StudentController@pdfexport');
Route::get('student/pdfversion','StudentController@pdf');
Route::get('student/create','StudentController@create')->name('student.create');
Route::post('student/store','StudentController@store')->name('student.store');


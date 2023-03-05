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


Route::get('/', 'homeController@index');
Route::get('/home', 'homeController@redirects')->name('redirecthome')->middleware('auth','verified');


Route::post('/add_appointment', 'homeController@createappointment')->name('createappointment');
 Route::get('/myappointment', 'homeController@myappointment')->name('myappointment');
Route::get('/deleteappointment/{id}', 'homeController@deleteappointment')->name('deleteappointment');


/*-adminController-*/
Route::get('/add_doctor', 'adminController@adddoctor')->name('add_doctor');
Route::post('/upload_doctor', 'adminController@createdoctor')->name('createdoctor');
Route::get('/all_doctor', 'adminController@showdoctor')->name('showdoctor');
Route::get('/edit_doctor/{id}', 'adminController@editdoctor')->name('edit_doctor');
Route::post('/update_doctor/{id}', 'adminController@updatedoctor')->name('updatedoctor');
Route::get('/delete_doctor/{id}', 'adminController@deletedoctor')->name('delete_doctor');



Route::get('/all_appointment', 'adminController@showappointment')->name('showappointment');
Route::get('/approvedappointment/{id}', 'adminController@approvedappointment')->name('approvedappointment');
Route::get('/cancelappointment/{id}', 'adminController@cancelappointment')->name('cancelappointment');

Route::get('/emailview/{id}', 'adminController@emailview')->name('emailview');
Route::post('/sendemail/{id}', 'adminController@sendemail')->name('sendemail');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

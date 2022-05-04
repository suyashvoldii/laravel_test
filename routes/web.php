<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/','PagesController@index' );

Route::get('/about','PagesController@about' );

Route::get('/employee/{id}/{name}', 'PagesController@employee');

Route::get('/employee','EmployeeController@index' );

Route::get('/add_employee','EmployeeController@create');

Route::post('insert_employee','EmployeeController@insert');

Route::get('/edit_employee/{id}','EmployeeController@edit');

Route::put('/update_employee/{id}','EmployeeController@update');

Route::get('/delete_employee/{id}','EmployeeController@delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isadmin'])->group(function () {
Route::resource('posts', 'PostController');
});
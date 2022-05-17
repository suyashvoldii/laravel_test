<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ForgotPasswordcontroller;



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



//forgot password

Route::get('password/resets', 'ForgotPasswordcontroller@index')->name('password.request');
Route::post('pass_reset', 'ForgotPasswordcontroller@validatePasswordRequest');
Route::get('password/reseting/{token}', 'ForgotPasswordcontroller@resetPassword');
Route::post('password/reseting', 'ForgotPasswordcontroller@reset')->name('password.reseting');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

//Route::get('/subscribe', [SubscriberController::class, 'index']);

Route::get('/to_mail', [MailController::class,'index']);
Route::post('/send_mail', [MailController::class,'sendEmail'])->name('mail.send');

// Route::get('/employee/{id}/{name}', 'PostController@employee');


// Route::get('/employee','PostController@index' );

// Route::get('/add_employee','PostController@create');

// Route::post('insert_employee','PostController@insert');

// Route::get('/edit_employee/{id}','PostController@edit');

// Route::put('/update_employee/{id}','PostController@update');
        
// Route::get('/delete_employee/{id}','PostController@delete');

Route::middleware(['auth','isadmin'])->group(function () {
    Route::resource('posts', 'PostController');
});
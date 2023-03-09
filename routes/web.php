<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['guest']], function () {
        //register route
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.registration');

        Route::get('/login', 'loginController@show')->name('login.show');

        Route::post('/login', 'LoginController@login')->name('login.loginUser');
    });

    Route::group(['middleware' => ['auth']], function () {
        //logout
        Route::get('/logout', "LogoutController@logout")->name('logout');

        //branch
        Route::get('/branch', 'BranchController@index')->name('branch.index');
        Route::post('/create', 'BranchController@create')->name('branch.create');
        Route::get('/store', "BranchController@store")->name('branch.store');
        Route::get('/show', 'BranchController@show')->name('branch.show');
        Route::put('/edit', 'BranchController@edit')->name('branch.edit');
        Route::get('/update','BranchController@update')->name('branch.update');
        Route::get('/destory','BranchController@destroy')->name('branch.destory');

        // Route::resource('/',EmployeeController::class);

        //Employee

        Route::get('/employee', 'EmployeeController@index')->name('employee.index');

        Route::get('/create', 'EmployeeController@create')->name('employee.create');

        Route::get('/store', "EmployeeController@store")->name('employee.store');

        Route::get('/view', 'EmployeeController@show')->name('employee.show');

        Route::get('/edit', 'EmployeeController@edit')->name('employee.edit');

        Route::get('/update', 'EmployeeController@update')->name('employee.update');

        Route::get('/destory', 'EmployeeController@destroy')->name('employee.destory');
    });
});

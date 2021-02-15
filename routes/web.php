<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', "HomeController@index")->name('home');

Route::group(['namespace' => 'Auth'], function() {
    Route::get('login', "LoginController@index")->name('login');
    Route::post('login', "LoginController@login")->name('login.submit');
    Route::post('logout', "LoginController@logout")->name('logout');
});

Route::get('/projects/browse', 'Projects\ProjectController@index')->name('projects.browse');

Route::group(['middleware' => 'auth'], function() {


    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::group(['namespace' => 'Projects'], function() {
        Route::resource('projects', "ProjectController");

        Route::group(['prefix' => 'projects/{project}', 'as' => 'projects.'], function() {
            Route::resource('issues', 'IssuesController');
            Route::put('issues/{issue}/toggle', 'IssueStatusController@update')->name('issues.toggle');
        });
    });
});

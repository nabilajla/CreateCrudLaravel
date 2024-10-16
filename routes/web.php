<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
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

Route::get('/CRUD', function () {
    return view('CRUD');
});

// Route::resource('projects', "App\Http\Controllers\projectsController");
// Route::resource('project', "App\Http\Controllers\projectController");

Route::resource('Dashboard_1999/projects', "App\Http\Controllers\projectsController");
Route::resource('Dashboard_1999/articles', "App\Http\Controllers\articlesController");
Route::resource('Dashboard_1999/contact', "App\Http\Controllers\contactController");
Route::resource('Dashboard_1999/contacts', "App\Http\Controllers\contactsController");

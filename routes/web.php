<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/create', function () {
    return view('create');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/show', function () {
    return view('show');
});


Route::resource('resources', ResourceController::class);


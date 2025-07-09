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


//another page 
Route::get('/hello', function () {
    return view('hello');
});



Route::view('/test-csrf', 'test-csrf');

Route::post('/submit-form', function (Illuminate\Http\Request $request) {
    return 'Form submitted! Hello, ' . $request->input('name');
});


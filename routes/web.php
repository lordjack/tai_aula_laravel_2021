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
    return view('main');
});


Route::get('/teste', function () {
    return "<h3>Hello World Laravel</h3>";
});

Route::get('/principal', function () {
    return view("main");
});

Route::get('/contato', "App\Http\Controllers\ContatoController@index");


Route::get('/pai', function () {
    return view("layouts.app");
});

Route::get('/child', function () {
    return view("child");
});

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/turma', "App\Http\Controllers\TurmaController@index");
    Route::get('/turma/create', "App\Http\Controllers\TurmaController@create");
    Route::post('/turma/store', "App\Http\Controllers\TurmaController@store");
    Route::get('/turma/edit/{id}', "App\Http\Controllers\TurmaController@edit");
    Route::post('/turma/update/{id}', "App\Http\Controllers\TurmaController@update");
    Route::get('/turma/show/{id}', "App\Http\Controllers\TurmaController@show");
    Route::get('/turma/destroy/{id}', "App\Http\Controllers\TurmaController@destroy");
    Route::post('/turma/search/', "App\Http\Controllers\TurmaController@search");

    Route::get('/turma-relatorio', "App\Http\Controllers\TurmaController@gerarTurmaPDF");
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculBio;

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

Route::get('/', function() {
    return view('bio.form');
});

Route::get('/hola', function() {
    return view('hola');
});

Route::post('/biorritme', [CalculBio::class, "calcularBiorritme"]);
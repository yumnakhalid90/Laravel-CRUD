<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;

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

// In first parameter url page name then in second parameter your page name e.g inserRead // 

// insertData from form, Controller Name, function Name // 
// function insert : get data from form // 
Route::post('insertData', [mycontroller::class, 'insert']);
Route::get('/', [mycontroller::class, 'readdata']);

Route::get('update', [mycontroller::class, 'updateview']);

Route::get('updatedelete', [mycontroller::class, 'updateordelete']);

Route::get('updatedata', [mycontroller::class, 'update']);


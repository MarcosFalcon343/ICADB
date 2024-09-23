<?php

use Illuminate\Support\Facades\Route;

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
Route::view("/","index")->name("index");
Route::view("/customers","customers")->name("customers");
Route::view("/employees","employees")->name("employees");
Route::view("/events","events")->name("events");
Route::view("/facilities","facilities")->name("facilities");

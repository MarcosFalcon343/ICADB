<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ResourceTblController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EventRequestController;
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

// Auth

Route::get("/login", [AuthController::class, "loginForm"])->name("login.form");
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");


Route::group(["middleware" => "auth"], function () {
    //Auth
    Route::get("/register-customer", [AuthController::class, "registerFormCustomer"])->name("register-customer.form")->middleware('restrictRole:admin');
    Route::post("/register-customer", [AuthController::class, "registerCustomer"])->name("register-customer.create")->middleware('restrictRole:admin');
    Route::get("/register-employee", [AuthController::class, "registerFormEmployee"])->name("register-employee.form")->middleware('restrictRole:admin');
    Route::post("/register-employee", [AuthController::class, "registerEmployee"])->name("register-employee.create")->middleware('restrictRole:admin');
    // Index
    Route::get("/", [IndexController::class, "index"])->name("index");

    // Customers
    Route::get("catalogs/customers", [CustomerController::class, "index"])->name("customers.index")->middleware('restrictRole:admin');
    Route::get("customers/edit/{customer:CustNo}", [CustomerController::class, "edit"])->name("customers.edit")->middleware('restrictRole:admin');
    Route::put("customers/update/{customer:CustNo}", [CustomerController::class, "update"])->name("customers.update")->middleware('restrictRole:admin');
    Route::delete("customers/delete/{customer:CustNo}", [CustomerController::class, "destroy"])->name("customers.delete")->middleware('restrictRole:admin');

    // Employees
    Route::get("catalogs/employees", [EmployeeController::class, "index"])->name("employees.index")->middleware('restrictRole:admin');
    Route::get("employees/edit/{employee:EmpNo}", [EmployeeController::class, "edit"])->name("employees.edit")->middleware('restrictRole:admin');
    Route::put("employees/update/{employee:EmpNo}", [EmployeeController::class, "update"])->name("employees.update")->middleware('restrictRole:admin');
    Route::delete("employees/delete/{employee:EmpNo}", [EmployeeController::class, "destroy"])->name("employees.delete")->middleware('restrictRole:admin');

    // Facilities
    Route::get("catalogs/facilities", [FacilityController::class, "index"])->name("facilities.index")->middleware('restrictRole:admin');
    Route::post("facilities/create", [FacilityController::class, "store"])->name("facilities.store")->middleware('restrictRole:admin');
    Route::put("facilities/update/", [FacilityController::class, "update"])->name("facilities.update")->middleware('restrictRole:admin');
    Route::delete("facilities/delete/{facility:FacNo}", [FacilityController::class, "destroy"])->name("facilities.delete")->middleware('restrictRole:admin');

    // Locations
    Route::get("catalogs/locations", [LocationController::class, "index"])->name("locations.index")->middleware('restrictRole:admin');
    Route::post("locations/create", [LocationController::class, "store"])->name("locations.store")->middleware('restrictRole:admin');
    Route::put("locations/update/", [LocationController::class, "update"])->name("locations.update")->middleware('restrictRole:admin');
    Route::delete("locations/delete/{location:LocNo}", [LocationController::class, "destroy"])->name("locations.delete")->middleware('restrictRole:admin');

    // Resourses Tbl
    Route::get("catalogs/resources", [ResourceTblController::class, "index"])->name("resources.index")->middleware('restrictRole:admin');
    Route::post("resources/create", [ResourceTblController::class, "store"])->name("resources.store")->middleware('restrictRole:admin');
    Route::put("resources/update/", [ResourceTblController::class, "update"])->name("resources.update")->middleware('restrictRole:admin');
    Route::delete("resources/delete/{resourceTbl:ResNo}", [ResourceTblController::class, "destroy"])->name("resources.delete")->middleware('restrictRole:admin');

    // Events Request
    Route::get("events", [EventRequestController::class, "index"])->name("events.index")->middleware('restrictRole:admin');
});


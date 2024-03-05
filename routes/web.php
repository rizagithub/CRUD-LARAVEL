<?php

use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return view('layout.main');
});
Route::get('/home', function () {
    return view('layout.home');
});

// CRUD
Route::get('/students/add', function () {
    return view('students.formadd');
});
Route::resource('students', StudentsController::class);


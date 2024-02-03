<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\uploadController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\EditorController;
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
    return view('welcome');
});


Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/visimisi', function () {
    return view('visimisi');
});

Route::get('/contactUs', function () {
    return view('contact');
});

Route::get('/misi', function () {
    return view('misi');
});

Route::get('/register', [registerController::class, 'register'])->name('register');
Route::post('/register', [registerController::class, 'registerPost'])->name('register');

Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'loginPost'])->name('login');

Route::get('/admin', [adminController::class, 'adminDashboard'])->name('adminDashboard');
Route::get('/upload', [uploadController::class, 'upload'])->name('upload');

Route::post('/create', [EditorController::class, 'store'])->name('create');
Route::post('/upload', [EditorController::class, 'uploadImage'])->name('ckeditor.upload');

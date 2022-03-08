<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('index', [
        "title" => "Beranda"
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About",
        "nama" => "Nizar Ali Rifai",
        "email" => "nizarali@gmail.com",
        "gambar" => "Nizar.jpg"
    ]);
});

Route::get('/gallery', function () {
    return view('gallery', [
        "title" => "Gallery"
    ]);
});

// Route::resource('/contacts', ContactController::class);
Route::get('/contacts/create', [contactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [contactController::class, 'store'])->name('contacts.store');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacts/index', [contactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}/edit', [contactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacts/{id}/update', [contactController::class, 'update'])->name('contacts.update');
    Route::get('/contacts/{id}/destroy', [contactController::class, 'destroy'])->name('contacts.destroy');

});


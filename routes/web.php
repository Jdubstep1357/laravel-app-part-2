<?php

use App\Http\Controllers\ProfileController;
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

// Creating route only for logged in users
Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::group(['middleware' => ['is_admin']], function() {
    Route::resource(name: 'categories', controller: \App\Http\Controllers\CategoryController::class);
    // References newly created PostsController
    Route::resource(name: 'posts', controller: \App\Http\Controllers\PostController::class);
});

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// auth file allows registration/verification
require __DIR__.'/auth.php';



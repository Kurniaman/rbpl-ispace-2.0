<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('landingpage');
});
Route::get('/materi', function () {
    return view('pagemateri');
});
Route::get('/file', function () {
    return view('filepage');
});


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/materi', [PostController::class, 'index'])->name('post.index');
Route::post('/materi', [PostController::class, 'store'])->name('post.store');


Route::put('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/materi/post', [PostController::class, 'index'])->name('post.index');
Route::get('download/{id}',[PostController::class, 'download']);

Route::get('/page/{id}', [PostController::class, 'show'])->name('post.show');

Route::get('/materi/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/materi/cari',[PostController::class, 'cari']);

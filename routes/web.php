<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImageController;
use App\Models\Comentario;
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
    return view('principal');
});


Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store'])->name('register');

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/login',[LoginController::class, 'store'])->name('login');

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

// Rutas para los posts
Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');
Route::get('/post/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/post',[PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/post/{post}',[PostController::class, 'show'])->name('posts.show');

// Rutas para los comentarios
Route::post('/{user:username}/post/{post}',[Comentario::class, 'store'])->name('comentarios.store');


Route::post('/imagenes',[ImageController::class, 'store'])->name('imagenes.store');



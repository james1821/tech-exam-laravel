<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::view('/register', 'register')->name('register');
Route::view('/createpost', 'createpost')->name('createpost');
Route::view('/login', 'login')->name('login');
Route::view('/myinformation', 'myinformation')->name('myinformation');
Route::view('/update-user', 'updateinfo')->name('update-user');

Route::get('/', function () {
    $posts = auth()->check() ? auth()->user()->posts()->latest()->get() : [];
    return view('home', ['posts' => $posts]);
});


// UserControllers
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::put('/update-user', [UserController::class, 'update'])->name('user.update');

// PostControllers
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
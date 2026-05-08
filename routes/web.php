<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomePageController;

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

// Home Page
 
// route that will return a list of posts
Route::get('/home_page', [HomePageController::class, 'index'])->name('home_page.index');

// Posts

// route that will allow a user to create a contact
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// route that will delete a specific post
Route::delete('/posts/{post_id}', [PostController::class, 'destroy'])->name('posts.destroy');

// route that will show the edit form
Route::get('/posts/{post_id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// route that will proceess the updated values of the post
Route::put('/posts/{post_id}', [PostController::class, 'update'])->name('posts.update');

// route that will show the details of a specific post
Route::get('/posts/{post_id}', [PostController::class, 'show'])->name('posts.show');

//Comments

// route that will allow a user to create a contact
Route::get('/comments/{post_id}/create-comment', [CommentController::class, 'create'])->name('comments.create');

Route::post('/comments/{post_id}/store-comment', [CommentController::class, 'store'])->name('comments.store');

// route that will delete a specific comment
Route::delete('/comments/{comment_id}', [CommentController::class, 'destroy'])->name('comments.destroy');

// route that will show the details of a specific post
Route::get('/comments/{comment_id}', [CommentController::class, 'show'])->name('comments.show');

// route that will show the edit form
Route::get('/comments/{comment_id}/edit', [CommentController::class, 'edit'])->name('comments.edit');

// route that will proceess the updated values of the post
Route::put('/comments/{comment_id}', [CommentController::class, 'update'])->name('comments.update');

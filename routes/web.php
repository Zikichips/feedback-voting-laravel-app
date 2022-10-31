<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;

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
    return view('feedback.index', [
        'feedbacks' => Feedback::with('user')->latest()->get(),
        'comments' => Comment::with('user')->latest()->get()
    ]);
});

Route::resource('feedback', FeedbackController::class)
    ->only('show','store','update','destroy','edit')
    ->middleware('auth','verified');

Route::resource('comment', CommentController::class)
    ->only('show','store','update','destroy','edit')
    ->middleware('auth','verified');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

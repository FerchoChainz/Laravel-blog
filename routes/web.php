<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/questions/{question}', [QuestionController::class,'show'])->name('questions.show');

Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::post('/answers/{question}', [AnswerController::class,'store'])->name('answers.store');

Route::delete('/questions/${question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';

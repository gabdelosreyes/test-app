<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\StudentProfile\StudentSearch;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('student-profile/student-search', StudentSearch::class)
         ->name('student.search');
});

require __DIR__.'/settings.php';

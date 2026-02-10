<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\StudentProfile\StudentSearch;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\StudentProfile\StudentInformation;

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('student-profile/student-search', StudentSearch::class)->name('student.search');
    Route::get('student-profile/student-information/{studentNumber}', StudentInformation::class)->name('student.info');
});

require __DIR__.'/settings.php';

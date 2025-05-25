<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::view('/', 'index')->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

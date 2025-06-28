<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');
Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');

Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{id}', [AdminBlogController::class, 'show'])->name('admin.blogs.show');
Route::get('/admin/blogs/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{id}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{id}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');
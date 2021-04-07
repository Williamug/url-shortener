<?php

use App\Http\Controllers\ShortLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	});

Route::get('/dashboard', function () {
		return view('dashboard');
	})->middleware(['auth'])->name('dashboard');

require __DIR__ .'/auth.php';

// route for url shortener
Route::get('generate-shorten-link', [ShortLinkController::class , 'index'])->name('url-shortener');
Route::post('generate-shorten-link', [ShortLinkController::class , 'store'])->name('generate.shorten.link.post');
Route::get('/{code}', [ShortLinkController::class , 'shortenLink'])->name('shorten.link');
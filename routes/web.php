<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');
Route::get('/cv-print', [PortfolioController::class, 'printCv'])->name('cv.print');

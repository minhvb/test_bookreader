<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/search/book', [BookController::class, 'searchBook']);

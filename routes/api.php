<?php

use App\Http\Controllers\QuoteController;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use Illuminate\Support\Facades\Route;

Route::apiResource('/quotes', QuoteController::class)
    ->parameter('quotes', 'quote:uuid');

Route::get('/random', fn () => new QuoteResource(Quote::query()->inRandomOrder()->first()))->name('quotes.random');

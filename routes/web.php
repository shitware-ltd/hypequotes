<?php

use App\Models\Quote;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('quote', [
    'quote' => Quote::inRandomOrder()->first(),
]));

<?php

use App\Models\Quote;
use Illuminate\Support\Facades\Route;

Route::view('/', 'quote', [
    'quote' => Quote::inRandomOrder()->first(),
]);

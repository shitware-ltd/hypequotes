<?php

use App\Models\Quote;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('quote', [
    'quote' => Quote::inRandomOrder()->first(),
]))->name('index');

Route::redirect('/docs', 'https://bump.sh/jorqensen/doc/hype-quotes')->name('api.docs');

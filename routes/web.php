<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/locale/{locale}', function (string $locale): RedirectResponse {
    if (in_array($locale, ['en', 'id'], true)) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('locale.switch');

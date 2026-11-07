<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Models\ProfileSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

// Public Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Project Detail / Case Study
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Contact Form Submission (Protected by Rate Limiter)
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

// CV / Resume Download Route
Route::get('/cv', function (): RedirectResponse|StreamedResponse {
    $profile = ProfileSetting::current();

    if ($profile?->cv_file_path && Storage::disk('public')->exists($profile->cv_file_path)) {
        return Storage::disk('public')->download($profile->cv_file_path, 'Resume-Anang-Muhamad-Lutfi.pdf');
    }

    return redirect()->route('home')->with('info', 'CV sedang dalam proses pembaruan oleh pemilik portofolio.');
})->name('cv.download');

// Language Switcher Route
Route::get('/locale/{locale}', function (string $locale): RedirectResponse {
    if (in_array($locale, ['en', 'id'], true)) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('locale.switch');

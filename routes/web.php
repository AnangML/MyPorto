<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Models\Post;
use App\Models\ProfileSetting;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

// Public Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Project Detail / Case Study
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Blog Post / Article Detail
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('posts.show');

// Contact Form Submission (Protected by Rate Limiter & Honeypot)
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

// Fallback login named route for standard auth middleware
Route::get('/login', fn (): RedirectResponse => redirect()->route('admin.login'))->name('login');

// Dynamic XML Sitemap for Search Engines
Route::get('/sitemap.xml', function (): Response {
    $projects = Project::published()->orderBy('updated_at', 'desc')->get();
    $posts = Post::published()->orderBy('updated_at', 'desc')->get();

    return response()->view('sitemap', [
        'projects' => $projects,
        'posts' => $posts,
    ])->header('Content-Type', 'application/xml');
})->name('sitemap');

// Admin Panel CMS Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Profile Settings
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Projects Resource
        Route::resource('projects', AdminProjectController::class)->except(['show']);
        Route::post('/project-categories', [ProjectCategoryController::class, 'store'])->name('project-categories.store');
        Route::delete('/project-categories/{projectCategory}', [ProjectCategoryController::class, 'destroy'])->name('project-categories.destroy');
        Route::post('/technologies', [TechnologyController::class, 'store'])->name('technologies.store');
        Route::delete('/technologies/{technology}', [TechnologyController::class, 'destroy'])->name('technologies.destroy');

        // Skills Resource
        Route::resource('skills', SkillController::class)->except(['show']);

        // Experiences Resource
        Route::resource('experiences', ExperienceController::class)->except(['show']);

        // Trainings & Seminars Resource
        Route::resource('trainings', TrainingController::class)->except(['show']);

        // Articles & Blog Posts Resource
        Route::resource('posts', AdminPostController::class)->except(['show']);
        Route::post('/post-categories', [PostCategoryController::class, 'store'])->name('post-categories.store');
        Route::delete('/post-categories/{postCategory}', [PostCategoryController::class, 'destroy'])->name('post-categories.destroy');

        // Contact Messages Inbox
        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::patch('/messages/{message}/status', [ContactMessageController::class, 'updateStatus'])->name('messages.status');
        Route::delete('/messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
});

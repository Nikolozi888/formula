<?php

// Admin Controllers
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PhrasesController as AdminPhrasesController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProgramsController as AdminProgramsController;
use App\Http\Controllers\Admin\TagsController as AdminTagsController;
use App\Http\Controllers\Admin\VideosController as AdminVideosController;

// Public Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{post:slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('phrases', [PhraseController::class, 'index'])->name('phrases.index');
Route::get('phrase/{phrase:slug}', [PhraseController::class, 'show'])->name('phrases.show');

Route::get('programs', [ProgramsController::class, 'index'])->name('programs.index');
Route::get('program/{program:slug}', [ProgramsController::class, 'show'])->name('programs.show');

Route::get('videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('video/{video:slug}', [VideoController::class, 'show'])->name('videos.show');

Route::get('categories/{category:slug}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('tags/{tag:title}', [TagController::class, 'index'])->name('tags.index');

// Admin Login and Logout
Route::get('admin/login', [AdminProfileController::class, 'create'])->middleware('guest')->name('admin.login.create');
Route::post('admin/login', [AdminProfileController::class, 'store'])->middleware('guest')->name('admin.login.store');
Route::post('admin/logout', [AdminProfileController::class, 'destroy'])->middleware('auth')->name('admin.logout');

Route::middleware('admin')->group(function () {
    // Profile Edit
    Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');
    Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

    // Password Change
    Route::get('admin/password/edit', [UserController::class, 'edit'])->name('admin.password.edit');
    Route::post('admin/password/update', [UserController::class, 'update'])->name('admin.password.update');
});

Route::middleware('admin')->group(function () {
    // Admin Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // News
    Route::resource('admin/news', AdminNewsController::class)->except('show')->names('admin.news');

    // Phrases
    Route::resource('admin/phrases', AdminPhrasesController::class)->except('show')->names('admin.phrases');

    // Categories
    Route::resource('admin/categories', AdminCategoriesController::class)->except('show')->names('admin.categories');

    // Programs
    Route::resource('admin/programs', AdminProgramsController::class)->except('show')->names('admin.programs');

    // Tags
    Route::resource('admin/tags', AdminTagsController::class)->except('show')->names('admin.tags');

    // Videos
    Route::resource('admin/videos', AdminVideosController::class)->except('show')->names('admin.videos');

    // Admins
    Route::resource('admin/admins', AdminController::class)->except('show')->names('admin.admins');
});

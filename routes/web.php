<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminPhrasesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminProgramsController;
use App\Http\Controllers\AdminTagsController;
use App\Http\Controllers\AdminVideosController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{post:slug}', [NewsController::class, 'show']);

Route::get('phrases', [PhraseController::class, 'index']);
Route::get('phrase/{phrase:slug}', [PhraseController::class, 'show']);

Route::get('programs', [ProgramsController::class, 'index']);
Route::get('program/{program:slug}', [ProgramsController::class, 'show']);

Route::get('videos', [VideoController::class, 'index']);
Route::get('video/{video:slug}', [VideoController::class, 'show']);

Route::get('categories/{category:slug}', [CategoryController::class, 'index']);
Route::get('tags/{tag:title}', [TagController::class, 'index']);

Route::get('admin/login', [UserController::class, 'create'])->middleware('guest');
Route::post('admin/login', [UserController::class, 'store'])->middleware('guest');
Route::post('admin/logout', [UserController::class, 'destroy'])->middleware('auth');


Route::middleware('admin')->group(function () {
    // Profile Edit
    Route::get('admin/profile', [AdminProfileController::class, 'index']);
    Route::get('admin/profile/edit', [AdminProfileController::class, 'edit']);
    Route::patch('admin/profile', [AdminProfileController::class, 'update']);

    // Password Change
    Route::get('admin/password/edit', [UserController::class, 'edit']);
    Route::post('admin/password/update', [UserController::class, 'update']);
});


Route::middleware('admin')->group(function () {

    // Admin Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index']);

    // News
    Route::resource('admin/news', AdminNewsController::class)->except('show');

    // Phrases
    Route::resource('admin/phrases', AdminPhrasesController::class)->except('show');

    // // Categories
    Route::resource('admin/categories', AdminCategoriesController::class)->except('show');

    // // Programs
    Route::resource('admin/programs', AdminProgramsController::class)->except('show');

    // Tags
    Route::resource('admin/tags', AdminTagsController::class)->except('show');

    // Videos
    Route::resource('admin/videos', AdminVideosController::class)->except('show');

    // // Admins
    Route::resource('admin/admins', AdminController::class)->except('show');

});
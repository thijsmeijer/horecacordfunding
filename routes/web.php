<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestmentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile');

Route::post('/profile/update', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');

Route::resource('projects', ProjectsController::class);

Route::get('/profile/investments', [InvestmentsController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.investments');

Route::get('/profile/projects', [ProfileController::class, 'projects'])->middleware(['auth', 'verified'])->name('profile.projects');

Route::any('/profile/projects/{project}/edit', [ProjectsController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.projects.edit');

require __DIR__.'/auth.php';

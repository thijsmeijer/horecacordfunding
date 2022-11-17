<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvestmentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile');

Route::post('/profile/update', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');

Route::resource('projects', ProjectsController::class);

Route::get('/profile/investments', [InvestmentsController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.investments');

Route::get('/profile/projects', [ProfileController::class, 'projects'])->middleware(['auth', 'verified'])->name('profile.projects');

Route::get('/projects/{project}/investments/create', [InvestmentsController::class, 'create'])->middleware(['auth', 'verified'])->name('investments.create');
Route::post('/projects/{project}/investments', [InvestmentsController::class, 'store'])->middleware(['auth', 'verified'])->name('investments.store');

Route::resource('projects', ProjectsController::class)->except(['index']);

Route::get('/profile/projects/{project}/edit', [ProjectsController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.projects.edit');

require __DIR__ . '/auth.php';

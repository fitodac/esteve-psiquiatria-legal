<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Static\HomeController;
use App\Http\Controllers\Static\TeamController;
use App\Http\Controllers\Static\AboutController;
use App\Http\Controllers\Static\MediaController;
use App\Http\Controllers\Static\CookiesController;
use App\Http\Controllers\Static\ConceptsController;
use App\Http\Controllers\Static\XeristarController;
use App\Http\Controllers\Admin\AdminDashboardController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/conceptos', [ConceptsController::class, 'index'])->name('concepts');
Route::get('/sobre-hablemos', [AboutController::class, 'index'])->name('about');
Route::get('/situaciones-consultas', [MediaController::class, 'index'])->name('media');
Route::get('/comite', [TeamController::class, 'index'])->name('team');
Route::get('/xeristar', [XeristarController::class, 'index'])->name('xeristar');

Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::get('/politica-de-cookies', [CookiesController::class, 'index'])->name('cookies');



Route::get('/confirmacion-registro', function () {
	return Inertia::render('RegisterConfirmation');
})->name('register-confirmation');

Route::get('/confirmacion-email', function () {
	return Inertia::render('EmailConfirmation');
})->name('email-confirmation');

Route::post('/link-email-confirmation', function () {
	return Inertia::render('EmailLinkConfirmation');
})->name('link-email-confirmation');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');

	Route::get('podcasts', [AdminDashboardController::class, 'podcasts'])->name('admin.podcasts');
	Route::get('podcasts/create', [AdminDashboardController::class, 'createPodcasts'])->name('admin.create.podcasts');
	Route::get('podcasts/{id}', [AdminDashboardController::class, 'editPodcasts'])->name('admin.edit.podcasts');
	Route::post('podcasts', [AdminDashboardController::class, 'storePodcasts'])->name('admin.store.podcasts');
	Route::patch('podcasts/{id}', [AdminDashboardController::class, 'updatePodcasts'])->name('admin.update.podcasts');
	Route::delete('podcasts/{id}', [AdminDashboardController::class, 'destroyPodcasts'])->name('admin.destroy.podcasts');

	Route::get('videos', [AdminDashboardController::class, 'videos'])->name('admin.videos');
	Route::get('videos/create', [AdminDashboardController::class, 'createVideos'])->name('admin.create.videos');
	Route::get('videos/{id}', [AdminDashboardController::class, 'editVideos'])->name('admin.edit.videos');
	Route::post('videos', [AdminDashboardController::class, 'storeVideos'])->name('admin.store.videos');
	Route::patch('videos/{id}', [AdminDashboardController::class, 'updateVideos'])->name('admin.update.videos');
	Route::delete('videos/{id}', [AdminDashboardController::class, 'destroyVideos'])->name('admin.destroy.videos');
});


require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Route::get('/', [PublicController::class, 'home'] )->name('home');

Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'] )->name('category.show');

Route::get('/create/announcement', [AnnouncementController::class, 'createAnnouncement'] )->middleware('auth')->name('announcement.create');

Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'] )->name('announcement.show');

Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'] )->name('announcement.index');

//Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'] )->middleware('isRevisor')->name('revisor.index');

//Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'] )->middleware('isRevisor')->name('revisor.accept_announcement');

//Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'] )->middleware('isRevisor')->name('revisor.reject_announcement');

// Richiedi di diventare revisore
Route::get('/richiesta/revisione/', [RevisorController::class, 'becomeRevisor'] )->middleware('auth')->name('become.revisor');

//Rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'] )->name('make.revisor');

// Ricerca annuncio
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'] )->name('announcements.search');

//Cambio lingua
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'] )->name('set_language_locale');







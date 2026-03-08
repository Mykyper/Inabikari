<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscordController;

// Page d'accueil
Route::get('/', [DiscordController::class , 'simpleServerInfo'])->name('home');

// Page des membres (note: "membre" au singulier dans l'URL)
Route::get('/membre', [DiscordController::class , 'getMembres'])->name('membre');

// Données d'un membre pour le modal
Route::get('/membre-data/{id}', [DiscordController::class , 'getMembreData'])->name('membre.data');


// Page des activités (SANS CONTROLLER)
Route::view('/activites', 'activite')->name('activite');
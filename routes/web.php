<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerFiliere;
use App\Http\Controllers\ControllerEtudiant;

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
    return view('index');
});

// Route pour le filière
Route::post('/ajouterdefiliere', [ControllerFiliere::class, 'ajouterFiliere'])->name('ajout.filiere.action');
Route::get('/pagedefiliere', [ControllerFiliere::class, 'pageFiliere'])->name('page.filiere');
Route::get('/listedefiliere', [ControllerFiliere::class, 'liste_Filiere'])->name('page.liste.filiere');

// Route pour l'Etudiant
Route::get('/ajouteretudiant', [ControllerEtudiant::class, 'pageajout'])->name('page.ajout.etudiant');
Route::post('/ajouter-traitement-etudiant', [ControllerEtudiant::class, 'ajouterEtudiant'])->name('ajout.etudiant.action');
Route::get('/listetudiant', [ControllerEtudiant::class, 'pagealist_etudiant'])->name('page.liste.etudiant');

//Route pour supprimer
Route::delete('supprimeretudiant/{etudiant}', [ControllerEtudiant::class, 'supprimer_etudiant'])->name('supprimer.etudiant');

//Route pour modifier
Route::get('/modifieetudiant/{etudiant}', [ControllerEtudiant::class, 'modifier_etudiant'])->name('modifier.etudiant');
Route::post('/actionmodifieetudiant/{etudiant}', [ControllerEtudiant::class, 'modifier_etudiant_action'])->name('action.modifier.etudiant');
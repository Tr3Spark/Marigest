<?php

use App\Http\Controllers\AggiungiDatiCorsiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncorporandiVfp1Controller;
use App\Http\Controllers\IncorporandiNMRSController;
use App\Http\Controllers\ListaPersonaleCorsiController;
use App\Http\Controllers\GestionePersonaleCorsiController;
use App\Http\Controllers\AdminJuniorCorsiController;
use App\Http\Controllers\AdminCorsiController;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/standby', function (){
    return view('standby');
})->name('standby');


Route::prefix('/corsi')->group(function(){
    Route::prefix('/22-nmrs')->group(function() {
        Route::prefix('/admin')->group(function () {
            Route::get('home', [AdminCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdmin22NMRS');
            Route::get('/gestione-personale-corsi', [AdminCorsiController::class,'gestionePersonale'])->middleware('auth')->name('gestionePersonale22NMRS');
            Route::post('/gestione-personale-corsi', [AdminCorsiController::class,'modificaPermessi'])->middleware('auth')->name('gestionePersonale22NMRS');
            Route::get('aggiungi-dati-corsi', [AdminCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi22NMRS');
            Route::post('aggiungi-dati-corsi', [AdminCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdmin22NMRS');
            Route::get('schede-individuali', [AdminCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::post('schede-individuali', [AdminCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::get('scheda-allievo/{id}', [AdminCorsiController::class, 'downloadSchedaIndividuale'])->middleware('auth')->name('downloadScheda22NMRS');
            Route::get('/schede-riepilogative', [AdminCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative22NMRS');
            Route::get('modifica-dati-allievi/{id?}', [AdminCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDatiAdmin22NMRS');
            Route::post('modifica-dati-allievi/', [AdminCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievoAdmin');
            Route::prefix('/sezione-disciplinare')->group(function () {
                Route::get('/', [AdminCorsiController::class, 'sezioneDisciplinare'])->middleware('auth')->name('disciplinareAdmin');
                Route::get('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaInserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::post('inserisci-provvedimento-disciplinare', [AdminCorsiController::class, 'inserisciDisciplinare'])->middleware('auth')->name('inserisciDisciplinareAdmin');
                Route::get('modifica-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaModificaDisciplinare'])->middleware('auth')->name('modificaDisciplinareAdmin');
                Route::get('visualizza-provvedimento-disciplinare', [AdminCorsiController::class, 'paginaVisualizzaDisciplinare'])->middleware('auth')->name('visualizzaDisciplinareAdmin');
            });

            Route::get('sezione-sanitaria', [AdminCorsiController::class, 'sezioneSanitaria'])->middleware('auth')->name('sanitariaAdmin');
            Route::get('sezione-studi', [AdminCorsiController::class, 'sezioneStudi'])->middleware('auth')->name('studiAdmin');
        });
        Route::prefix('/adminJ')->group(function () {
            Route::get('home', [AdminJuniorCorsiController::class, 'view'])->middleware('auth')->name('homeCorsiAdminJunior22NMRS');
            Route::get('aggiungi-dati-corsi', [AdminJuniorCorsiController::class,'aggiungiDatiCorsi'])->middleware('auth')->name('aggiungidaticorsi22NMRS');
            Route::post('aggiungi-dati-corsi', [AdminJuniorCorsiController::class, 'inserimentoDati'])->middleware('auth')->name('inserimentoDatiAdminJunior22NMRS');
            Route::get('schede-individuali', [AdminJuniorCorsiController::class,'schedeIndividualiAllievi'])->middleware('auth')->name('schedeIndividuali22NMRS');
            Route::post('schede-individuali', [AdminJuniorCorsiController::class,'ricercaSchedaIndividuale'])->middleware('auth')->name('schedeIndividualiAdminJunior22NMRS');
            Route::get('/schede-riepilogative', [AdminJuniorCorsiController::class, 'schedeRiepilogative'])->middleware('auth')->name('schedeRiepilogative22NMRS');
            Route::get('modifica-dati-allievi/{id?}', [AdminJuniorCorsiController::class, 'modificaDatiAllievi'])->middleware('auth')->name('modificaDati22NMRS');
            Route::post('modifica-dati-allievi/', [AdminJuniorCorsiController::class, 'aggiornaDatiAllievo'])->middleware('auth')->name('aggiornaDatiAllievo');
        });
    });
});







/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */






require __DIR__.'/auth.php';

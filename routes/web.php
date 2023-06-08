<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommendeController;
use App\Http\Controllers\DetailsCommandeController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\LieuStockageController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\VenteController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/layout', function () {
    return view('layoute/layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/sabs', function () {
        return view('sabs');
    });
// Routes pour les categories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Routes pour les fournisseurs
Route::get('/fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index');
Route::get('/fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create');
Route::post('/fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');
Route::get('/fournisseurs/{fournisseur}', [FournisseurController::class, 'show'])->name('fournisseurs.show');
Route::get('/fournisseurs/{fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
Route::put('/fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');
Route::delete('/fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');

// Routes pour les medicaments
Route::get('/medicaments', [MedicamentController::class, 'index'])->name('medicaments.index');
Route::get('/medicaments/create', [MedicamentController::class, 'create'])->name('medicaments.create');
Route::post('/medicaments', [MedicamentController::class, 'store'])->name('medicaments.store');
Route::get('/medicaments/{Medicament}', [MedicamentController::class, 'show'])->name('medicaments.show');
Route::get('/medicaments/{Medicament}/edit', [MedicamentController::class, 'edit'])->name('medicaments.edit');
Route::put('/medicaments/{Medicament}', [MedicamentController::class, 'update'])->name('medicaments.update');
Route::delete('/medicaments/{Medicament}', [MedicamentController::class, 'destroy'])->name('medicaments.destroy');
// Routes pour les commandes
Route::get('/commandes', [CommendeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/create', [CommendeController::class, 'create'])->name('commandes.create');
Route::post('/commandes', [CommendeController::class, 'store'])->name('commandes.store');
Route::get('/commandes/{commande}', [CommendeController::class, 'show'])->name('commandes.show');
Route::get('/commandes/{commande}/edit', [CommendeController::class, 'edit'])->name('commandes.edit');
Route::put('/commandes/{commande}', [CommendeController::class, 'update'])->name('commandes.update');
Route::delete('/commandes/{commande}', [CommendeController::class, 'destroy'])->name('commandes.destroy');

// Routes pour les détails de commande
Route::get('/details-commande/create', [DetailsCommandeController::class, 'create'])->name('details_commande.create');
Route::post('/details-commande', [DetailsCommandeController::class, 'store'])->name('details_commande.store');
Route::get('/details-commande/{detailsCommande}/edit', [DetailsCommandeController::class, 'edit'])->name('details_commande.edit');
Route::put('/details-commande/{detailsCommande}', [DetailsCommandeController::class, 'update'])->name('details_commande.update');
Route::delete('/details-commande/{detailsCommande}', [DetailsCommandeController::class, 'destroy'])->name('details_commande.destroy');

// Routes pour les ventes
Route::get('/ventes', [VenteController::class, 'index'])->name('ventes.index');
Route::get('/ventes/create', [VenteController::class, 'create'])->name('ventes.create');
Route::post('/ventes', [VenteController::class, 'store'])->name('ventes.store');

Route::get('/ventes/{vente}', [VenteController::class, 'show'])->name('ventes.show');


Route::get('/ventes/{vente}/edit', [VenteController::class, 'edit'])->name('ventes.edit');
Route::put('/ventes/{vente}', [VenteController::class, 'update'])->name('ventes.update');
Route::delete('/ventes/{vente}', [VenteController::class, 'destroy'])->name('ventes.destroy');

Route::get('/search-medicament-autocomplete', [VenteController::class, 'searchMedicamentAutocomplete'])->name('searchMedicamentAutocomplete');


// Routes pour les emplacements
Route::get('/emplacements', [EmplacementController::class, 'index'])->name('emplacements.index');
Route::get('/emplacements/create', [EmplacementController::class, 'create'])->name('emplacements.create');
Route::post('/emplacements', [EmplacementController::class, 'store'])->name('emplacements.store');
Route::get('/emplacements/{emplacement}', [EmplacementController::class, 'show'])->name('emplacements.show');
Route::get('/emplacements/{emplacement}/edit', [EmplacementController::class, 'edit'])->name('emplacements.edit');
Route::put('/emplacements/{emplacement}', [EmplacementController::class, 'update'])->name('emplacements.update');
Route::delete('/emplacements/{emplacement}', [EmplacementController::class, 'destroy'])->name('emplacements.destroy');

// Route::get('/emplacements/{lieuStockageId}', [EmplacementController::class, 'getEmplacements']);
// Route::get('/lieu-stockage/{id}/emplacements', [EmplacementController::class,'getEmplacements'])->name('getEmplacementsByLieuStockage');
// Route::get('/emplacement/{lieuStockageId}', 'EmplacementController@getEmplacements')->name('emplacement.get');

// Route::get('/lieu-stockage/{lieuStockageId}/emplacements', 'EmplacementController@getEmplacements');
Route::get('/emplacements/{lieuStockageId}', [EmplacementController::class, 'getEmplacements']);

// Routes pour lieu stockage
Route::get('/lieux-stockage/{categorieId}', [LieuStockageController::class, 'getByCategorie']);
Route::get('/lieux-stockage/{lieuStockage}', [LieuStockageController::class, 'show'])->name('lieux_stockage.show');
Route::get('/lieu-stockage/{id}/emplacements', 'LieuStockageController@getEmplacements');

// Routes pour lieu inventaires
Route::get('/inventaires', [InventaireController::class, 'index'])->name('inventaires.index');

});

require __DIR__.'/auth.php';

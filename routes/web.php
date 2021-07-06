<?php

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
//pages
Route::get('/', 'pagesController@index')->name('index_path');
Route::get('Compte', 'pagesController@compte')->name('compte_path');
Route::get('Connexion', 'pagesController@connexion')->name('connexion_path');
Route::get('deconnexion', 'pagesController@deconnexion')->name('deconnexion_path');
Route::get('Cathegorie', 'pagesController@cathegorie')->name('cathegorie_path');
Route::get('Produit{idCathegorie}', 'pagesController@produit')->name('produit_path');
Route::get('detail{id}', 'pagesController@detailProduit')->name('detail_produit_path');
Route::get('Black Day', 'pagesController@black')->name('black_day_path');
Route::get('contact', 'pagesController@contact')->name('contact_path');
Route::get('A-Propos', 'pagesController@propos')->name('propos_path');
Route::get('/panier', 'pagesController@panier')->name('ajouter_panier_path');
Route::get('/souhait', 'pagesController@souhait')->name('ajouter_souhait_path');



Route::group(['middleware' => 'Connexion'], function () {
    //admin
    Route::get('/Administration', 'pagesController@administration')->name('index_admin_path');
    Route::get('/Collections', 'pagesController@collection')->name('collection_admin_path');
    Route::get('/Gerer les Produit', 'pagesController@produitAdmin')->name('produit_admin_path');
    Route::get('/Mon-panier', 'pagesController@monPanier')->name('mon_panier_path');
    Route::get('/Mes-souhaits', 'pagesController@mesSouhaits')->name('mes_souhaits_path');
    Route::get('/Couleur', 'pagesController@mesCouleurs')->name('mes_couleurs_path');
});



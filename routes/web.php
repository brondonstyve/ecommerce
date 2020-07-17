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
Route::get('/Compte', 'pagesController@compte')->name('compte_path');
Route::get('/Connexion', 'pagesController@connexion')->name('connexion_path');
Route::get('/Cathegorie', 'pagesController@cathegorie')->name('cathegorie_path');
Route::get('/Produit', 'pagesController@produit')->name('produit_path');


Route::group(['middleware' => 'Connexion'], function () {
    //admin
    Route::get('/Administration', 'pagesController@administration')->name('index_admin_path')->middleware('Connexion');
    Route::get('/Collections', 'pagesController@collection')->name('collection_admin_path');
    Route::get('/Gerer les Produit', 'pagesController@produitAdmin')->name('produit_admin_path');
    Route::get('/Detail de Produit', 'pagesController@detailProduit')->name('detail_produit_path');
});



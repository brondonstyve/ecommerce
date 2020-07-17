<?php

namespace App\Http\Controllers;

use App\models\collection;

class pagesController extends Controller

{

    public function index(){
        $title='Index';
        return view('pages/index',compact('title'));
    }

    public function compte(){
        $title='Compte';
        return view('pages/index',compact('title'));
    }

    public function connexion(){
        $title='Connexion';
        return view('pages/index',compact('title'));
    }

    public function cathegorie(){
        $title='Cathegorie';
        return view('pages/index',compact('title'));
    }

    public function produit(){
        $title='Produit';
        return view('pages/index',compact('title'));
    }





    //admin

    public function administration(){
        $title='Index';
        return view('administration/index',compact('title'));
    }

    public function collection(){
        $title='Collection';
        return view('administration/index',compact('title'));
    }

    public function produitAdmin(){
        $title='Produit';
        return view('administration/index',compact('title'));
    }




}

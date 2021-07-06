<?php

namespace App\Http\Controllers;

use App\Helpers\Collection as collectionHelper;
use App\Http\Requests\passePartout;
use App\models\commentaire;
use App\models\panier;
use App\models\souhait;

class pagesController extends Controller

{

    public function index(){
        $title='Index';
        $produit=collectionHelper::renduProduit('id','desc',50);
        return view('pages/index',compact('title','produit'));
    }

    public function compte(){
        $title='Compte';
        return view('pages/index',compact('title'));
    }

    public function connexion(){
        //return (bcrypt(123456));

        $title='Connexion';
        return view('pages/index',compact('title'));
    }

    public function cathegorie(){
        $title='Cathegorie';
        return view('pages/index',compact('title'));
    }

    public function produit($id){
        $title='Produit';
        $id_cathegorie=$id;
        return view('pages/index',compact('title','id_cathegorie'));
    }

    public function detailProduit($id){
        $title='Detail-Produit';
        $produit=collectionHelper::renduProduitUnique($id);
        $parrametre=(int)$id;

        $comment=commentaire::whereProduit($id)
        ->get();
        return view('pages/index',compact('title','produit','parrametre','comment'));
    }

    public function black(){
        $title='BlackDay';
        return view('pages/index',compact('title'));
    }

    public function contact(){
        $title='Contact';
        return view('pages/index',compact('title'));
    }

    public function propos(){
        $title='A-Propos';
        return view('pages/index',compact('title'));
    }

    public function panier(passePartout $request){
        if (auth()->guest()) {
            session()->flash('error_connexion','Veuillez vous connecter avant d\'enegistrer au panier. si vous n\'avez pas de compte, <a href="Compte">cliquez ici pour créer un.</a>.');
            return false;
        } else {
            $reponse=panier::whereCompteAndProduit(auth()->user()->id,$request->id)->get();
           if (sizeOf($reponse)>=1) {
               return 'existant';
           } else {
            $reponse=panier::create([
                'compte'=>auth()->user()->id,
                'produit'=>$request->id,
                'quantite'=>1,
            ]);
            if ($reponse) {
                $reponse=panier::join('produits','produits.id','=','paniers.produit')
                ->select('paniers.id','produits.nom','produits.prix','paniers.quantite','produits.image')
                ->where([
                    ['paniers.produit',$request->id]
                ])
                ->get();
                return $reponse;
            }
           }

        }

    }


    public function souhait(passePartout $request){
        if (auth()->guest()) {
            session()->flash('error_connexion','Veuillez vous connecter avant d\'enegistrer dvos souhaits. si vous n\'avez pas de compte, <a href="Compte">cliquez ici pour créer un.</a>.');
            return false;
        } else {
            $reponse=souhait::whereCompteAndProduit(auth()->user()->id,$request->id)->get();
           if (sizeOf($reponse)>=1) {
               return 'existant';
           } else {
            $reponse=souhait::create([
                'compte'=>auth()->user()->id,
                'produit'=>$request->id,
            ]);
            if ($reponse) {
                $reponse=souhait::join('produits','produits.id','=','souhaits.produit')
                ->select('souhaits.id','produits.nom','produits.prix','produits.image')
                ->where([
                    ['souhaits.produit',$request->id]
                ])
                ->get();
                return $reponse;
            }
           }

        }

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

    public function monPanier(){
        $title='MonPanier';
        return view('pages/index',compact('title'));
    }

    public function mesSouhaits(){
        $title='MesSouhaits';
        return view('pages/index',compact('title'));
    }


    public function deconnexion(){
        auth()->logout();
        return redirect()->route('connexion_path');
    }


}

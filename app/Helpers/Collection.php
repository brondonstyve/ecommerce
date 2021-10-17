<?php

namespace App\Helpers;

use App\models\collection as AppCollection;
use App\models\panier;
use App\models\produit;
use App\models\souhait;
use Illuminate\Support\Facades\DB;

class Collection{

    //collection
    public static function renduCollection($order,$type,$nbp){
        return AppCollection::orderBy($order,$type)
        ->whereStatut(true)
        ->paginate($nbp);
    }


    //collection decompte
    public static function renduCollectionCount($order,$type,$nbp,$colone){
        return DB::table('produits')
        ->join('collections','collections.id','=','produits.collection')
        ->select($colone,DB::raw('count(produits.id) as nombre'),'collections.id')
        ->orderBy($order,$type,$colone)
        ->groupBy('produits.id')
        ->paginate($nbp);
    }

    //collection de cathégorie
    public static function renduCollectionCathegorie(){
        return DB::table('produits')
        ->join('collections','collections.id','=','produits.collection')
        ->select(DB::raw('count(produits.id) as nombre,collections.nom,collections.id'))
        ->groupBy('collections.nom','collections.id')
        ->paginate(10);
    }


    //collection de marques
    public static function renduCollectionMarque(){
        return DB::table('produits')
        ->select(DB::raw('count(produits.id) as nombre'),'produits.marque')
        ->groupBy('produits.marque')
        ->paginate(10);
    }
    

    //produit

    //selection globale avec pagination
    public static function renduProduit($order,$type,$nbp){
        return produit::orderBy($order,$type)
        ->join('collections','collections.id','=','produits.collection')
        ->select('collections.nom as collection','produits.nom','produits.marque','produits.prix','produits.quantite','produits.statut','produits.image','produits.id','collections.id as id_col')
        ->orderBy('id','desc')
        ->paginate($nbp);
    }


    //selection globale par element avec pagination
    public static function renduProduitPar($order,$type,$nbp,$condition,$elementCond){
        return produit::orderBy($order,$type)
        ->join('collections','collections.id','=','produits.collection')
        ->where([
            ["produits.$condition","$elementCond"]
        ])
        ->select('collections.nom as collection','produits.nom','produits.marque','produits.quantite','produits.prix','produits.statut','produits.image','produits.id')
        ->orderBy('id','desc')
        ->paginate($nbp);
    }

    //selection unique

    public static function renduProduitUnique($id){
        return produit::join('collections','collections.id','=','produits.collection')
        ->select('collections.nom as collection','collections.id as id_col','produits.nom','produits.quantite','produits.marque','produits.prix','produits.statut','produits.image','produits.id')
        ->orderBy('id','desc')
        ->find($id);
    }

    public static function panier($id){
        return panier::join('produits','produits.id','=','paniers.produit')
        ->select('produits.id as id_produit','paniers.id as id_panier','produits.nom','produits.image','paniers.quantite','produits.prix')
        ->whereCompte($id)
        ->get();
    }

    public static function souhait($id){
        return souhait::join('produits','produits.id','=','souhaits.produit')
        ->select('produits.id as id_produit','souhaits.id as id_souhait','produits.nom','produits.image','produits.prix')
        ->whereCompte($id)
        ->get();
    }

    public static function ajouterAuPannier($id){

        if (auth()->guest()) {
            Flash::message('error_connexion','Session expirée! Veuillez vous connecter.');
            return redirect()->route('connexion_path');
        }

        $reponse=panier::whereCompteAndProduit(auth()->user()->id,$id)->get();
           if (sizeOf($reponse)>=1) {
               return false;
           } else {
            $reponse=panier::create([
                'compte'=>auth()->user()->id,
                'produit'=>$id,
                'quantite'=>1,
            ]);
            if ($reponse) {
                return true;
            } else {
                return 'error';
            }
            
        }
    } 


    public static function ajouterAuSouhait($id){

        if (auth()->guest()) {
            Flash::message('error_connexion','Session expirée! Veuillez vous connecter.');
            return redirect()->route('connexion_path');
        }

        $reponse=souhait::whereCompteAndProduit(auth()->user()->id,$id)->get();
           if (sizeOf($reponse)>=1) {
               return false;
           } else {
            $reponse=souhait::create([
                'compte'=>auth()->user()->id,
                'produit'=>$id,
            ]);
            if ($reponse) {
                return true;
            } else {
                return 'error';
            }
            
        }
    } 


}

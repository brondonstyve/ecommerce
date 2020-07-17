<?php

namespace App\Helpers;

use App\models\collection as AppCollection;
use App\models\produit;
use Illuminate\Support\Facades\DB;

class Collection{

    //collection
    public static function renduCollection($order,$type,$nbp){
        return AppCollection::orderBy($order,$type)->paginate($nbp);
    }


    //collection decompte
    public static function renduCollectionCount($order,$type,$nbp,$colone){
        return DB::table('produits')
        ->join('collections','collections.id','=','produits.collection')
        ->select($colone,DB::raw('count(produits.id) as nombre'),'collections.id')
        ->orderBy($order,$type)
        ->groupBy('produits.id')
        ->paginate($nbp);
    }

    //produit
    public static function renduProduit($order,$type,$nbp){
        return produit::orderBy($order,$type)
        ->join('collections','collections.id','=','produits.collection')
        ->select('collections.nom as collection','produits.nom','produits.marque','produits.prix','produits.statut','produits.image','produits.id')
        ->orderBy('id','desc')
        ->paginate($nbp);
    }

    public static function renduProduitPar($order,$type,$nbp,$condition,$elementCond){
        return produit::orderBy($order,$type)
        ->join('collections','collections.id','=','produits.collection')
        ->where([
            ["produits.$condition","$elementCond"]
        ])
        ->select('collections.nom as collection','produits.nom','produits.marque','produits.prix','produits.statut','produits.image','produits.id')
        ->orderBy('id','desc')
        ->paginate($nbp);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\passePartout;
use App\models\commande;
use App\models\livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commandeController extends Controller
{
    public function commandeClient(){
        $title='Commande';
        $commande=DB::table('commandes')
        ->join('produits','produits.id','commandes.produit')
        ->whereCompte(auth()->user()->id)
        ->select('commandes.montant','commandes.codeCom','commandes.created_at','produits.nom','commandes.adresse','commandes.status','commandes.montant_total','commandes.quantite')
        ->orderBy('commandes.created_at','desc')
        ->get();

        
        return view('pages/index',compact('title','commande'));
    }


    public function commandeAdmin(){
        $title='Commande';
        $commande=DB::table('commandes')
        ->join('produits','produits.id','commandes.produit')
        ->whereCompte(auth()->user()->id)
        ->select('commandes.montant','commandes.codeCom','commandes.created_at','produits.nom','commandes.adresse','commandes.status','commandes.montant_total','commandes.quantite')
        ->orderBy('commandes.created_at','desc')
        ->get();

        
        return view('administration/index',compact('title','commande'));
    }

    public function commandeAdminDetail(passePartout $request){
        $title='Details';

        $codeCom=decrypt($request->id);

        $commande=DB::table('commandes')
        ->join('produits','produits.id','commandes.produit')
        ->where([
            ['CodeCom',$codeCom]
            ])
            ->select('commandes.montant','commandes.codeCom','commandes.created_at','produits.nom','commandes.adresse','commandes.status','commandes.montant_total','commandes.quantite','commandes.livreur')
        ->get();

        foreach ($commande as $key => $value) {
            $idLivreur=$value->livreur;
            break;
        }

        if ($idLivreur!=null) {
            $livreur=livreur::join('comptes','comptes.id','livreurs.compte')
            ->select('livreurs.id','livreurs.compte','livreurs.localisation','livreurs.paye','livreurs.cni','comptes.nom','comptes.email')
            ->where(([
                ['livreurs.id',$idLivreur]
                ]))
            ->first();
        } else {
            $livreur=null;
        }
        
        
        
        return view('administration/index',compact('title','commande','livreur','codeCom'));
    }
}

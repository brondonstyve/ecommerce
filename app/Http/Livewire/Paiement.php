<?php

namespace App\Http\Livewire;

use App\models\panier;
use Livewire\Component;

class Paiement extends Component
{
    public function render()
    {
        return view('livewire.collection_page.paiement');
    }

    public function getCommandeProperty(){
        return panier::join('produits','produits.id','paniers.produit')
        ->select('paniers.quantite','produits.nom','produits.prix','paniers.id')
        ->whereCompte(auth()->user()->id)
        ->get();
    }


    public function ajouter($id){

        $qte=panier::whereId($id)->get('quantite')[0]->quantite;

        panier::whereId($id)
        ->update(
            [
                'quantite'=>$qte+1
            ]
            );
    }


    public function diminuer($id){

        $qte=panier::whereId($id)->get('quantite')[0]->quantite;

        if ($qte>1) {
        panier::whereId($id)
        ->update(
            [
                'quantite'=>$qte-1
            ]
            );
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Helpers\Collection as collectionHelper;
use App\models\panier;
use App\models\souhait as AppSouhait;
use Livewire\Component;

class Souhait extends Component
{

    public $paiement=false;

    public function render()
    {
        return view('livewire.collection_page.souhait');
    }

    public function getSouhaitProperty(){
        return AppSouhait::join('produits','produits.id','souhaits.produit')
        ->select('souhaits.quantite','produits.nom','produits.image','produits.prix','souhaits.id','produits.id as id_produit')
        ->whereCompte(auth()->user()->id)
        ->get();
    }

    public function getProduitProperty(){
        return CollectionHelper::renduProduit('id','desc',50);
    }

    public function ajouter($id){

        $qte=AppSouhait::whereId($id)->get('quantite')[0]->quantite;

        AppSouhait::whereId($id)
        ->update(
            [
                'quantite'=>$qte+1
            ]
            );
    }


    public function diminuer($id){

        $qte=AppSouhait::whereId($id)->get('quantite')[0]->quantite;

        if ($qte>1) {
            AppSouhait::whereId($id)
        ->update(
            [
                'quantite'=>$qte-1
            ]
            );
        }
    }

    public function supprimer($id){
        AppSouhait::destroy($id);
        $this->emitTo('addsouhait', 'refreshComponent');
    }


    public function panier($id){

        $reponse=panier::where([
            ['compte',auth()->user()->id],
            ['produit',$id]
        ])->first();


        if ($reponse) {
            session()->flash('error','Bien vouloir vérifié votre pannier <a href='.route("mon_panier_path").'>ici</a>. ce produit y figure déja.');
        }else{
            $reponse=panier::create([
                'compte'=>auth()->user()->id,
                'produit'=>$id,
                'quantite'=>1,
            ]);
            if ($reponse) {
                session()->flash('success','produit ajouté au panier avec succès! consultez votre panier <a href='.route("mon_panier_path").'>ici</a> ');

            }else{
            session()->flash('error','erreur lors de l\'enregistrement! veuillez reéssayer.');

            }
        }




    }

    public function payer(){
        $this->paiement=!$this->paiement;
    }

}

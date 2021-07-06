<?php

namespace App\Http\Livewire;

use App\Helpers\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ProduitsPage extends Component
{
    use WithPagination;

    public $select=9;
    public $selection=-1;
    public $marque;
    public $condition='collection'; 
    public $message; 



    public function getProduitProperty(){
        if ($this->selection==-1) {
            return Collection::renduProduit('id','desc',$this->select);
        }else{
            return Collection::renduProduitPar('id','desc',$this->select,$this->condition,$this->selection);
        }
    }

    public function getCathegorieProperty(){
        return Collection::renduCollectionCount('id','desc',10,'collections.nom');
    }

    public function getMarquesProperty(){
        return Collection::renduCollectionCount('id','desc',10,'produits.marque');
    }

    public function getVenteProperty(){
        return Collection::renduProduit('id','desc',6);
    }

    public function checkbox($id){
        $this->selection=$id;
        $this->condition='collection';
    }

    public function marque($id){
        $this->selection=$id;
        $this->condition='marque';
    }

    public function getAutreproduitProperty(){
            return Collection::renduProduit('id','desc',$this->select);
    }

    public function mount($id_cathegorie){
        if ($id_cathegorie!='s') {
            $this->selection=decrypt($id_cathegorie);
        }
    }

    public function detail($id){
        return redirect()->route('detail_produit_path',$id);
    }

    public function ajouterAuPannier($id,$nom){

        $reponse=Collection::ajouterAuPannier($id);

        if ($reponse==true) {
            $this->emitTo('pannier', 'refreshComponent');
            $this->message="Votre produit $nom a été ajouté au panier avec succés!<br> Consulter votre panier <a href='/Mon-panier'>ici</a>.";
            $this->dispatchBrowserEvent('AddPannier');
            
        } else {
            if ($reponse==false) {
                $this->message="Ce produit est déjà present dans votre panier!<br> Consulter votre panier <a href='/Mon-panier'>ici</a>";
                $this->dispatchBrowserEvent('AddPannier');
            } else {
                $this->message="Erreur le produit n'a pas pu être enregistré. Veuillez recommencer s'il vous plait";
                $this->dispatchBrowserEvent('AddPanier');
            }
            
        }
        
        
    }

    public function ajouterAuSouhait($id,$nom){

        $reponse=Collection::ajouterAuSouhait($id);

        if ($reponse==true) {
            $this->emitTo('addsouhait', 'refreshComponent');
            $this->message="Votre produit $nom a été ajouté à la liste de vos souhaits avec succés!<br> Consulter vos souhaits <a href='/Mes-souhaits'>ici</a>.";
            $this->dispatchBrowserEvent('AddPannier');
            
        } else {
            if ($reponse==false) {
                $this->message="Ce produit est déjà present dans votre liste de souhait!<br> Consulter vos souhait <a href='/Mes-souhaits'>ici</a>";
                $this->dispatchBrowserEvent('AddPannier');
            } else {
                $this->message="Erreur le souhait n'a pas pu être enregistré. Veuillez recommencer s'il vous plait";
                $this->dispatchBrowserEvent('AddPanier');
            }
            
        }
        
        
    }







    //
    public function render()
    {
        return view('livewire.collection_page.produits-page');
    }
}

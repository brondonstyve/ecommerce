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






    //
    public function render()
    {
        return view('livewire.collection_page.produits-page');
    }
}

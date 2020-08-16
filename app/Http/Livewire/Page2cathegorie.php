<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\Collection;
use Livewire\WithPagination;

class Page2cathegorie extends Component
{
    public $select=6;
    public $selection=-1;
    public $marque;

use WithPagination;

    public function render()
    {

        return view('livewire.collection_page.page2cathegorie');
    }

    public function getCathegorieProperty(){
        return Collection::renduCollection('id','desc',$this->select);
    }

    public function updatedSelect(){
        $this->resetPage();
    }

    public function getCathegoriesProperty(){
        return Collection::renduCollectionCount('id','desc',10,'collections.nom');
    }

    public function getVenteProperty(){
        return Collection::renduProduit('id','desc',6);
    }

     public function detail($id){
        return redirect()->route('detail_produit_path',$id);
    }

    public function lien($id_col){
        return redirect()->route('produit_path',$idCathegorie=encrypt($id_col));
    }
}

<?php

namespace App\Http\Livewire;

use App\Helpers\Collection;
use App\models\panier;
use Livewire\Component;

class Pannier extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];



    public function getPanierProperty(){
        try {
         $id=auth()->user()->id;
        } catch (\Throwable $th) {
            $id=0;
        }
 
         return Collection::panier($id);
     }

    public function remove($id){
        panier::destroy($id);
    }
    
    public function render()
    {
        return view('livewire.collection_page.pannier');
    }



}

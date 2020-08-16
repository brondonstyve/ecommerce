<?php

namespace App\Http\Livewire;

use App\Helpers\Collection;
use App\models\collection as AppCollection;
use App\models\panier;
use App\models\souhait;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.collection_page.header');
    }


    //

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

    public function getSouhaitProperty(){
        try {
         $id=auth()->user()->id;
        } catch (\Throwable $th) {
            $id=0;
        }

         return Collection::souhait($id);
     }

     public function getCathegorieProperty(){
         return AppCollection::get();
     }

     public function removeS($id){
        souhait::destroy($id);
    }


}

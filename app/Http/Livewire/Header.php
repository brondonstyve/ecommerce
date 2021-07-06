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


   
     public function getCathegorieProperty(){
         return AppCollection::get();
     }

     public function removeS($id){
        souhait::destroy($id);
    }


}

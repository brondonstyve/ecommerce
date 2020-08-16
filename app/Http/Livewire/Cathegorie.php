<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\Collection;
use Livewire\WithPagination;

class Cathegorie extends Component
{
    use WithPagination;

    public function getCathegorieProperty(){
       return Collection::renduCollection('id','desc',15);
    }


    public function render()
    {
        return view('livewire.collection_page.cathegorie');
    }


}

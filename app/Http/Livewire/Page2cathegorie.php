<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\Collection;
use Livewire\WithPagination;

class Page2cathegorie extends Component
{
use WithPagination;
    public $select=6;
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
}

<?php

namespace App\Http\Livewire;

use App\Helpers\Collection;
use Livewire\Component;

class Addsouhait extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function getSouhaitProperty(){
        try {
         $id=auth()->user()->id;
        } catch (\Throwable $th) {
            $id=0;
        }

         return Collection::souhait($id);
     }


    public function render()
    {
        return view('livewire.collection_page.addsouhait');
    }
}

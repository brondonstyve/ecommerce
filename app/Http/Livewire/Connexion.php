<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Connexion extends Component

{
    public $telephone;
    public $mdp;
    public $type='password';
    public $testeur=true;


    public function render()
    {
        return view('livewire.compte_connexion.connexion');
    }

    public function connexion(){
        $email=$this->telephone;
        $password=$this->mdp;

        $reponse=Auth::attempt(['email' => $email, 'password' => $password]);
        if ($reponse) {
           if (auth()->user()->type=='configureur') {
            return \redirect()->route('index_admin_path');
           }else {
            return \redirect()->route('index_path');
           }
        }else{
            $this->mdp=null;
            session()->flash('error','Nom d\'utilisateur ou mot de passe incorrect');
        }
    }

    public function voir(){
        if ($this->testeur) {
            $this->type=null;
        $this->testeur=false;
        } else {
            $this->type='password';
            $this->testeur=true;
        }
    }


}

<?php

namespace App\Http\Livewire;

use App\models\compte as AppCompte;
use Livewire\Component;

class Compte extends Component
{

    public $telephone;
    public $nom;
    public $mdp;
    public $mdpc;
    public $test=true;
    public $type='password';
    public $type1='password';
    public $testeur=true;
    public $testeur1=true;



    public function render()
    {
        return view('livewire.compte_connexion.compte');
    }

    public function creerCompte(){
        if ($this->mdp==$this->mdpc) {
            $reponse=AppCompte::whereEmail($this->telephone)->count();
        if ($reponse!=0) {
            $this->test=false;
            session()->flash('error','Numéro de téléphone existant! Utilisez un autre.');
        }else {
            $reponse=AppCompte::create([
                'nom'=>$this->nom,
                'email'=>$this->telephone,
                'password'=>bcrypt($this->mdp),
            ]);
            if ($reponse) {
            $this->mdp=null;
            $this->mdpc=null;
            $this->telephone=null;
            $this->nom=null;

                session()->flash('success','Compte crée avec succès! Bienvenu chez nous.');
                return redirect()->route('index_path');
            }
        }
        }else{
            $this->test=false;
            session()->flash('error_mdp','Les mots de passe ne correspondent pas!');
            $this->mdp=null;
            $this->mdpc=null;

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

    public function voirc(){
        if ($this->testeur1) {
            $this->type1=null;
        $this->testeur1=false;
        } else {
            $this->type1='password';
            $this->testeur1=true;
        }
    }
}

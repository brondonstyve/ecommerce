<?php

namespace App\Http\Livewire;

use App\models\livreur as AppLivreur;
use App\Helpers\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Flash;
use App\models\compte;
use Livewire\WithPagination;

class Livreur extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $liste=true;
    public $ajouter=false;
    public $modifier=false;
    public $nom;
    public $localisation;
    public $cni;
    public $telephone;
    public $prenom;
    public $supp;
    public $flashType='';
    public $num=null;



    //other

    public function updatedImage(){
        $this->imageAnc=null;
    }


    public function ajouter(){
        $this->liste=false;
        $this->ajouter=true;
        $this->modifier=false;
        $this->supp=-1;
    }

    public function liste(){
        $this->resetPage();
        $this->liste=true;
        $this->ajouter=false;
        $this->modifier=false;
        $this->supp=-1;
    }



    public function ajouterLivreur(){


        //enreg

        $reponse=compte::create([
            'nom'=>$this->nom.' '.$this->prenom,
            'email'=>$this->telephone,
            'password'=>bcrypt($this->telephone),
            'type'=>'livreur'

        ]);

        $reponse=AppLivreur::create([
            'compte'=>$reponse->id,
            'localisation'=>$this->localisation,
            'cni'=>$this->cni,
            'statut'=>true

        ]);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Livreur enregistré avec succès');
            $this->resetPage();
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->image=null;
            $this->nom=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de l\'enregistrement de la Livreur');
        }

    }

   //
    public function getPostProperty()
    {
        return AppLivreur::join('comptes','comptes.id','livreurs.compte')
        ->select('livreurs.id','livreurs.compte','livreurs.localisation','livreurs.paye','livreurs.cni','comptes.nom','comptes.email')
        ->orderBy('livreurs.id','desc')
        ->paginate(50);
    }



    public function confSupp($id,$idc){
        $this->supp=$id;
    }

    public function supprimer($idl,$idc){
        $reponse=AppLivreur::destroy($idl);
        $reponse=compte::destroy($idc);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Suppression éffectuée avec succès');
        }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur!');
        }
    }

    //


    public function render()
    {
        return view('livewire.collection_admin.livreur');
    }
}

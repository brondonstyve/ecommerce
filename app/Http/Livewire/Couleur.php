<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\models\couleur as AppCollection;
use App\Helpers\Flash;

class Couleur extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme='bootstrap';
    public $liste=true;
    public $ajouter=false;
    public $modifier=false;
    public $nom;
    public $image;
    public $imageAnc;
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



    public function ajouterCouleur(){


        $reponse=AppCollection::whereLibelle($this->nom)->first();

        if ($reponse) {
            $this->flashType='danger';
            Flash::message($this->flashType,"la couleur * $this->nom * exite déjà.");
        } else {
            //enreg
        $reponse=AppCollection::create([
            'libelle'=>$this->nom,

        ]);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Couleur enregistrée avec succès');
            $this->resetPage();
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->nom=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de l\'enregistrement de la couleur');
        }
        }
        
        

    }

   //
    public function getPostProperty()
    {
        return AppCollection::orderBy('id','desc')
        ->paginate(25);
    }

   

    public function confSupp($id){
        $this->supp=$id;
    }

    public function supprimer($id){
        $reponse=AppCollection::destroy($id);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Suppression éffectuée avec succès');
        }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur!');
        }
    }

    //

    public function modifier($id){

        $reponse=AppCollection::find($id);
        $this->nom=$reponse->libelle;
        $this->num=$reponse->id;

        $this->liste=false;
        $this->ajouter=false;
        $this->modifier=true;
        $this->supp=-1;
    }

    public function confModif($id){

        $reponse=AppCollection::where([
            ['libelle',$this->nom],
            ['id','<>',$id],
        ])->first();
       

        if ($reponse) {
            $this->flashType='danger';
            Flash::message($this->flashType,"la couleur * $this->nom * exite déjà.");
        } else {
            $reponse=AppCollection::whereId($id)
         ->update([
            'libelle'=>$this->nom,
        ]);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Couleur modifiée avec succès');
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->image=null;
            $this->nom=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de la modification de la Couleur');
        }
        }
        
         

    }


    public function render()
    {
        return view('livewire.collection_admin.couleur');
    }
}

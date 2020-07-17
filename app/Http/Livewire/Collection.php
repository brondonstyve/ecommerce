<?php

namespace App\Http\Livewire;

use App\models\collection as AppCollection;
use App\Helpers\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Flash;
use Livewire\WithPagination;

class Collection extends Component
{
    use WithFileUploads;
    use WithPagination;

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



    public function ajouterCollection(){

        $name=Image::traitement($this->image,'png',600,500);

        //enreg
        $reponse=AppCollection::create([
            'nom'=>$this->nom,
            'image'=>$name,
        ]);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Collection enregistré avec succès');
            $this->resetPage();
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->image=null;
            $this->nom=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de l\'enregistrement de la Collection');
        }

    }

   //
    public function getPostProperty()
    {
        return AppCollection::orderBy('id','desc')
        ->paginate(3);
    }

    //
    public function statut($id){
        $reponse=AppCollection::find($id);
        if ($reponse->statut==true) {
            $reponse->statut=false;
            $this->supp=-1;
            $reponse->save();
            $this->flashType='success';
            Flash::message($this->flashType,'Statut mis a jour avec succès');
        } else {
            $reponse->statut=true;
            $reponse->save();
            $this->flashType='success';
            Flash::message($this->flashType,'Statut mis a jour avec succès');
        }


    }

    public function voir($id){
        $this->image=AppCollection::whereId($id)->get('image');
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
        $this->imageAnc=$reponse->image;
        $this->nom=$reponse->nom;
        $this->num=$reponse->id;

        $this->liste=false;
        $this->ajouter=false;
        $this->modifier=true;
        $this->supp=-1;
    }

    public function confModif($id){

        if (!empty($this->image)) {
            $name=Image::traitement($this->image,'png',600,500);

        //enreg
        $reponse=AppCollection::whereId($id)
         ->update([
            'nom'=>$this->nom,
            'image'=>$name,
        ]);
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Collection modifié avec succès');
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->image=null;
            $this->nom=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de la modification de la Collection');
        }
        } else {
            $reponse=AppCollection::whereId($id)
            ->update([
               'nom'=>$this->nom,
           ]);
           if ($reponse) {
               $this->flashType='success';
               Flash::message($this->flashType,'Collection modifié avec succès');
               $this->liste=true;
               $this->ajouter=false;
               $this->modifier=false;
               $this->image=null;
               $this->nom=null;
               $this->supp=-1;
       }else{
               $this->flashType='danger';
               Flash::message($this->flashType,'Erreur lors de la modification de la Collection');
           }
        }

    }

    //rendu

    public function render()
    {
        return view('livewire.collection_admin.collection');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\models\produit as AppProduit;
use App\Helpers\Image;
use Livewire\WithFileUploads;
use App\Helpers\Flash;
use App\models\collection;
use App\models\couleur;
use Livewire\WithPagination;

class ProduitAdmin extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $liste=true;
    public $ajouter=false;
    public $modifier=false;
    public $nom;
    public $marque;
    public $cathegorie;
    public $prix;
    public $qte;
    public $image;
    public $couleur;
    public $imageAnc;
    public $supp;
    public $flashType='';
    public $num=null;



    //other

    public function updatedImage(){
        if (sizeOf($this->image)>5) {
            $this->image=null;
            session()->flash('image_error','Vous ne pouvez télécharger que 5 images maximun');
        }
        $this->imageAnc=null;
    }



    public function ajouter(){
        $this->liste=false;
        $this->ajouter=true;
        $this->modifier=false;
        $this->supp=-1;
        $this->image=null;
        $this->nom=null;
        $this->prix=null;
        $this->qte=null;
        $this->marque=null;
        $this->cathegorie=null;
    }

    public function liste(){
        $this->resetPage();
        $this->liste=true;
        $this->ajouter=false;
        $this->modifier=false;
        $this->supp=-1;
    }



    public function ajouterProduit(){

        
        dd($this->couleur);
        
        $name='';
        foreach ($this->image as $key => $value) {
            $name=$name.'|'.Image::traitement($this->image[$key],'png',600,400);
        }

        //enreg
        $reponse=AppProduit::create([
            'collection'=>$this->cathegorie,
            'nom'=>$this->nom,
            'marque'=>$this->marque,
            'quantite'=>$this->qte,
            'prix'=>$this->prix,
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
            $this->qte=null;
            $this->prix=null;
            $this->marque=null;
            $this->supp=-1;
    }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de l\'enregistrement de la Collection');
        }

    }

   //
    public function getPostProperty()
    {
        return AppProduit::join('collections','collections.id','=','produits.collection')
        ->select('collections.nom as collection','produits.nom','produits.marque','produits.quantite','produits.prix','produits.statut','produits.image','produits.id')
        ->orderBy('id','desc')
        ->paginate(3);
    }



     public function getCathegoriesProperty()
    {
        return collection::select('id','nom')
        ->get();
    }

    public function getCouleursProperty()
    {
        return couleur::select('id','libelle')
        ->get();
    }

    //
    public function statut($id){
        $reponse=AppProduit::find($id);
        if ($reponse->statut==true) {
            $reponse->statut=false;
            $this->supp=-1;
            $reponse->save();
            $this->flashType='success';
            Flash::message($this->flashType,'Statut mis a jour avec succès');
        } else {
            $reponse->statut=true;
            $reponse->save();
            $this->supp=-1;
            $this->flashType='success';
            Flash::message($this->flashType,'Statut mis a jour avec succès');
        }


    }

    public function voir($id){
        $this->image=AppProduit::whereId($id)->get('image');
    }

    public function confSupp($id){
        $this->supp=$id;
    }

    public function supprimer($id){
        $reponse=AppProduit::destroy($id);
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

        $reponse=AppProduit::find($id);
        $this->imageAnc=$reponse->image;
        $this->nom=$reponse->nom;
        $this->marque=$reponse->marque;
        $this->cathegorie=$reponse->collection;
        $this->prix=$reponse->prix;
        $this->qte=$reponse->quantite;
        $this->num=$id;

        $this->liste=false;
        $this->ajouter=false;
        $this->modifier=true;
        $this->supp=-1;
    }

    public function confModif($id){

        if (!empty($this->image)) {
            $name='';
        foreach ($this->image as $key => $value) {
            $name=$name.'|'.Image::traitement($this->image[$key],'png',600,400);
        }

        //enreg
        $reponse=AppProduit::whereId($id)
        ->update([
            'collection'=>$this->cathegorie,
            'nom'=>$this->nom,
            'marque'=>$this->marque,
            'prix'=>$this->prix,
            'quantite'=>$this->qte,
            'image'=>$name,
        ]);
        } else {
            $reponse=AppProduit::whereId($id)
            ->update([
                'collection'=>$this->cathegorie,
                'nom'=>$this->nom,
                'marque'=>$this->marque,
                'quantite'=>$this->qte,
                'prix'=>$this->prix,
           ]);

        }

        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Produit modifié avec succès');
            $this->resetPage();
            $this->liste=true;
            $this->ajouter=false;
            $this->modifier=false;
            $this->image=null;
            $this->qte=null;
            $this->nom=null;
            $this->prix=null;
            $this->marque=null;
            $this->supp=-1;
       }else{
               $this->flashType='danger';
               Flash::message($this->flashType,'Erreur lors de la modification du produit');
           }

    }

    //rendu
    public function render()
    {
        return view('livewire.collection_admin.produit-admin');
    }
}

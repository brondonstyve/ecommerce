<?php

namespace App\Http\Livewire;

use App\models\produit;
use Livewire\Component;
use App\Helpers\Collection;
use App\Helpers\Flash;
use App\models\commentaire;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class DetailProduit extends Component
{

    use WithPagination;
    public $produit;
    public $ident;
    public $nom;
    public $email;
    public $commentaire;
    public $etoile=1;
    public $id_prod;
    public $message;
    public $type ='';



    public function render()
    {
        return view('livewire.collection_page.detail-produit');
    }


    public function mount($id)
    {
        $this->produit = produit::find($id);
        $this->id_prod=$id;
        $this->ident=$this->produit->collection;
        if (auth()->check()) {
          $this->nom=auth()->user()->nom;
        }
    }


    public function getProduitsProperty(){

            return Collection::renduProduitPar('id','desc',8,'collection',$this->ident);

    }

    public function detail($id){
        return redirect()->route('detail_produit_path',$id);
    }

    public function etoile($id){
        $this->etoile=$id;
    }


    public function comment(){
        $reponse=commentaire::create([
            'produit'=>$this->id_prod,
            'compte'=>auth()->user()->id,
            'email'=>$this->email,
            'commentaire'=>$this->commentaire,
            'etoile'=>$this->etoile,
        ]);

        if ($reponse) {
            $this->type='success';
            $this->message='commentaire envoyé avec succès';
            Flash::message($this->type,$this->message);
            $this->email=null;
            $this->commentaire=null;
            $this->etoile=1;
        }


    }

    public function getCommentairesProperty(){
        return commentaire::join('comptes','comptes.id','commentaires.compte')
        ->whereProduit($this->id_prod)
        ->paginate(3);
    }

    public function getDecompteProperty(){
        return DB::table('commentaires')
        ->whereProduit($this->id_prod)
        ->get();
    }
}

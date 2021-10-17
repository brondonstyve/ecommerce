<?php

namespace App\Http\Livewire;

use App\Helpers\Flash;
use App\models\commande;
use App\models\livreur;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommandesAdmin extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $flashType='';
    public $liste=true;
    public $supp;
    public $livreur=false;
    public $com;
    public $tab=[];
    public $what='tout';
    public $search='';
    public $searchLivreur='';

//'commandes.status'


    public function wath($val){
        $this->what=$val;
        $this->livreur=false;
        $this->liste=true;
    }


    public function getPostProperty()
    {

        switch ($this->what) {
            case 'tout':
                return( DB::table('commandes')
                ->select(DB::raw('SUM(commandes.montant) as montant'),'commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                ->groupBy('commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                ->orderBy('commandes.created_at','desc')
                ->where('commandes.codeCom','like',"%$this->search%")
                ->paginate(50));
                break;
            
                case 'livre':
                    return( DB::table('commandes')
                    ->select(DB::raw('SUM(commandes.montant) as montant'),'commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                    ->groupBy('commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                    ->orderBy('commandes.created_at','desc')
                    ->whereStatus(true)
                    ->where('commandes.codeCom','like',"%$this->search%")
                    ->paginate(50));
                    break;

                    case 'nlivre':
                        return( DB::table('commandes')
                        ->select(DB::raw('SUM(commandes.montant) as montant'),'commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                        ->groupBy('commandes.montant_total','commandes.codeCom','commandes.nom','commandes.created_at','commandes.adresse','commandes.status','commandes.livreur')
                        ->orderBy('commandes.created_at','desc')
                        ->where('commandes.codeCom','like',"%$this->search%")
                        ->whereStatus(false)
                        ->paginate(50));
                        break;
        }

        
    }

    public function statut($id){
        $reponse=commande::where([
            ['CodeCom',$id]
            ])->get();
        
            foreach ($reponse as $key => $value) {


                commande::whereId($value->id)
                ->update([
                    'status'=>!$value->status
                ]);
                $this->flashType='success';
                Flash::message($this->flashType,'Statut mis a jour avec succès');
            }

    }
    

    public function confSupp($id){
        $this->supp=$id;
    }

    public function supprimer($id){
        $this->flashType='danger';
        Flash::message($this->flashType,'Impossible de supprimer cette commande');
        $this->supp=null;
        /*$reponse=commande::where([
            ['CodeCom',$id]
            ])->delete();
        if ($reponse) {
            $this->flashType='success';
            Flash::message($this->flashType,'Suppression éffectuée avec succès');
        }else{
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur!');
        }*/
    }

    public function voir($id){
        $reponse=commande::join('produits','produits.id','commandes.produit')
        ->where([
            ['CodeCom',$id]
            ])->get();
    }

    public function assignerLivreur($id){
        $this->com=$id;
        $this->livreur=true;
        $this->liste=false;
    }

    public function retirerLivreur($id){
        $reponse=commande::where([
            ['codeCom',$id]
        ])
        ->update([
            'livreur'=>null
        ]);

        if ($reponse) {
            $this->livreur=false;
            $this->liste=true;
            $this->flashType='success';
            Flash::message($this->flashType,'Livreur retiré avec succès.');
        } else {
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors du retrait du livreur.');
        }
    }
    

    public function getListLivreurProperty()
    {
        return livreur::join('comptes','comptes.id','livreurs.compte')
        ->select('livreurs.id','livreurs.compte','livreurs.localisation','livreurs.paye','livreurs.cni','comptes.nom','comptes.email')
        ->orderBy('livreurs.id','desc')
        ->where([[
            'comptes.nom','like',"%$this->searchLivreur%"
        ]])
        ->orWhere([[
            'comptes.email','like',"%$this->searchLivreur%"
        ]])
        ->orWhere([[
            'livreurs.localisation','like',"%$this->searchLivreur%"
        ]])
        ->orWhere([[
            'livreurs.cni','like',"%$this->searchLivreur%"
        ]])
        ->paginate(50);
    }

    public function assigner($id){
        $reponse=commande::where([
            ['codeCom',$this->com]
        ])
        ->update([
            'livreur'=>$id
        ]);

        if ($reponse) {
            $this->livreur=false;
            $this->liste=true;
            $this->flashType='success';
            Flash::message($this->flashType,'Livreur assigné avec succès.');
        } else {
            $this->flashType='danger';
            Flash::message($this->flashType,'Erreur lors de l\'assignation du livreur.');
        }
        
    }

    public function render()
    {
        return view('livewire.collection_admin.commandes-admin');
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Collection;
use App\Http\Requests\passePartout;
use App\models\commande;
use App\models\panier;
use App\Notifications\mailCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Stripe\PaymentIntent;
use Stripe\Stripe;


class paiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(passePartout $request)
    {
        
        $title='Paiement';
        $montant=$request->session()->get('prix');

        if ($montant<=0) {
            return redirect()->route('produit_path');
        } 

        switch ($request->payment) {
            case 'card':
                try {
                    Stripe::setApiKey(env('STRIPE_KEY'));

                    $intent=PaymentIntent::create([
                        'amount'=>$montant,
                        'currency'=>'eur',
                    ]);
                    
                    $clientSecret= Arr::get($intent,'client_secret');

                    session([
                        'nom'=>$request->nom,
                        'prenom'=>$request->prenom,
                        'email'=>$request->email,
                        'adresse'=>$request->adresse,
                        'ville'=>$request->ville,
                        'pays'=>$request->pays,
                        'telephone'=>$request->telephone,
                        'note'=>$request->note,
                        'paymentType'=>$request->payment
                        ]);
                    

                    return view('paiement.index',compact('title','clientSecret','montant'));
                } catch (\Throwable $th) {
                    session()->flash('error','Erreur lors de l\'initiation du paiement. Veuillez vérifier votre connexion internet.');
                    return redirect()->route('index_path');
                }
                
                break;
            
            case 'om':

                break;

            case 'paypal':
                
                break;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->json()->all();

        $session=$request->session()->all();

        $panier=Collection::panier(auth()->user()->id);
        
        $codeCom='Com'.auth()->user()->id.'_'.now()->format('Y-m-d_H:i:s');
        foreach ($panier as $key => $value) {
            $reponse=commande::create([
                'codeCom'=>$codeCom,
                'compte'=>auth()->user()->id,
                'nom'=>$session['nom'],
                'prenom'=>$session['prenom'],
                'email'=>$session['email'],
                'telephone'=>$session['telephone'],
                'adresse'=>$session['adresse'],
                'ville'=>$session['ville'],
                'pays'=>$session['pays'],
                'note'=>$session['note'],
                'typePaiement'=>$session['paymentType'],
                'montant'=> $value->prix,
                'montant_total'=> $data['paymentIntent']['amount'],
                'devise'=> $data['paymentIntent']['currency'],
                'quantite'=>$value->quantite,
                'produit'=>$value->id_produit
            ]);
        }

        $reponse->email=env('MAIL_ADMIN');

        try {
            $reponse->notify(new mailCommande);
        } catch (\Throwable $th) {
            return $th;
        }
        
        if ($reponse) {
            panier::whereCompte(auth()->user()->id)->delete();
            session([
                'nom'=>null,
                'prenom'=>null,
                'email'=>null,
                'adresse'=>null,
                'ville'=>null,
                'pays'=>null,
                'telephone'=>null,
                'note'=>null,
                'paymentType'=>null,
                'prix'=>null,
                ]);

                
            return $data['paymentIntent'];

        } else {
            return response('error');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function checkout(){

        $title='Merci';
        return view('paiement.corpsMerci',compact('title'));
    }
}

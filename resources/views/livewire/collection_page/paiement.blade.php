<div>
    <!-- SECTION -->
<div class="section col-md-12">
    <form action="{{route('paiement_path')}}" method="post">
    @csrf
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-5">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">addresse de livraison</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="prenom" placeholder="Prénom" >
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="nom" placeholder="Nom" required value="{{auth()->user()->nom}}">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="adresse" placeholder="Addresse" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="ville" placeholder="Ville" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="pays" placeholder="Pays" required>
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="telephone" placeholder="Telephone" required value="{{auth()->user()->email}}">
                    </div>

                </div>
                <!-- /Billing Details -->

              

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" placeholder="Order Notes" name="note" ></textarea>
                </div>
                <!-- /Order notes -->
            </div>




            <div class="container-fluid ">

                            
                <!-- Dark table -->
                <div class="row ">
                    <div class="col">
                        <div class="card bg-default shadow">
                            <div class="table-responsive">
        
                                <div class="section-title text-center ">
                                    <h3 class="title">Votre Commande</h3>
                                </div>

                                <table class="table align-items-center table-dark table-flush">

                    <thead>
                        <tr class="">
                            <th><strong>Qte</strong></th>
                            <th><strong>PRODUIT</strong></th>
                            <th><strong>COULEUR</strong></th>
                            <th><strong>TAILLE</strong></th>
                            <th><strong>PRIX</strong></th>
                            <th><strong>TOTAL</strong></th>
                            <th class="text-right"><strong>A / D</strong></th>
                        </tr>
                    </thead>

                    <hr>
                        @php
                            $total=0;
                        @endphp
                        <tbody>
                        @foreach ($this->commande as $item)

                        <tr>
                            <td>{{ $item->quantite }}</td>
                            <td>{!! $item->nom !!}</td>
                            <td>
                            @if ($item->couleur!==null)
                            {!! $item->couleur !!}
                            @else
                                /
                            @endif    
                            </td>
                            <td>
                                @if ($item->taille!==null)
                                {!! $item->taille !!}
                                @else
                                    /
                                @endif    
                            </td>
                            <td>{{ number_format($item->prix,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}}</td>
                            <td>
                                {{ number_format($item->prix*$item->quantite,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}}
                            </td>

                            <td class="input-number">
                                <span class="qty-up" wire:click='ajouter({{ $item->id }})'>+</span>
                                <span class="qty-down"  @if($item->quantite<=1) disabled @else wire:click='diminuer({{ $item->id }})' @endif>-</span>
                            </td>

                        </tr>
                        @php
                            $total=$total+($item->prix*$item->quantite);
                        @endphp
                        @endforeach
                    </tbody>
            </table>

            
            <table class="table align-items-center table-dark table-flush mt-6">
                <tbody>
                    <tr>
                        <td>
                            <div>Frais De Livraison</div>
                        </td>

                        <td class="text-right"> 
                            <div><strong>Gratuit</strong></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>Total</div>
                        </td>

                        <td class="text-right"> 
                            <div><strong class="order-total ">{{ number_format($total,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}}</strong></div>
                        </td>
                    </tr>

                    <tr>
                        @php
                        $f=new NumberFormatter("fr", NumberFormatter::SPELLOUT);
                        $f=$f->format($total);
                        @endphp
                        <td class="text-right" colspan="2"> 
                            <div class="order-total text-uppercase"><strong>{{$f .' ('.env('DEVISE').')'}}</strong></div>
                        </td>
                    </tr>
                </tbody>
            </table>
                </div>
            </div>
        </div>




                <div class="payment-method input-radio ">

                    <div class="input-radio">
                        <input type="radio" name="payment" value="card" id="payment-1" required>
                        <label for="payment-1">
                            
                            <i class="fa fa-cc-mastercard text-danger"></i>
                            Carte de credit
                        </label>
                        <div class="caption">
                            <p>Le paiement via cette option se fera par carte (visa, Mastercard, etc...).</p>
                        </div>
                    </div>

                    <div class="input-radio">
                        <input type="radio" name="payment" value="om" id="payment-2" required>
                        <label for="payment-2">
                            
                            <i class="fa fa-opencart text-orange" ></i>
                            OM / Mobile Money
                        </label>
                        <div class="caption">
                            <p>Le paiement via cette option se fera par paiement mobile Orange money et mobile money.</p>
                        </div>
                    </div>

                    <div class="input-radio">
                        <input type="radio" name="payment"  value="paypal" id="payment-3" required>
                        <label for="payment-3">
                            
                            <i class="fa fa-cc-paypal text-primary"></i>
                            PayPal
                        </label>
                        <div class="caption">
                            <p>Le paiement via cette option se fera par votre compte paypal.</p>
                        </div>
                    </div>

                </div>
                @if ($total!=0)
                <div class="" style="float: right">
                    <input type="checkbox" id="terms" required class="mr-2">
                    <label for="terms">
                        <span>
                            J'ai lu et j'accepte les <a href="#!">termes & conditions</a>
                        </span>
                    </label>
<br>
                    <button type="submit" class="primary-btn "  style="float: right">Passer à la caisse</button>

                </div>
                
                <input type="hidden" name="total" value="{{$total}}">
                @php
                    session([
                        'prix'=>$total
                    ])
                @endphp
                @endif
                
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    </div>
    </div>
</div>
    <!-- /container -->
</form>
</div>
<!-- /SECTION -->
</div>

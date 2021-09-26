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
                        <input class="input" type="text" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="addresse" placeholder="Addresse">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="ville" placeholder="Ville">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="pays" placeholder="Pays">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="zip-code" placeholder="Adresse Postale">
                    </div>
                    <div class="form-group">
                        <input class="input" type="tel" name="tel" placeholder="Telephone">
                    </div>

                </div>
                <!-- /Billing Details -->

                <!-- Shiping Details -->
                <div class="shiping-details">
                    <div class="section-title">
                        <h3 class="title">Autre adresse de livraison </h3>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="shiping-address">
                        <label for="shiping-address">
                            <span></span>
                            Livrer à une autre adresse ?
                        </label>
                        <div class="caption">
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="last-name" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="country" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Shiping Details -->

                <!-- Order notes -->
                <div class="order-notes">
                    <textarea class="input" placeholder="Order Notes"></textarea>
                </div>
                <!-- /Order notes -->
            </div>

            <!-- Order Details -->
            <div class="col-md-7 order-details"  style="margin-top: 8%">
                <div class="section-title text-center">
                    <h3 class="title">Votre Commande</h3>
                </div>
                <div class="order-summary">
                <table class="table table-responsive col-md-12">
                    <thead>
                        <tr class="">
                            <th><strong>Qte</strong></th>
                            <th><strong>PRODUIT</strong></th>
                            <th><strong>Couleur</strong></th>
                            <th><strong>taille</strong></th>
                            <th><strong>PRIX</strong></th>
                            <th><strong>TOTAL</strong></th>
                            <th class="text-right"><strong>A / D</strong></th>
                        </tr>
                    </thead>

                    <hr>
                    <div class="order-products">
                        @php
                            $total=0;
                        @endphp
                        <tbody>
                        @foreach ($this->commande as $item)

                        <tr>
                            <td>{{ $item->quantite }}</td>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->couleur }}</td>
                            <td>{{ $item->taille }}</td>
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
                </div>
            </table>

                
                    <div class="order-col">
                        <div>Frais De Livraison</div>
                        <div><strong>Gratuit</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total ">{{ number_format($total,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}}</strong></div>
                    </div>
                    @php
                            $f=new NumberFormatter("fr", NumberFormatter::SPELLOUT);
                            $f=$f->format($total);
                        @endphp

                    <div class="order-col">
                        <div></div>
                        <div class="order-total text-uppercase"><strong>{{$f .' ('.env('DEVISE').')'}}</strong></div>
                    </div>
                </div>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1">
                        <label for="payment-1">
                            <span></span>
                            <i class="fa fa-cc-mastercard text-danger"></i>
                            Carte de credit
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2">
                        <label for="payment-2">
                            <span></span>
                            <i class="fa fa-opencart text-orange" ></i>
                            OM / Mobile Money
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3">
                        <label for="payment-3">
                            <span></span>
                            <i class="fa fa-cc-paypal text-primary"></i>
                            PayPal
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                @if ($total!=0)
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        J'ai lu et j'accepte les <a href="#!">termes & conditions</a>
                    </label>
                </div>
                
                <input type="hidden" name="total" value=" {{$total}} ">
                <button type="submit" class="primary-btn  mx-auto" >Passer à la caisse</button>
                @endif
                
            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</form>
</div>
<!-- /SECTION -->
</div>

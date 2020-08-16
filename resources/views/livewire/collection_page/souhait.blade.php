<div>

    @if (session()->has('error'))
    <div class="alert alert-danger text-center">
        <span>{!! session('error') !!}</span>
    </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success  text-center">
            <span>{!! session('success') !!}</span>
        </div>
    @endif

    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    @if (sizeOf($this->souhait)==0)
                    <div class="alert alert-danger m-5">
                        <h3 class="text-center">
                            <i class="fa fa-warning text-danger"></i>
                            Aucun souhait associé à votre compte pour le moment
                        </h3>

                    </div>
                    @else
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading text-left">
                                <th>NOM</th>
                                <th>P.U</th>
                                <th>QTE</th>
                                <th>TOTAL</th>
                                <th>VISUEL</th>
                                <th class="text-center">RETIRER </th>
                                <th class="text-center">AJOUTER AU PANIER</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $total=0;
                            @endphp

                            @foreach ($this->souhait as $key=>$item)
                            <tr>
                                <td class="product-des" data-title="Description">
                                    <p class="product-name"><a href="#">{{ $item->nom }}</a></p>
                                </td>
                                <td class="price" data-title="Price"><span>{{ $item->prix }} </span></td>
                                <td class="qty" data-title="Qty">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <button type="button" class="badge badge-primary btn-number"
                                                @if($item->quantite<=1) disabled @else
                                                    wire:click='diminuer({{ $item->id }})' @endif>
                                                    -
                                            </button>
                                        </div>
                                        <span class="mr-2 ml-2">{{ $item->quantite }}</span>

                                        <div class="button plus ">
                                            <button type="button" class="badge badge-primary btn-number"
                                                wire:click='ajouter({{ $item->id }})'>
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <div id="rafraichisseur" data-size="{{ sizeOf($this->souhait) }}"></div>

                                <td class="total-amount" data-title="Total">
                                    <span>{{ $item->quantite*$item->prix }}</span></td>
                                @php
                                $image=explode('|',$item->image);
                                $indice=rand(1,sizeOf($image)-1);
                                $image=$image[$indice];
                                @endphp
                                <input type="hidden" id="img{{ $key }}" value="{{ $item->image }}">
                                <td style="max-width: 10%">
                                    <a href="{{ route('detail_produit_path',$item->id_produit) }}"
                                        title="cliquez pour voir">
                                        <img src="{{ 'storage/'.$image }}" alt="#" width="50px" id="remplacer{{ $key }}">
                                    </a>
                                </td>

                                <td class="action text-center" title="Retirer"><a href="#"
                                        wire:click='supprimer({{ $item->id }})'><i class="fa fa-trash text-red"></i></a>
                                </td>
                                <td class="action text-center" title="ajouter au panier"><a href="#"
                                        wire:click='panier({{ $item->id_produit }})'><i
                                            class="fa fa-shopping-cart text-success"></i></a></td>
                            </tr>
                            @php
                            $total=$total+($item->quantite*$item->prix);
                            @endphp
                            @endforeach



                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->


                </div>
            </div>

            <!-- Order Details -->

     @if ($paiement)
     <div class="col-md-12 order-details" >

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
        <div class="input-checkbox">
            <input type="checkbox" id="terms">
            <label for="terms">
                <span></span>
                J'ai lu et j'accepte les <a href="#!">termes & conditions</a>
            </label>
        </div>
        <a href="#" class="primary-btn order-submit">Placer le paiement</a>
    </div>
     @endif

    <!-- /Order Details -->



            <div class="col-12 text-right">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li> Sous Total :<strong> {{ number_format($total,'2',',','.') }}</strong></li>

                                </ul>
                                <div class="button5">
                                    <a href="#!" class="btn btn-dark" wire:click="payer">Acheter Ces produits</a>
                                    <a href="{{ route('produit_path',$idCathegorie='s') }}" class="btn btn-danger">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
            @endif

        </div>
    </div>


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Meilleurs Ventes</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach ($this->produit as $key=>$item)
                                <li class="@if($key==0) active @endif">
                                    <a
                                        href="{{ route('produit_path',$idCathegorie=encrypt($item->id_col)) }}">{{ $item->collection }}</a>
                                </li>
                                @if ($key==3)
                                @break
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="rafraichisseur" data-size="{{ $this->produit->total() }}"></div>

                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-6">
                                    <!-- product -->
                                    @foreach ($this->produit as $key=>$item)
                                    <!-- product -->
                                    <div class="col-md-4 col-xs-7">
                                        <div class="product">
                                            <a href="{{ route('detail_produit_path',$item->id) }}">

                                                <div class="product-img" wire:click='detail({{ $item->id }})'>
                                                    @php
                                                    $image=explode('|',$item->image);
                                                    $indice=rand(1,sizeOf($image)-1);
                                                    $image=$image[$indice];
                                                    @endphp
                                                    <input type="hidden" id="img{{ $key }}" value="{{ $item->image }}">
                                                    <img src="{{ 'storage/'.$image }}" alt="" id="remplacer{{ $key }}">
                                                    <div class="product-label">
                                                        <span class="sale">-30%</span>
                                                        <span class="new">NEW</span>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="product-body">
                                                <p class="product-category">{{ $item->collection }}</p>
                                                <h3 class="product-name"><a
                                                        href="{{ route('detail_produit_path',$item->id) }}"
                                                        data-toggle="modal">{{ $item->nom }}</a></h3>
                                                <h4 class="product-price">{{ $item->prix }} <del
                                                        class="product-old-price">{{ $item->prix+ $item->prix *0.3 }}</del>
                                                </h4>
                                                <div class="product-rating">
                                                    @for ($i = 0; $i < 5; $i++) <i
                                                        class="fa fa-check-circle-o text-danger"></i>
                                                        @endfor
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist" data-souhait="{{ $item->id }}"><i
                                                            class="fa fa-heart-o"></i><span class="tooltipp">Ajouter a
                                                            vos souhaits</span></button>
                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                            class="tooltipp">Ajouter pour comparer</span></button>
                                                    <button class="quick-view"> <a
                                                            href="{{ route('detail_produit_path',$item->id) }}"><i
                                                                class="fa fa-eye"></i></a> <span
                                                            class="tooltipp">Cliquez pour voir</span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn" data-id="{{ $item->id }}"><i
                                                        class="fa fa-shopping-cart"></i> Ajouter à la carte</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-6" class="products-slick-nav"></div>
                            </div>
                            <input type="hidden" data-toggle="modal" data-target="#modal-notification"
                                class="notificateur">

                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">


                @for ($i = 2; $i <= 4; $i++) <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Meilleures Ventes</h4>
                        <div class="section-nav">
                            <div id="slick-nav-{{ $i }}" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-{{ $i }}">
                        <div>
                            @foreach ($this->produit as $key=>$item)
                            <!-- product widget -->
                            <div class="product-widget">
                                <a href="{{ route('detail_produit_path',$item->id) }}">
                                    <div class="product-img">
                                        @php
                                        $image=explode('|',$item->image);
                                        $indice=rand(1,sizeOf($image)-1);
                                        $image=$image[$indice];
                                        @endphp
                                        <input type="hidden" id="img{{ $key }}" value="{{ $item->image }}">
                                        <img src="{{ 'storage/'.$image }}" id="remplacer{{ $key }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $item->collection }}</p>
                                        <h3 class="product-name"><a
                                                href="{{ route('detail_produit_path',$item->id) }}">{{ $item->nom }}</a>
                                        </h3>
                                        <h4 class="product-price">{{ $item->prix }} <del
                                                class="product-old-price">{{ $item->prix +($item->prix*0.3) }}</del>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            <!-- /product widget -->
                            @if ($key==2)
                            @break
                            @endif
                            @endforeach
                        </div>

                        <div>
                            @foreach ($this->produit as $key=>$item)
                            <!-- product widget -->
                            <div class="product-widget">
                                <a href="{{ route('detail_produit_path',$item->id) }}">
                                    <div class="product-img">
                                        @php
                                        $image=explode('|',$item->image);
                                        $indice=rand(1,sizeOf($image)-1);
                                        $image=$image[$indice];
                                        @endphp
                                        <input type="hidden" id="img{{ $key }}" value="{{ $item->image }}">
                                        <img src="{{ 'storage/'.$image }}" id="remplacer{{ $key }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><a href="">{{ $item->collection }}</a></p>
                                        <h3 class="product-name"><a
                                                href="{{ route('detail_produit_path',$item->id) }}">{{ $item->nom }}</a>
                                        </h3>
                                        <h4 class="product-price">{{ $item->prix }} <del
                                                class="product-old-price">{{ $item->prix +($item->prix*0.3) }}</del>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                            <!-- /product widget -->
                            @if ($key==2)
                            @break
                            @endif
                            @endforeach
                        </div>

                    </div>
            </div>
            @endfor


        </div>
        <!-- /row -->
    </div>




</div>

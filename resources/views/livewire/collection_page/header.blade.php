<div>
        <!-- HEADER -->
        <header class="stabilisateur">
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="tel:+237 697 32 09 74"><i class="fa fa-phone"></i> +237 697 32 09 74</a></li>
                        <li><a href="mail:brondonstyve@gmail.com"><i class="fa fa-envelope-o"></i> brondonstyve@gmail.com</a></li>
                        <li><a href="#!"><i class="fa fa-map-marker"></i> Yaoundé, Cameroun</a></li>
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-euro"></i> EURO</a></li>
                        <li><a href="{{ route('compte_path') }}"><i class="fa fa-user-o"></i> Mon Compte</a></li>
                        @if (auth()->check())
                        <li><a href="{{ route('deconnexion_path') }}"><i class="fa fa-lock"></i> deconnexion</a></li>
                        @else
                        <li><a href="{{ route('connexion_path') }}"><i class="fa fa-user-circle"></i> connexion</a></li>
                        @endif

                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="{{ route('index_path') }}" class="logo">
                                    <img src="./img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form>
                                    <select class="input-select">
                                            <option value="0">Tout</option>
                                            @foreach ($this->cathegorie as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    <input class="input" placeholder="Recherchez ici ...">
                                    <button class="search-btn">Rechercher</button>
                                </form>
                            </div>
                        </div>

                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix" >
                            <div class="header-ctn">
                                <!-- Wishlist -->
                                <div>
                                    <a href="{{ route('mes_souhaits_path') }}">
                                        @if (sizeOf($this->souhait)==0)
                                        <i class="fa fa-heart-o"></i>
                                        @else
                                        <i class="fa fa-heart"></i>
                                        @endif
                                        <span>Vos Souhaits</span>
                                        <div class="qty" id="souhait" data-souhait="{{ sizeOf($this->souhait) }}">{{ sizeOf($this->souhait) }}</div>
                                    </a>
                                </div>
                                <!-- /Wishlist -->

                                <!-- Cart -->
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Votre Panier</span>
                                        <div class="qty" id="qte-panier" data-qte="{{ sizeOf($this->panier) }}">{{ sizeOf($this->panier) }}</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        @php
                                            $total=0;
                                                foreach ($this->panier as $key => $value) {
                                                    $total=$total+($value->prix*$value->quantite);
                                                }
                                            @endphp
                                        <div class="cart-list" id="list">
                                            @if (!auth()->check())
                                            <div class="product-body text-center" id="retirer-list">
                                                <h3 class="product-name"><a href="{{ route('connexion_path') }}">Connectez vous</a></h3>
                                            </div>
                                            @else
                                            @if (sizeOf($this->panier)==0)
                                            <div class="product-body text-center" id="retirer-list">
                                                <h3 class="product-name"><a href="#">Aucun produit au panier</a></h3>
                                            </div>
                                            @else
                                            <div id="rafraichisseur" data-size="{{ sizeOf($this->panier) }}"></div>

                                            @foreach ($this->panier as $key=>$item)
                                            @php
                                                        $image=explode('|',$item->image);
                                                        $indice=rand(1,sizeOf($image)-1);
                                                        $image=$image[$indice];
                                                        @endphp
                                            <div class="product-widget" style="margin-bottom: -15%;margin-bottom: -5%">
                                                <div class="product-img">
                                                    <input type="hidden" id="img{{ $key }}" value="{{ $item->image }}">
                                                    <img src="{{ 'storage/'.$image }}" alt="" id="remplacer{{ $key }}">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="#">{{ $item->nom }}</a></h3>
                                                    <h4 class="product-price"><span class="qty">{{ $item->quantite }} x </span> {{ number_format($item->prix,'2',',','.') }}</h4>
                                                </div>
                                                <button class="delete" wire:click="remove({{ $item->id_panier }})"><i class="fa fa-close"></i></button>
                                            </div>
                                            {!! ((sizeOf($this->panier)-1)==$key)? '':'<hr>' !!}
                                            @endforeach
                                        </div>


                                            @endif
                                            @endif
                                    {!! (sizeOf($this->panier)==0)? '</div>':'' !!}
                                            <div class="cart-summary">
                                                @if (sizeOf($this->panier)==0)
                                                <small id="small1" data-small1="{{ sizeOf($this->panier) }}">{{ sizeOf($this->panier) }} produit selectionné</small>
                                                @else
                                                <small id="small" data-small="{{ sizeOf($this->panier) }}">{{ sizeOf($this->panier) }} produits selectionnés</small>
                                                @endif
                                                <h5 id="sous-total" data-st="{{ $total }}">SOUS TOTAL: {{ number_format($total,'2',',','.') }}</h5>
                                            </div>
                                            <div class="cart-btns">
                                                <a href="{{ route('mon_panier_path') }}">Voir le pannier</a>
                                                <a href="{{ route('mon_panier_path') }}">Valider<i class="fa fa-arrow-circle-right"></i></a>
                                            </div>


                                    </div>
                                </div>
                                <!-- /Cart -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
        </header>
        <!-- /HEADER -->

        @include('layoutPages.notification')
</div>

<div class="dropdown">
    

    <!-- Cart -->
    
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
                        <h4 class="product-price"><span class="qty">{{ $item->quantite }} x </span> {{ number_format($item->prix,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}} </h4>
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
                    <h5 id="sous-total" data-st="{{ $total }}">SOUS TOTAL: {{ number_format($total,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}} </h5>
                </div>
                <div class="cart-btns">
                    <a href="{{ route('mon_panier_path') }}">Voir le pannier</a>
                    <a href="{{ route('mon_panier_path') }}">Valider<i class="fa fa-arrow-circle-right"></i></a>
                </div>

</div>

<div>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            {{ $condition }} :
                            @if ($condition=='marque')
                            <span class="text-danger"> {{ $selection }} </span>
                            @else
                            <span class="text-danger"> @if($selection==-1) Tout @else  {{ $this->produit[0]->collection }} @endif </span>
                            @endif
                        </label>

                        <label>
                            Afficher par groupe de :
                            <select class="input-select"  wire:model='select'>
                                <option value="9"  @if($select == 9) disabled @endif>9</option>
                                <option value="16" @if($select == 26) disabled @endif>26</option>
                                <option value="28" @if($select == 40) disabled @endif>40</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <div id="rafraichisseur" data-size="{{ sizeOf($this->produit) }}"></div>
                   @foreach ($this->produit as $key=>$item)
                        <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
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
                            <div class="product-body">
                                <p class="product-category">{{ $item->collection }}</p>
                                <h3 class="product-name"><a href="#">{{ $item->nom }}</a></h3>
                                <h4 class="product-price">{{ $item->prix }} <del class="product-old-price">{{ $item->prix+ $item->prix *0.3 }}</del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter a vos souhaits</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Ajouter pour comparer</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Cliquez pour voir</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter à la carte</button>
                            </div>
                        </div>
                    </div>
                   @endforeach


                    <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="text-right">
                    {{ $this->produit->links() }}
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->



            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">

                        <div class="input-checkbox" >
                            <a href="#">
                                @if($selection==-1)
                                <i class="fa fa-check-circle text-danger" wire:click='checkbox(-1)'></i>
                                <label for="category" wire:click='checkbox(-1)'>
                                    <span></span>
                                    Tout
                                </label>
                                @else
                                <i class="fa fa-circle-o text-danger" wire:click='checkbox(-1)'></i>
                                <label for="category" wire:click='checkbox(-1)'>
                                    <span></span>
                                    Tout
                                </label>
                                @endif
                            </a>
                        </div>

                        @foreach ($this->cathegorie as $key=>$item)

                        <div class="input-checkbox" >
                            <a href="#">
                                @if($item->id==$selection)
                                <i class="fa fa-check-circle text-danger" wire:click='checkbox({{ $item->id }})'></i>
                                @else
                                <i class="fa fa-circle-o text-danger" wire:click='checkbox({{ $item->id }})'></i>
                                @endif
                                <label wire:click='checkbox({{ $item->id }})'>
                                    <span></span>
                                    {{ $item->nom }}
                                    <small>({{ $item->nombre }})</small>
                                </label>
                            </a>
                        </div>

                        @endforeach


                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Prix</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Marques</h3>
                    <div class="checkbox-filter">

                        @foreach ($this->marques as $key=>$item)

                        <div class="input-checkbox" >
                            <a href="#">
                                @if($item->marque==$selection)
                                <i class="fa fa-check-circle text-danger" wire:click='marque("{{ $item->marque }}")'></i>
                                @else
                                <i class="fa fa-circle-o text-danger" wire:click='marque("{{ $item->marque }}")'></i>
                                @endif
                                <label wire:click='marque("{{ $item->marque }}")'>
                                    <span></span>
                                    {{ $item->marque }}
                                    <small>({{ $item->nombre }})</small>
                                </label>
                            </a>

                        </div>

                        @endforeach


                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Meilleures Ventes</h3>
                    <div id="rafraichisseurVente" data-size="{{ sizeOf($this->vente) }}"></div>
                    @foreach ($this->vente as $item)
                    <div class="product-widget">
                        <div class="product-img">
                            @php
                                  $image=explode('|',$item->image);
                                  $indice=rand(1,sizeOf($image)-1);
                                  $image=$image[$indice];
                                @endphp
                                <input type="hidden" id="imgVente{{ $key }}" value="{{ $item->image }}">
                                <img src="{{ 'storage/'.$image }}" alt="" id="remplacerVente{{ $key }}">
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{ $item->collection }}</p>
                            <h3 class="product-name"><a href="#">{{ $item->nom }}</a></h3>
                            <h4 class="product-price">{{ $item->prix }} <del class="product-old-price"> {{ $item->prix + ($item->prix*0.3) }}</del></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

</div>





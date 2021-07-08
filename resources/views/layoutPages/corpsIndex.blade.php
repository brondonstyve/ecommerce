@if (session()->has('success'))
<div class="alert alert-success text-center">
  <span>{{ session()->get('success') }}</span>
</div>
@endif

@livewire('cathegorie')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Nouveaux Produits</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                              @foreach ($produit as $key=>$item)
                                 <li class="@if($key==0) active @endif">
                                    <a href="{{ route('produit_path',$idCathegorie=encrypt($item->id_col)) }}">{{ $item->collection }}</a>
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
                            <div id="rafraichisseur" data-size="{{ $produit->total() }}"></div>

                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    @foreach ($produit as $key=>$item)
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
                                                    <h3 class="product-name"><a href="{{ route('detail_produit_path',$item->id) }}" data-toggle="modal">{{ $item->nom }}</a></h3>
                                                    <h4 class="product-price">{{ number_format($item->prix,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}} </h4>
                                                    <del class="product-old-price">{{ number_format($item->prix+ $item->prix *0.3,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}} </del>
                                                    <div class="product-rating">
                                                        <i class="fa fa-check-circle-o text-danger"></i>
                                                        <i class="fa fa-check-circle-o text-danger"></i>
                                                        <i class="fa fa-check-circle-o text-danger"></i>
                                                        <i class="fa fa-check-circle-o text-danger"></i>
                                                        <i class="fa fa-check-circle-o text-danger"></i>
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist souhait" data-souhait="{{ $item->id }}"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter a vos souhaits</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Ajouter pour comparer</span></button>
                                                        <button class="quick-view"><a href="{{ route('detail_produit_path',$item->id) }}"><i class="fa fa-eye"></i></a><span class="tooltipp">Cliquez pour voir</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn pannier" data-id="{{ $item->id }}"><i class="fa fa-shopping-cart"></i> Ajouter à la carte</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
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
<div class="section">
    <!-- container -->
    <div class="container text-center">
            <a class="primary-btn cta-btn" href="{{ route('produit_path',$id_cathegorie='s') }}"> tout voir</a>
        </div>
    </div>

    <!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section" >
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown" wire:poll.1s>
                        <li>
                            <div>
                                <h3 id="jour"></h3>
                                <span>Jours</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 id="heure"></h3>
                                <span>Heure(s)</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 id="min"></h3>
                                <span>Minutes</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3 id="sec"></h3>
                                <span>Secondes</span>
                            </div>
                        </li>
                        <li style="background-color: black">
                            <div>
                                <h3 id="tierce"></h3>
                                <span>tierces</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">OFFRE EXCEPTIONNELLE CETTE SEMAINE</h2>
                    <p>NOUVELLE COLLECTION JUSQU'À -50%</p>
                    <a class="primary-btn cta-btn" href="#">Acheter maintenant</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->



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
                                @foreach ($produit as $key=>$item)
                                 <li class="@if($key==0) active @endif">
                                    <a href="{{ route('produit_path',$idCathegorie=encrypt($item->id_col)) }}">{{ $item->collection }}</a>
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
                            <div id="rafraichisseur" data-size="{{ $produit->total() }}"></div>

                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-6">
                                    <!-- product -->
                                    @foreach ($produit as $key=>$item)
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
                                                    <h3 class="product-name"><a href="{{ route('detail_produit_path',$item->id) }}" data-toggle="modal">{{ $item->nom }}</a></h3>
                                                    <h4 class="product-price"> {{ number_format($item->prix,'0',',',env('FORMATEUR')) .' '.env('DEVISE')}}  </h4>
                                                    <div class="product-rating">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <i class="fa fa-check-circle-o text-danger"></i>
                                                        @endfor
                                                    </div>
                                                    <div class="product-btns">
                                                        <button class="add-to-wishlist souhait" data-souhait="{{ $item->id }}"><i class="fa fa-heart-o"></i><span class="tooltipp">Ajouter a vos souhaits</span></button>
                                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Ajouter pour comparer</span></button>
                                                        <button class="quick-view">  <a href="{{ route('detail_produit_path',$item->id) }}"><i class="fa fa-eye"></i></a> <span class="tooltipp">Cliquez pour voir</span></button>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <button class="add-to-cart-btn pannier" data-id="{{ $item->id }}" data-qte="f" ><i class="fa fa-shopping-cart"></i> Ajouter à la carte</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- /product -->

                                </div>
                                <div id="slick-nav-6" class="products-slick-nav"></div>
                            </div>
                            <input type="hidden" data-toggle="modal" data-target="#modal-notification" class="notificateur">

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


                @for ($i = 2; $i <= 4; $i++)
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Meilleures Ventes</h4>
                        <div class="section-nav">
                            <div id="slick-nav-{{ $i }}" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-{{ $i }}">
                        <div>
                            @foreach ($produit as $key=>$item)
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
                                        <h3 class="product-name"><a href="{{ route('detail_produit_path',$item->id) }}">{{ $item->nom }}</a></h3>
                                        <h4 class="product-price">{{ $item->prix }} <del class="product-old-price">{{ $item->prix +($item->prix*0.3) }}</del></h4>
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
                            @foreach ($produit as $key=>$item)
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
                                        <h3 class="product-name"><a href="{{ route('detail_produit_path',$item->id) }}">{{ $item->nom }}</a></h3>
                                        <h4 class="product-price">{{ $item->prix }} <del class="product-old-price">{{ $item->prix +($item->prix*0.3) }}</del></h4>
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
        <!-- /container -->
    </div>
    <!-- /SECTION -->

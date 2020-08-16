<div>



    <!-- SECTION -->
    <div class="section" style="margin-top: -7%">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">




                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab3">Commentaires ({{ sizeOf($this->commentaires) }})</a></li>
                            <li><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Détails</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            Nos {{ $produit->nom }}(s) sont confirmés sur le marché et la qualité est
                                            également apprecié par nos clients
                                            étant en possession de ce dernier. avec une garantie incontestable nous
                                            vous livrons votre commande en toute sécurité tout en vous permettant de
                                            fournir un
                                            avis sur le produit pendant l'utilisation.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            Nos {{ $produit->nom }}(s) sont confirmés sur le marché et la qualité est
                                            également apprecié par nos clients
                                            étant en possession de ce dernier. avec une garantie incontestable nous
                                            vous livrons votre commande en toute sécurité tout en vous permettant de
                                            fournir un
                                            avis sur le produit pendant l'utilisation.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in active" class="ajouter">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">

                                        @if (sizeOf($this->decompte)==0)


                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>{{ sizeOf($this->decompte)}}</span>
                                                <div class="rating-stars">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                @for ($d = 5; $d >=1 ; $d--)
                                                @php
                                                    $total=0;
                                                    $test=true;
                                                @endphp
                                                <li>
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($d<$i)
                                                            <i class="fa fa-star-o"></i>
                                                            @else
                                                            <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">
                                                        0
                                                    </span>
                                                </li>
                                                @endfor

                                            </ul>
                                        </div>




                                        @else
                                        <div id="rating">
                                            @php
                                                $decompte=0;
                                                foreach ($this->decompte as $key => $value) {
                                                    $decompte=$decompte + $value->etoile;
                                                }
                                                $test=true;
                                            @endphp
                                            <div class="rating-avg">
                                                <span>{{ $compteur=number_format($decompte/(sizeOf($this->decompte)),'1' )}}</span>
                                                <div class="rating-stars">
                                                    @for ($i = 1; $i <= (int)$compteur; $i++)
                                                        @if ($compteur<$i)
                                                        @if (fmod($compteur , 1) && $test)
                                                        <i class="fa fa-star-half-o text-danger" ></i>
                                                        @php
                                                            $test=false;
                                                        @endphp
                                                        @else
                                                        <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @else
                                                         <i class="fa fa-star"></i>
                                                         @endif
                                                    @endfor

                                                    @for ($t = 0; $t < (int)((5-$compteur)+1 ); $t++)
                                                        @if (fmod($compteur , 1) && $test)
                                                        <i class="fa fa-star-half-o text-danger" ></i>
                                                        @php
                                                            $test=false;
                                                        @endphp
                                                        @else
                                                        <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                @for ($d = 5; $d >=1 ; $d--)
                                                @php
                                                    $total=0;
                                                    $test=true;
                                                @endphp
                                                <li>
                                                    <div class="rating-stars">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($d<$i)
                                                            <i class="fa fa-star-o"></i>
                                                            @else
                                                            <i class="fa fa-star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">
                                                       @foreach ($this->decompte as $item)
                                                           @if ($item->etoile==$d)
                                                              @php
                                                                  $total=$total+1
                                                              @endphp
                                                              @php
                                                                  $test=false;
                                                              @endphp
                                                           @endif
                                                       @endforeach

                                                       @if (!$test)
                                                           {{ $total }}
                                                           @else
                                                           0
                                                       @endif
                                                    </span>
                                                </li>
                                                @endfor

                                            </ul>
                                        </div>
                                        @endif

                                    </div>
                                    <!-- /Rating -->

                                    @if (sizeOf($this->commentaires)==0)
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <h3 class="text-danger text-center">Aucun commentaire pour le moment.</h3>
                                        </div>
                                    </div>
                                    @else
                                        <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">

                                                @foreach ($this->commentaires as $item)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{ $item->nom }}</h5>
                                                        {{-- @php
                                                            $date=Date($item->created_at);
                                                        @endphp --}}
                                                        <p class="date">{{ $item->created_at }}</p>
                                                        <div class="review-rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($item->etoile < $i)
                                                                <i class="fa fa-star-o empty"></i>
                                                                @else
                                                                <i class="fa fa-star"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p>
                                                            {{ $item->commentaire }}
                                                        </p>
                                                    </div>
                                                </li>
                                                @endforeach



                                            </ul>

                                        </div>
                                        <div class="text-center">
                                            {{ $this->commentaires->links() }}
                                        </div>
                                    </div>
                                    <!-- /Reviews -->
                                    @endif

                                    <!-- Review Form -->
                                    <div class="col-md-3">

                                        @if(!auth()->check())


                                        <div id="review-form">
                                            <form class="review-form">
                                                <input class="input" type="text" placeholder="Votre nom"
                                                    wire:model='nom'
                                                    value="{{ (auth()->user())? auth()->user()->nom : null }}" required>
                                                <input class="input" type="email" placeholder="Votre Email"
                                                    wire:model='email' required>
                                                <textarea class="input" placeholder="Votre commentaire"
                                                    wire:model='commentaire' required></textarea>
                                                <div class="input-rating">
                                                    <span>Votre note: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" type="radio"><label
                                                            for="star5"></label>
                                                        <input id="star4" name="rating" type="radio"><label
                                                            for="star4"></label>
                                                        <input id="star3" name="rating" type="radio"><label
                                                            for="star3"></label>
                                                        <input id="star2" name="rating" type="radio"><label
                                                            for="star2"></label>
                                                        <input id="star1" name="rating" type="radio"><label
                                                            for="star1"></label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="alert alert-danger">
                                            <span>veuillez vous connecter avant d'émètre un commentaire</span>
                                        </div>
                                        @else
                                        @if (session()->has($type))
                                        <div class="alert alert-{{ $type }} text-center">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @endif
                                        <div id="review-form" style="margin-top: ">
                                            <form class="review-form" wire:submit.prevent='comment'>
                                                <input class="input" type="text" placeholder="Votre nom"
                                                    wire:model='nom' value="{{ $nom }}" required>
                                                <input class="input" type="email" placeholder="Votre Email"
                                                    wire:model='email' required>
                                                <textarea class="input" placeholder="Votre commentaire"
                                                    wire:model='commentaire' required></textarea>
                                                <div class="input-rating">
                                                    <span>Votre note: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="rating" wire:click='etoile(5)'
                                                            type="radio"><label for="star5"></label>
                                                        <input id="star4" name="rating" wire:click='etoile(4)'
                                                            type="radio"><label for="star4"></label>
                                                        <input id="star3" name="rating" wire:click='etoile(3)'
                                                            type="radio"><label for="star3"></label>
                                                        <input id="star2" name="rating" wire:click='etoile(2)'
                                                            type="radio"><label for="star2"></label>
                                                        <input id="star1" name="rating" wire:click='etoile(1)'
                                                            type="radio" checked><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn t" id="envoyer">Envoyer</button>
                                                <input type="hidden" id="notif" data-toggle="modal" data-target="#notification">
                                            </form>
                                        </div>

                                        @endif

                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->




    <!-- store products -->
    <div class="row">
        <div class="section-title text-center" style="margin-top: 4%">
            <h5 class="title">
                Ceux qui ont achetés le produit <a href="#!">{{ $this->produit->nom }}</a> ont également
                 aimés ces produits ci.
            </h5>
        </div>
        <div id="rafraichisseur" data-size="{{ sizeOf($this->produits) }}"></div>
        @foreach ($this->produits as $key=>$item)
        <!-- product -->
        <div class="col-md-3 col-xs-6">
            <div class="product">
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
                <div class="product-body">
                    <p class="product-category">{{ $item->collection }}</p>
                    <h3 class="product-name"><a href="#" data-toggle="modal"
                            wire:click='detail({{ $item->id }})'>{{ $item->nom }}</a></h3>
                    <h4 class="product-price">{{ $item->prix }} <del
                            class="product-old-price">{{ $item->prix+ $item->prix *0.3 }}</del></h4>
                    <div class="product-rating">
                        <i class="fa fa-check-circle-o text-danger"></i>
                        <i class="fa fa-check-circle-o text-danger"></i>
                        <i class="fa fa-check-circle-o text-danger"></i>
                        <i class="fa fa-check-circle-o text-danger"></i>
                        <i class="fa fa-check-circle-o text-danger"></i>
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                class="tooltipp">Ajouter a vos souhaits</span></button>
                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                class="tooltipp">Ajouter pour comparer</span></button>
                        <button class="quick-view" wire:click='detail({{ $item->id }})'><i
                                class="fa fa-eye"></i><span class="tooltipp">Cliquez pour
                                voir</span></button>
                    </div>
                </div>
                <div class="add-to-cart">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                </div>
            </div>
        </div>
        @endforeach


        <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

    </div>
    <!-- /store products -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->





</div>

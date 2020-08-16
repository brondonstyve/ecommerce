<div class="section" style="margin-top: 2%">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            @php
            $image=explode('|',$produit->image);
            @endphp
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2" style="max-height: 1%">

                <div id="product-main-img">
                    @foreach ($image as $key=>$item)
                    @if ($key!=0)
                    <div class="product-preview">
                        <img src="{{ 'storage/'.$item }}" alt="">
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5 col">
                <div id="product-imgs">
                    @foreach ($image as $key=>$item)
                    @if ($key!=0)
                    <div class="product-preview">
                        <img src="{{ 'storage/'.$item }}" alt="">
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <!-- /Product thumb imgs -->
            <div class="rating-stars">

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{ $produit->nom }}</h2>
                            @if (sizeOf($comment)==0)


                            <div>
                                <div class="product-rating">
                                     <i class="fa fa-star-o"></i>
                                     <i class="fa fa-star-o"></i>
                                     <i class="fa fa-star-o"></i>
                                     <i class="fa fa-star-o"></i>
                                     <i class="fa fa-star-o"></i>
                                </div>
                                <a class="review-link" href="#">0 Commentaire | Soyez le premier à ajouter votre avis</a>
                            </div>


                                @else
                                <div>
                                    @php
                                        $decompte=0;
                                        foreach ($comment as $key => $value) {
                                        $decompte=$decompte + $value->etoile;
                                        }
                                        $test=true;
                                    @endphp
                                    <div class="product-rating">
                                        <span>@php $compteur=number_format($decompte/(sizeOf($comment)),'1' ) @endphp</span>
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
                                    <a class="review-link" href="#">{{ sizeOf($comment) }} Commentaire(s) | Ajouter votre avis</a>
                                </div>
                            @endif

                            <div>
                                <h3 class="product-price">{{ $produit->prix }} <del
                                        class="product-old-price">{{ $produit->prix +$produit->prix*0.3 }}</del></h3>
                                <span
                                    class="product-available">{{ ($produit->quantite!=0)? 'En Stock' : 'Stock terminé' }}</span>
                            </div>
                            <p class="text-justify">
                                Nos {{ $produit->nom }}(s) sont confirmés sur le marché et la qualité est également
                                apprecié par nos clients
                                étant en possession de ce dernier. avec une garantie incontestable nous
                                vous livrons votre commande en toute sécurité tout en vous permettant de fournir un
                                avis sur le produit pendant l'utilisation.
                            </p>

                            <div class="product-options">
                                <label>
                                    Taille
                                    <select class="input-select">
                                        <option value="0">X</option>
                                    </select>
                                </label>
                                <label>
                                    Couleur
                                    <select class="input-select">
                                        <option value="0">Red</option>
                                    </select>
                                </label>
                            </div>


                            <label class="text-xl-center">Qté max: {{ $produit->quantite }}</label>
                            <div class="add-to-cart">
                                <div class="qty-label">

                                    Qté
                                    <div class="input-number">
                                        <input type="number" value='1' min='1' max='{{ $produit->quantite }}'
                                            data-val="{{ $produit->quantite }}" id="max">
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>

                            <ul class="product-btns">
                                <li><a href="#"><i class="fa fa-heart-o"></i> ajouter à vos souhaits</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> ajouter pour comparer</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Catégorie:</li>
                                <li><a href="#">{{ $produit->collection }}</a></li>
                            </ul>

                            <ul class="product-links">
                                <li>Partager:</li>
                                <li><a href="#"><i class="fa fa-facebook text-primary"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter text-primary"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram text-danger"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus text-red"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <!-- /Product details -->
            </div>
        </div>
    </div>

    @livewire('detail-produit',['id'=>$parrametre])

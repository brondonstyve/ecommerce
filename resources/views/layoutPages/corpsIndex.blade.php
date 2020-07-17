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
                                <li class="active"><a data-toggle="tab" href="#tab1">Ordinateurs</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessoires</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Categorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product03.png" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product04.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product05.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
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
    <!-- /SECTION -->

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Jours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Heures</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Minutes</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secondes</span>
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
                                <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab2">Accessoires</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product06.png" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product07.png" alt="">
                                            <div class="product-label">
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product08.png" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter a la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product09.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">ajouter à la liste des souhaits</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->

                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Catégorie</p>
                                            <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                            <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">ajouter pour comparer</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">voir</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ajouter au panier</button>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
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
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Meilleures Ventes</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Meilleures Ventes</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product08.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product09.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Meilleures Ventes</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product01.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product02.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product03.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>

                        <div>
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product04.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product05.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->

                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product06.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Catégorie</p>
                                    <h3 class="product-name"><a href="#">Nom du produit</a></h3>
                                    <h4 class="product-price">€980.00 <del class="product-old-price">€990.00</del></h4>
                                </div>
                            </div>
                            <!-- product widget -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

<div>
    <!-- SECTION -->
    <div class="products-tabs section">
        <!-- tab -->
        <div class="section-title">
            <h2>Cathégorie</h2>
         </div>
        <div id="tab1" class="container tab-pane active">
            <div class="row products-slick" data-nav="#cathegorie">
                @foreach ($this->cathegorie as $item)
                    <div class="col-md-4 col-xs-6">
                    <a href="{{ route('produit_path',$idCathegorie=encrypt($item->id)) }}">
                        <div class="shop">
                                <div class="shop-img">
                                    <img src="{{ 'storage/'.$item->image }}" alt="">
                                </div>
                                <div class="shop-body">
                                    <h3> {{ $item->nom }}</h3>
                                    <a href="{{ route('produit_path',$idCathegorie=encrypt($item->id)) }}" class="cta-btn">Consulter <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                    </a>
                    </div>
                @endforeach
            </div>
            <!-- /tab -->
        </div>
        <div id="cathegorie" class="products-slick-nav"></div>
    </div>
    <!-- /SECTION -->
</div>



</div>

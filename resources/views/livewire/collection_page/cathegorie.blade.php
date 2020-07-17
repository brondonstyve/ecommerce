<div>
    <!-- SECTION -->
    <div class="products-tabs section">
        <!-- tab -->
        <h3 class="text-center">Cathégorie</h3>

        <div id="tab1" class="container tab-pane active">
            <div class="row products-slick" data-nav="#cathegorie">
                @foreach ($this->cathegorie as $item)
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ 'storage/'.$item->image }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3> {{ $item->nom }}</h3>
                            <a href="#" class="cta-btn" data-toggle="modal" wire:click='consulter({{ $item->id }})'>Consulter <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div id="cathegorie" class="products-slick-nav"></div>
            <!-- /tab -->
        </div>
    </div>
    <!-- /SECTION -->
</div>



</div>

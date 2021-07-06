<div>


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
                            Trier par :
                            <select class="input-select">
                                <option value="0">Populaire</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Afficher par groupe de :
                            <select class="input-select"  wire:model='select'>
                                <option value="9"  @if($select == 9) disabled @endif>9</option>
                                <option value="16" @if($select == 16) disabled @endif>16</option>
                                <option value="28" @if($select == 28) disabled @endif>28</option>
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
                    <!-- product -->

                @foreach ($this->cathegorie as $item) 
                <div class="col-md-4 col-xs-6">
                    <div class="product">

                        <div class="product-img">
                            <img src="{{ 'storage/'.$item->image }}" alt="" wire:click='lien({{ $item->id }})'>
                            <a href="#!" wire:click='lien({{ $item->id }})'>
                                <div class="product-label">
                                    <span class="new">{{ $item->nom }}</span>
                                </div>
                            </a>

                        </div>
                        <div class="product-body">
                            <div class="product-btns">
                                <button class="quick-view" title="VOIR" tabindex="-1" data-target="#voirImage" id="voir" data-image="{{'storage/'.$item->image }}" data-toggle="modal">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>


                </div>
                <!-- /product -->
                <div class="clearfix visible-sm visible-xs"></div>

            </div>
            <!-- /store products -->
        @endforeach
            </div>
             <!-- store bottom filter -->
             <div class="text-right">
                    {{ $this->cathegorie->links() }}
            </div>
            <!-- /store bottom filter -->
            <!-- /STORE -->
        </div>
        <!-- /row -->

        <!-- ASIDE -->
        <div id="aside" class="col-md-3">
            <br>
            <br>
            <br>
            <br>
            <!-- aside Widget -->
            <div class="aside">
                <h3 class="aside-title">collection</h3>
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

                    @foreach ($this->cathegories as $key=>$item)

                    <div class="input-checkbox" >
                        <a href="#" >
                            @if($item->id==$selection)
                            <i class="fa fa-check-circle text-danger" wire:click='lien({{ $item->id }})'></i>
                            @else
                            <i class="fa fa-circle-o text-danger" wire:click='lien({{ $item->id }})'></i>
                            @endif
                            <label wire:click='lien({{ $item->id }})'>
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
                <h3 class="aside-title">Meilleures Ventes</h3>
                <div id="rafraichisseurVente" data-size="{{ $this->vente->total() }}"></div>
                @foreach ($this->vente as $item)
                <div class="product-widget">
                    <div class="product-img">
                        @php
                              $image=explode('|',$item->image);
                              $indice=rand(1,sizeOf($image)-1);
                              $image=$image[$indice];
                            @endphp
                            <img src="{{ 'storage/'.$image }}" alt="" id="remplacerVente{{ $key }}" wire:click='detail({{ $item->id }})'>
                    </div>
                    <div class="product-body">
                        <p class="product-category" ><a href="#!" wire:click='lien({{ $item->id_col }})'>{{ $item->collection }}</a></p>
                        <h3 class="product-name" ><a href="#!" wire:click='detail({{ $item->id }})'>{{ $item->nom }}</a></h3>
                        <h4 class="product-price">{{ $item->prix }} <del class="product-old-price"> {{ $item->prix + ($item->prix*0.3) }}</del></h4>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /aside Widget -->
        </div>
        <!-- /ASIDE -->
    </div>
    <!-- /container -->
</div>



 </div>

 @include('layoutPages.voirImage')
</div>

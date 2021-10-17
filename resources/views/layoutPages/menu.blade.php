  <!-- NAVIGATION -->
  <nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV --> 
            <ul class="main-nav nav navbar-nav">
                <li class="@if($title=='Index') active @endif"><a href="{{ route('index_path') }}">Accueil</a></li>
                <li class="@if($title=='MonPanier') active @endif"><a href="{{ route('mon_panier_path') }}">Mon Panier</a></li>
                <li class="@if($title=='Cathegorie') active @endif"><a href="{{ route('cathegorie_path') }}">Catégories</a></li>
                <li class="@if($title=='Produit') active @endif"><a href="{{ route('produit_path',$idCathegorie='s') }}">Produits</a></li>
                <li class="@if($title=='BlackDay') active @endif"><a href="{{ route('black_day_path') }}">Black Zone</a></li>
                <li class="@if($title=='Apropos') active @endif"><a href="{{ route('propos_path') }}">A Propos</a></li>
                <li class="@if($title=='Contact') active @endif"><a href="{{ route('contact_path') }}">Contact</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

@if ($title=='Index')
                <div class="alert alert-success alert-dismissible text-center" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">Bénéficier de nos réductions à chaque fin de semaine.</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @else
<div id="breadcrumb" class="section" style="margin-bottom: -2%">
    <!-- container -->

    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 text-center">

                <h3 class="breadcrumb-header">
                    @if ($title=='BlackDay')
                    Black Zone
                    @else
                    @if ($title=='MonPanier')
                              Mon Panier
                            @else
                            @if ($title=='MesSouhaits')
                            Mes Souhaits
                          @else
                          {{ $title }}

                      @endif
                        @endif
                    @endif
                </h3>

                <h3>

                </h3>
                <ul class="breadcrumb-tree  ">
                    <li><a href="{{ route('index_path') }}">Accueil</a></li>
                    <li class="active">
                        @if ($title=='BlackDay')
                        Black Zone
                        @else
                        @if ($title=='MonPanier')
                              Mon Panier
                            @else
                            @if ($title=='MesSouhaits')
                            Mes Souhaits
                          @else
                          {{ $title }}
                      @endif
                        @endif
                        @endif
                    </li>
                </ul>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endif

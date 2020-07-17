  <!-- NAVIGATION -->
  <nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ route('index_path') }}">Accueil</a></li>
                <li><a href="#">Bonnes Affaires</a></li>
                <li><a href="{{ route('cathegorie_path') }}">Catégories</a></li>
                <li><a href="{{ route('produit_path') }}">Produits</a></li>
                <li><a href="#">Black Day</a></li>
                <li><a href="#">A Propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->


<div id="breadcrumb" class="section" style="margin-bottom: -2%">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12 text-center">
                @if ($title=='Index')
                    <h5>Bénéficier de nos réductions à chaque fin de semaine.</h5>
                @else
                <h3 class="breadcrumb-header">{{ $title }}</h3>
                <ul class="breadcrumb-tree  ">
                    <li><a href="{{ route('index_path') }}">Accueil</a></li>
                    <li class="active">{{ $title }}</li>
                </ul>
                @endif

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

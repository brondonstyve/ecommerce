<div>
        <!-- HEADER -->
        <header class="stabilisateur">
            <!-- TOP HEADER -->
            <div id="top-header">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li><a href="tel:+237 697 32 09 74"><i class="fa fa-phone"></i> +237 697 32 09 74</a></li>
                        <li><a href="mail:brondonstyve@gmail.com"><i class="fa fa-envelope-o"></i> brondonstyve@gmail.com</a></li>
                        <li><a href="#!"><i class="fa fa-map-marker"></i> Yaoundé, Cameroun</a></li>
                    </ul>
                    <ul class="header-links pull-right">
                        <li><a href="#"><i class="fa fa-euro"></i> EURO</a></li>
                        <li><a href="{{ route('compte_path') }}"><i class="fa fa-user-o"></i> Mon Compte</a></li>
                        @if (auth()->check())
                        <li><a href="{{ route('deconnexion_path') }}"><i class="fa fa-lock"></i> deconnexion</a></li>
                        @else
                        <li><a href="{{ route('connexion_path') }}"><i class="fa fa-user-circle"></i> connexion</a></li>
                        @endif

                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="{{ route('index_path') }}" class="logo">
                                    <img src="./img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form>
                                    <select class="input-select">
                                            <option value="0">Tout</option>
                                            @foreach ($this->cathegorie as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                            @endforeach
                                        </select>
                                    <input class="input" placeholder="Recherchez ici ...">
                                    <button class="search-btn">Rechercher</button>
                                </form>
                            </div>
                        </div>

                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="col-md-3 clearfix" >
                            <div class="header-ctn">
                                <!-- Wishlist -->
                                @livewire('addsouhait')
                                <!-- /Wishlist -->

                                <!-- Cart -->
                                    
                                    @livewire('pannier')

                            </div>
                                <!-- /Cart -->

                                <!-- Menu Toogle -->
                                <div class="menu-toggle">
                                    <a href="#">
                                        <i class="fa fa-bars"></i>
                                        <span>Menu</span>
                                    </a>
                                </div>
                                <!-- /Menu Toogle -->
                            </div>
                        </div>
                        <!-- /ACCOUNT -->
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
        </header>
        <!-- /HEADER -->

        @include('layoutPages.notification')
</div>

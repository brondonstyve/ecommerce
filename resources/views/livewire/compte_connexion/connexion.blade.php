@if (session()->has('error_connexion'))
    <div class="alert alert-danger text-center">
        <span class="text-danger">{!! session('error_connexion') !!}</span>
    </div>
@endif

<div>
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7" style="float: left">
                <br>
                <!-- Billing Details -->
                @if (session()->has('error'))
                <div class="billing-details ">
                    <img src="img/error-connect.jpg" alt="" width="70%">
                </div>
                @else
                <div class="billing-details ">
                    <img src="img/connexion.jpg" alt="" width="100%">

                </div>
                @endif

                <!-- /Billing Details -->
            </div>
            <!-- Order Details -->
            <div class="col-md-5  product" style="float: right"><!-- Shiping Details -->
                <br>

                <div class="shiping-details">
                    <div class="section-title  text-center">
                        <h3 class="title text-danger">Se Connecter ici</h3>
                    </div>
                    <div class="input-checkbox">
                        <form  wire:submit.prevent='connexion'>
                            <div class="">

                                <span>Téléphone</span>
                                <div class="input-group mb-2 mr-sm-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                  </div>
                                  <input class="form-control" type="tel" wire:model="telephone" value="{{ $telephone }}" placeholder="ex: 697320974" pattern="[0-9]{9}" required>
                              </div>


                              <span>Mot de Passe</span>
                              <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                </div>
                                <input  class="form-control" type="{{ $type }}" wire:model="mdp" placeholder="*******" minlength="6" required>
                                <span class="input-group-text" wire:click="voir()"> @if($testeur) <i class="fa fa-eye"></i> @else <i class="fa fa-eye-slash"></i> @endif </span>
                              </div>
                                <br>
                                <div class="form-group text-right">
                                    <div class="input-checkbox"><br>
                                            Je n'ai pas encore de <a href="{{ route('compte_path') }}">compte</a><br><br>
                                            <a href="{{ route('compte_path') }}">créer un compte?</a>
                                    </div>
                                </div>
                                @if (session()->has('error'))
                                <div class="alert alert-danger text-center">
                                    <span class="text-danger">{{ session('error') }}</span>
                                </div>
                                @endif
                                <div class="form-group text-center">
                                    <button type="submit" class="btn primary-btn" wire:target='connexion' wire:loading.remove>Connexion</button>
                                    <input type="button" class="btn primary-btn" value="Patientez..." wire:target='connexion' wire:loading >
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Shiping Details -->


            </div>
            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-5 product">
                <br>
                <!-- Billing Details -->
                <div class="billing-details ">

<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            <span>{{ session('error') }}</span>
        </div>
    @endif
    <form wire:submit.prevent='creerCompte'>
        @csrf
     <div class="section-title text-center">
         <h3 class="title text-danger"> Créer un compte </h3>
     </div>

  <span>Nom</span>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-user"></i></div>
    </div>
    <input type="text" class="form-control" name="nom" wire:model="nom" placeholder="Brondon styve" value="{{ $nom }}" required>
  </div>

  <span>Téléphone</span>
  <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-phone"></i></div>
    </div>
    <input class="form-control" type="tel" wire:model="telephone" name="telephone" value="{{ $telephone }}" placeholder="ex: 697320974" pattern="[0-9]{9}" required>
</div>
    @if (session()->has('error'))
      <span class="text-danger">{{ session('error') }}</span>
      <br>
    @endif

<span>Mot de Passe</span>
<div class="input-group mb-2 mr-sm-2">
  <div class="input-group-prepend">
    <div class="input-group-text"><i class="fa fa-lock"></i></div>
  </div>
  <input  class="form-control" type="{{ $type }}" wire:model="mdp" name="mdp" placeholder="*******" minlength="6" required>
  <span class="input-group-text" wire:click="voir()"> @if($testeur) <i class="fa fa-eye"></i> @else <i class="fa fa-eye-slash"></i> @endif </span>
</div>


<span>Confirmer Mot de Passe</span>
<div class="input-group mb-2 mr-sm-2">
  <div class="input-group-prepend">
    <div class="input-group-text"><i class="fa fa-lock"></i></div>
  </div>
  <input  class="form-control" type="{{ $type1 }}" wire:model="mdpc" name="mdpc" placeholder="*******" minlength="6" required>
  <span class="input-group-text"  wire:click="voirc()">@if($testeur1) <i class="fa fa-eye"></i> @else <i class="fa fa-eye-slash"></i> @endif</span>
</div>
@if (session()->has('error_mdp'))
      <span class="text-danger">{{ session('error_mdp') }}</span>
      <br>
    @endif

     <div class="form-group" >
             <input type="checkbox" id="" required>
                 Accepter nos termes de licence?
     </div>



     <div class="form-group text-center" >
         <button type="submit" class="btn primary-btn" wire:loading.remove wire:target="creerCompte">Créer un compte</button>
         <button  class="btn primary-btn" wire:loading wire:target="creerCompte">Patienter...</button>
     </div>


     <br>
                                <div class="form-group text-right">
                                    <div class="input-checkbox"><br>
                                            Vous avez déjà un <a href="{{ route('connexion_path') }}">compte?</a><br>
                                            <a href="{{ route('connexion_path') }}">Connectez vous ici</a>
                                    </div>
                                </div>
    </form>


</div>



                </div>
                <!-- /Billing Details -->
            </div>


            <!-- Order Details -->
            @if (!session()->has('error'))
            <div class="col-md-7" style="float: right;margin-top: -3%"><!-- Shiping Details -->
                <div class="shiping-details">
                    <img src="img/compte.jpg" alt="" width="100%">
                </div>
            </div>
            @else
            <div class="col-md-5" style="float: right;margin: 6%"><!-- Shiping Details -->
                <div class="shiping-details">
                    <img src="img/echec.jpg" alt="" width="80%">
                    <h3>{{ session('error') }}.</h3>
                </div>
            </div>
            @endif

            <!-- /Order Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->


</div>

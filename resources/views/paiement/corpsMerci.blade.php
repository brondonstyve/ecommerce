@include('layoutPages.css')
@include('layoutPages.header')
@include('layoutPages.menu')


<div class="col-md-12 text-white " style="margin-top: -10%; margin-bottom: -15%">
    <div>
  <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
      <div class="modal-content bg-gradient-danger">

          <div class="modal-header">
              <h6 class="modal-title text-white" style="font-size: 15px" id="modal-title-notification">Message de succès de paiement.</h6>
              <button type="button" class="close text-white" >
                  <a href="{{route('cathegorie_path')}}">
                  <span aria-hidden="true">×</span>
                    
                </a>
              </button>
          </div>

          <div class="modal-body">

              <div class="py-3 text-center">
                  <i class="fa fa-bell fa-3x"></i>
                  <h4 class="heading mt-4">Votre paiement a été éffectué avec succès. <br>
                    
                    Nous vous remercions de nous faire confiance!
                </h4>
                  <p class="msg-panier"></p>
              </div>

          </div>

          <div class="modal-footer">
              <a href="{{route('cathegorie_path')}}">
                <button type="button" class="btn btn-danger text-white ml-auto" data-dismiss="modal">Continuer les achats</button>
              </a>
          </div>

      </div>
  </div>
</div>

</div>
@include('layoutPages.footer')
@include('layoutPages.script')



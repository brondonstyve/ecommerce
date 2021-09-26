<div>


    <div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


<form method="POST" action="{{route('validerPaiement_path')}}" id="payment-form"  class=" my-4">
  @csrf
            <div id="card-element"><!--Stripe.js injects the Card Element--></div>
            
            <p id="card-error" class="mt-4"  role="alert">

            </p>

            <button id="submit"  class="btn btn-success mt-4">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Proceder au paiement</span>
              </button>
              
            <p class="result-message hidden">
              Payment succeeded, see the result in your
              <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
            </p>
          </form>
    </div>
</div>
</div>
</div>




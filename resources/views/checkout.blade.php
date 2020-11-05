@extends('layouts.app')

@section('content')
<style type="text/css">
  /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>
  <div class="container">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Checkout</div>
        <div class="card-body">
          <form action="/charge" method="post" id="payment-form">
            @csrf
            <div class="form-group">
              <label>Name</label>
                <input
                  type="text"
                  name="name"
                  id="name"
                  class="form-control"
                  required="">
            </div>
            <div class="form-group">
              <label>Adress</label>
                <input
                  type="text"
                  name="address"
                  id="address"
                  class="form-control"
                  required="">
            </div>
            <div class="form-group">
              <label>City</label>
                <input
                  type="text"
                  name="city"
                  id="city"
                  class="form-control"
                  required="">
            </div>
            <div class="form-group">
              <label>State</label>
                <input
                  type="text"
                  name="state"
                  id="state"
                  class="form-control"
                  required="">
            </div>
            <div class="form-group">
              <label>Postal code</label>
                <input
                  type="text"
                  name="postalcode"
                  id="postalcode"
                  class="form-control"
                  required="">
            </div>
            <div class="">
              <input
                type="hidden"
                name="amount"
                value="{{$amount}}">
                <div class="">
                  <label for="card-element">
                  Credit or debit card
                  </label>
                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>
                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert">
                  </div>
                </div>
                {{-- <hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr> --}}
              <button class="btn btn-primary" type="submit">
                Submit Payment
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript">
// window.onload() = function(){
// Create a Stripe client.
// Note: this merchant has been set up for demo purposes.
var stripe = Stripe('pk_test_51HkA4PFaMimBrgG1wnREte0DaKOPM8x2YdhNwMWkY2iOBL96ZLkGIjWE7nxRtC3SWc2xErYAsfzFQJdTk2OxD0Tz00NlMQWqiv');
// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options =
  {
    name:document.getElementById('name').value,
    adress_line1:document.getElementById('adresss').value,
    adress_city:document.getElementById('city').value,
    adress_state:document.getElementById('state').value,
    adress_postalcode:document.getElementById('postalcode').value
  }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
// }
</script>
@endsection

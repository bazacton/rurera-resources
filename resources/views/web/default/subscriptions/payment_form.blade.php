@include('web.default.subscriptions.steps',['activeStep'=> 'payment'])
@php $subscribed_for_months = (isset( $subscribed_for ) && $subscribed_for == 12)? 12 : 1;
$subscribed_for_label = ($subscribed_for_months == 12)? 'Year' : 'Month';

$discount_percentage = ($subscribed_for_months == 12)? 25 : 0;
$selected_package_price = $packageObj->price*$subscribed_for_months;


$discounted_amount = ($selected_package_price*$discount_percentage) / 100;
$selected_package_price = $selected_package_price-$discounted_amount;

@endphp
<style>


.hidden {
  display: none;
}

#payment-message {
  color: rgb(105, 115, 134);
  font-size: 16px;
  line-height: 20px;
  padding-top: 12px;
  text-align: center;
}

#payment-element {
  margin-bottom: 24px;
}

/* Buttons and links */
button {
    border: 0;
    padding: 12px 16px;
    font-weight: 600;
    transition: all 0.2s ease;
    box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    width: 100%;
}
button:hover {
  filter: contrast(115%);
}
button:disabled {
  opacity: 0.5;
  cursor: default;
}


@-webkit-keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>

<div class="payment-options-holder panel-border bg-white rounded-sm p-25 mb-40 mt-30">
    <div class="selected-plan-data mb-40">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="text-box">
                    <h2 class="font-22 mb-20">Selected Plan</h2>
                    <h5 class="mb-10">{{$packageObj->title}}</h5>
                    <p class="mb-10">Text here</p>
                    <div class="package-price mb-25" data-price_amount="{{$packageObj->price*$subscribed_for_months}}"><strong>{{ addCurrencyToPrice(($selected_package_price)) }}</strong> / {{$subscribed_for_label}}</div>
                    <div class="packages-back-btn font-weight-500 mb-15 font-16" data-subscribed_for="{{$subscribed_for_months}}" data-user_id="{{$user_id}}">Change Package</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row discount-code-block">
        <div class="col-12 col-lg-12 col-md-12 col-sm-12">
            <div class="book-form">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-9 col-sm-12">
                        <div class="form-group">
                            <p>Have a discount code?</p>
                            <div class="input-field"><input type="text" class="coupon_code" placeholder="Enter Code"/></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-3 col-sm-12">
                        <a href="javascript:;" class="nav-link btn-primary rounded-pill coupon-code-apply">Apply</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="book-form-holder">
        <div class="container">
        <div class="card-gateway-fields-holder">
            <h2 class="font-22 mb-15">Payment details</h2>
            <div class="row mb-10">
                <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                    @if( isset( $subscribed_childs ) && $subscribed_childs == 0)
                    <p>No need to worry! We won't ask for payment until after your 7-day free trial ends.</p>
                    @endif
                    <p>By proceeding, you let rurera.com charge from your card for future payments as per their <a href="/terms-and-conditions">terms and conditions</a>.</p>
					<br><br>
					<p>After submission, you will be redirected to securely complete next steps.</p>
					<div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center"><a href="javascript:;" data-user_id="{{isset($user_id)? $user_id : 0}}" data-subscribed_for="{{isset($subscribed_for)? $subscribed_for : 0}}" class="nav-link btn-primary rounded-pill mb-25 process-payment">Take me to Payment</a></div>
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12 rurera-hide">
                <form id="payment-form">
                      <div id="payment-element">
                        <!--Stripe.js injects the Payment Element-->
                      </div>
                      <button id="submit" class="btn-primary mb-25">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pay now</span>
                      </button>
                      <div id="payment-message" class="hidden"></div>
                    </form>
                </div>
                <div class="col-12 col-lg-12 col-md-12 col-sm-12  rurera-hide">
                    <div class="book-form mt-30">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <ul class="tests-list payment-methods mb-15">
                                    <li data-type="card-gateway" class="active"><img src="/assets/default/svgs/card-credit.svg" alt=""> Card</li>
                                    <li data-type="googlepay-gateway" class="process-payment1" data-user_id="{{isset($user_id)? $user_id : 0}}" data-subscribed_for="{{isset($subscribed_for)? $subscribed_for : 0}}"><img src="/assets/default/svgs/stripe-pay.svg" class="google-icon" alt=""> Pay with Stipe</li>
                                </ul>
                            </div>
                            <div class="card-gateway-fields conditional-fields row">
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-field"><input type="text" placeholder="First Name"/></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-field"><input type="text" placeholder="Last Name"/></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <span class="form-label">Card Number</span>
                                    <div class="form-group">
                                        <div class="input-field input-card">
                                            <span class="icon-svg">
                                                <img src="/assets/default/svgs/card.svg" height="24" width="24" alt="card">
                                            </span>
                                            <input type="text" placeholder="Card Number"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                  <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span class="form-label">Expiry</span>
                                            <div class="form-group">
                                                <div class="input-field">
                                                    <input type="text" placeholder="MM / YY">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                            <span class="form-label">CVC</span>
                                            <div class="form-group">
                                                <div class="input-field">
                                                    <input type="text" placeholder="CVC">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <span class="form-label">Country</span>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="USA">USA</option>
                                                <option value="France">France</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                                    <span class="form-label">Postel Code</span>
                                    <div class="form-group">
                                        <div class="input-field">
                                            <input type="text" placeholder="WS11 1DB">
                                        </div>
                                    </div>
                                </div>

                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                @if( isset( $subscribed_childs ) && $subscribed_childs == 0)
                                <p class="mb-25">
                                    Once your 7-day free trial is over, we will automatically charge your chosen payment method ${{$payment_amount}} every month until you decide to cancel. You have the freedom to
                                    cancel at any time.
                                    Keep in mind that there may be sales tax added. For instructions on how to cancel, please refer to the provided guidelines
                                </p>
                                @endif
                            </div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center"><a href="javascript:;" data-user_id="{{isset($user_id)? $user_id : 0}}" data-subscribed_for="{{isset($subscribed_for)? $subscribed_for : 0}}" class="nav-link btn-primary rounded-pill mb-25 process-payment">Sart Free Trial</a></div>
                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">
                                <p class="mb-20">By Clicking on Start Free Trial, I agree to the<a href="#">Terms of Service</a>And<a href="#">Privacy Policy</a></p>
                                <div class="secure-server">
                                    <figure>
                                      <img src="/assets/default/svgs/server-lock.svg" height="26" width="26" alt="">
                                    </figure>
                                    <span>
                                        Secure Server<br/>
                                        SSL Encrypted
                                    </span>
                                </div>
                            </div>
                            </div>
                            <div class="googlepay-gateway-fields conditional-fields rurera-hide payment-content p-25">
                                @if( isset( $subscribed_childs ) && $subscribed_childs == 0)
                                <p class="mb-25">
                                    Once your 7-day free trial is over, we will automatically charge your chosen payment method $5 every month until you decide to cancel. You have the freedom to
                                    cancel at any time.
                                    Keep in mind that there may be sales tax added. For instructions on how to cancel, please refer to the provided guidelines
                                </p>
                                @endif
                                <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center"><a href="javascript:;" data-user_id="{{isset($user_id)? $user_id : 0}}" data-subscribed_for="{{isset($subscribed_for)? $subscribed_for : 0}}" class="nav-link btn-primary rounded-pill mb-25 process-payment">Take me to Stripe Site</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
	$(document).on('click', '.coupon-code-apply', function (e) {
		var thisObj = $(this);
		rurera_loader(thisObj, 'div');
        var coupon_code = $('.coupon_code').val();
		var package_price = $(".package-price").attr('data-price_amount');
        if( coupon_code != ''){
			$.ajax({
				type: "GET",
				url: '/subscribes/get-coupon-data',
				data: {"coupon_code": coupon_code, "package_price": package_price},
				success: function (return_data) {
					return_data = JSON.parse(return_data);
					$(".package-price strong").html(return_data.package_price_full);
					rurera_remove_loader(thisObj, 'div');
				}
			});
		}
    });
	
    $(document).on('click', '.payment-methods li', function (e) {
        var gateway_type = $(this).attr('data-type');
        $(".payment-methods li").removeClass('active');
        $(this).addClass('active');
        $(".conditional-fields").addClass('rurera-hide');
        $('.'+gateway_type+"-fields").removeClass('rurera-hide');
    });

    // This is your test publishable API key.
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');

    // The items the customer wants to buy
    const items = [{ id: "xl-tshirt" }];

    let elements;

    initialize();
    checkStatus();

    document
      .querySelector("#payment-form")
      .addEventListener("submit", handleSubmit);

    // Fetches a payment intent and captures the client secret
    async function initialize() {
       const { clientSecret } = await fetch("/subscribes/payment-secret", {
        method: "POST",
        headers: { "Content-Type": "application/json", 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        body: JSON.stringify({ items }),
      }).then((r) => r.json());

      elements = stripe.elements({ clientSecret });

      const paymentElementOptions = {
		layout: "tabs",
		payment_methods: [
		  {
			type: "card",
			card: {
			  iconStyle: "default",
			  hideIcon: false,
			  style: {
				base: {
				  iconColor: "#666EE8",
				  color: "#31325F",
				  fontWeight: 400,
				  fontFamily: "Arial, sans-serif",
				  fontSize: "16px",
				  fontSmoothing: "antialiased",
				  "::placeholder": {
					color: "#CFD7E0",
				  },
				},
			  },
			},
		  },
		  {
			type: "google_pay",
			style: {
			  base: {
				color: "#31325F",
				fontSize: "16px",
				"::placeholder": {
				  color: "#CFD7E0",
				},
			  },
			},
		  },
		],
	  };

      const paymentElement = elements.create("payment", paymentElementOptions);
      paymentElement.mount("#payment-element");
    }

    async function handleSubmit(e) {
      e.preventDefault();
      setLoading(true);

      const { error } = await stripe.confirmPayment({
        elements,
        confirmParams: {
          // Make sure to change this to your payment completion page
          return_url: "http://localhost/stripe-checkout/public/checkout.html",
        },
      });

      if (error.type === "card_error" || error.type === "validation_error") {
        showMessage(error.message);
      } else {
        showMessage("An unexpected error occurred.");
      }

      setLoading(false);
    }

    // Fetches the payment intent status after payment submission
    async function checkStatus() {
      const clientSecret = new URLSearchParams(window.location.search).get(
        "payment_intent_client_secret"
      );

      if (!clientSecret) {
        return;
      }

      const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

      switch (paymentIntent.status) {
        case "succeeded":
          showMessage("Payment succeeded!");
          break;
        case "processing":
          showMessage("Your payment is processing.");
          break;
        case "requires_payment_method":
          showMessage("Your payment was not successful, please try again.");
          break;
        default:
          showMessage("Something went wrong.");
          break;
      }
    }

    // ------- UI helpers -------

    function showMessage(messageText) {
      const messageContainer = document.querySelector("#payment-message");

      messageContainer.classList.remove("hidden");
      messageContainer.textContent = messageText;

      setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageContainer.textContent = "";
      }, 4000);
    }

    // Show a spinner on payment submission
    function setLoading(isLoading) {
      if (isLoading) {
        // Disable the button and show a spinner
        document.querySelector("#submit").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
      } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
      }
    }
</script>
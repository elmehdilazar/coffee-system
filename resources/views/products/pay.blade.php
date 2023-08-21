@extends('layouts.app')
@section("style")

@endsection
@section('content')
 <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg)') }};"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>paiment with paypal</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script src="https://www.paypal.com/sdk/js?client-id=AeSUOL0LBxvfiqBehR4sZd9e9R7-rORX7Yucmg8wx8dn29K_5v8wQ9q-ndv2yREBXby_MTWQ7Xx93Xd6&currency=USD"></script>
        <!-- Set up a container element for the button -->
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: "{{Session::get('total')}}" // Can also reference a variable or function
                            }
                        }]
                    });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {

                        window.location.href = '{{route("checkout.success_paiment")}}';
                    });
                }
            }).render('#paypal-button-container');
        </script>

    </div>
@endsection

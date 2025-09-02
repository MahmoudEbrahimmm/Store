<x-front-layout title="Order Payment">
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order Payment</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#">Create</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">

                    <div class="alert alert-info" id="payment-message" style="display:none;"></div>


                    <div class="mb-3 text-center text-white">
                        <h4>💳 الدفع الإلكتروني</h4>
                    </div>
                    <div class="card-body">

                        <form id="payment-form">

                            <div class="mb-3">
                                <label for="" class="mb-2">الاسم علي الكارت</label>
                                <input type="text" class="form-control" id="card-holder-name"
                                    required>
                            </div>


                            <div class="mb-3">
                                <label for="" class="mb-2">بيانات الكارت</label>
                                <input type="text" class="form-control" id="card-holder-name"
                                    required>
                            </div>

                            <div class="mb-3">

                                <div class="form-input form">
                                    <label for="" class="mb-2">Countris</label>
                                    <select name="addr[billing][country]" placeholder="Country" class="form-select">
                                        <option value="">country</option>
                                        @foreach ($countries as $code => $name)
                                            <option value="{{ $code }}">{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <button type="submit" id="submit" class="btn btn-primary mt-3 w-100">
                                <span id="button-text">Pay now</span>
                                <span id="spinner" style="display: none;">Processing...</span>
                            </button>

                            <div id="payment-message" class="text-center mt-3"></div>
                        </form>

                    </div>


                    {{-- <form action="" method="post" id="payment-form">
                        <div id="payment-element"></div>
                        <button type="submit" id="submit" class="btn btn-primary mt-3">
                            <span id="button-text">Pay now</span>
                            <span id="spinner" style="display: none;">Processing...</span>
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Stripe JS --}}
    <script src="https://js.stripe.com/v3/"></script>

    {{-- <script src="https://js.stripe.com/basil/stripe.js"></script> --}}

    <script>
        const stripe = Stripe("{{ config('services.stripe.publishable_key') }}");
        let elements;

        initialize();

        document.querySelector("#payment-form").addEventListener("submit", handleSubmit);

        // -------- 1. Create PaymentIntent --------
        async function initialize() {
            const {
                clientSecret
            } = await fetch("{{ route('stripe.paymentIntent.create', $order->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",

                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                // body: JSON.stringify({
                // }),
            }).then((r) => r.json());

            elements = stripe.elements({
                clientSecret
            });

            const paymentElement = elements.create("payment", {
                layout: "tabs"
            });
            paymentElement.mount("#payment-element");
        }

        // -------- 2. Handle form submit --------
        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            const {
                error
            } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: "{{ route('stripe.return', $order->id) }}",
                },
            });

            if (error) {
                showMessage(error.message);
                setLoading(false);
            }
        }

        // ------- UI helpers -------
        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");
            messageContainer.style.display = "block";
            messageContainer.textContent = messageText;

            setTimeout(() => {
                messageContainer.style.display = "none";
                messageContainer.textContent = "";
            }, 4000);
        }

        function setLoading(isLoading) {
            if (isLoading) {
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").style.display = "inline";
                document.querySelector("#button-text").style.display = "none";
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").style.display = "none";
                document.querySelector("#button-text").style.display = "inline";
            }
        }
    </script>
</x-front-layout>

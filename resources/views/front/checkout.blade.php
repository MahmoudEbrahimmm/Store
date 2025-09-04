<x-front-layout title="Checkout">
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href=" {{ route('home') }} "><i class="lni lni-home"></i> Home</a></li>
                        <li><a href=" {{ route('products.index') }} ">Shop</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!--====== Checkout Form Steps Part Start ======-->

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{-- // form checkout  --}}
                    <form :action="route('checkoout')" method="post">
                        @csrf
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input name="addr[billing][first_name]" type="text"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <input name="addr[billing][last_name]" type="text"
                                                                placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input name="addr[billing][email]" type="text"
                                                            placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input name="addr[billing][phone_number]" type="text"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Mailing Address</label>
                                                    <div class="form-input form">
                                                        <input name="addr[billing][street_address]" type="text"
                                                            placeholder="Mailing Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>City</label>
                                                    <div class="form-input form">
                                                        <input name="addr[billing][city]" type="text"
                                                            placeholder="City">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Post Code</label>
                                                    <div class="form-input form">
                                                        <input name="addr[billing][postal_code]" type="text"
                                                            placeholder="Post Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Region/State</label>
                                                    <div class="select-items">
                                                        <input name="addr[billing][state]" type="text"
                                                            placeholder="State" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Country</label>
                                                    <div class="form-input form">
                                                        <select name="addr[billing][country]" placeholder="Country"
                                                            class="form-control">
                                                            @foreach ($countries as $code => $name)
                                                                <option value="{{ $code }}">{{ $name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>My delivery and mailing addresses are the same.</p>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse"
                                                        data-bs-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">next
                                                        step</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </section>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <input name="addr[shipping][first_name]" type="text"
                                                                placeholder="First Name">
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <input name="addr[shipping][last_name]" type="text"
                                                                placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input name="addr[shipping][email]" type="text"
                                                            placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input name="addr[shipping][phone_number]" type="text"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Mailing Address</label>
                                                    <div class="form-input form">
                                                        <input name="addr[shipping][street_address]" type="text"
                                                            placeholder="Mailing Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>City</label>
                                                    <div class="form-input form">
                                                        <input name="addr[shipping][city]" type="text"
                                                            placeholder="City">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Post Code</label>
                                                    <div class="form-input form">
                                                        <input name="addr[shipping][postal_code]" type="text"
                                                            placeholder="Post Code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Region/State</label>
                                                    <div class="select-items">
                                                        <input name="addr[shipping][state]" type="text"
                                                            placeholder="State" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Country</label>
                                                    <div class="form-input form">
                                                        <select name="addr[billing][country]" placeholder="Country"
                                                            class="form-control">
                                                            @foreach ($countries as $code => $name)
                                                                <option value="{{ $code }}">{{ $name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                <li>

                            </ul>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">

                        <div class="checkout-sidebar-price-table mt-30">


                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>

                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="steps-form-btn button">
                                    <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">previous</button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
                {{-- // end form checkout  --}}

            </div>
        </div>
    </section>
    <!--====== Checkout Form Steps Part Ends ======-->

</x-front-layout>

<x-front-layout>

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url(https://pixpine.com/wp-content/uploads/2024/05/Free-Product-Branding-PSD-Mockup-2.jpg);">
                                <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            @foreach ($section as $product)
                                <div class="hero-small-banner"
                                style="background-image: url('{{ asset('storage/' . $product->image) }}');">
                                <div class="content text-white">
                                    <h2>
                                        <span class="text-white">{{$product->name}}</span>
                                        
                                    </h2>
                                    <h3 class="text-white">$ {{$product->price}}</h3>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Small Banner -->
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section" id="feature">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('app.featured categories') }}</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                
                    <!-- Start Single Category -->

                    @foreach ($products_featured as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-featured-categories :product="$product" />
                    </div>
                    @endforeach

                    <!-- End Single Category -->
                
                
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('app.trending product') }}</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">

                @foreach ($products_trending as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-product-trending :product="$product" />
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Special Offer -->
    <section class="special-offer section" id="special">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('app.special offer') }}</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            </div>
        </div>


    </section>
    <!-- End Special Offer -->



    <!-- Start Brands Area -->
    <div class="brands" id="brands">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">{{ __('app.popular brands') }}</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">

                    @foreach ($products_logo as $product)
                        <x-product-logo :product="$product" />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Brands Area -->

    <!-- Start Blog Section Area -->
    {{-- <section class="blog-section section" id="our">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('app.our latest news') }}</h2>
                        <p>There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="	https://cdn.salla.sa/EYYNv/yR16BpaGmlUdxlqyXOPmProSpHJ33jhh0Iu7WKYW.jpg"
                                    alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlfxcokUVCKgoRi-TzAkUlKxOJVw_mjFN2zw&s"
                                    alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG_eRKDRXHxRthkN3p5bUOYnM7l4canHBiqQ&s"
                                    alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                </a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Blog Section Area -->



</x-front-layout>

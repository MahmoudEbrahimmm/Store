<x-front-layout :title="$product->name">

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('products.index') }}">Shop</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src=" {{ $product->image_url }} " id="current" alt="#">
                                </div>
                                
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i> Drones:<a
                                    href="javascript:void(0)">{{ $product->category->name }}</a></p>
                            <h3 class="price">{{ Currency::format($product->price) }} @if ($product->compare_price)
                                    <span>{{ Currency::format($product->compare_price) }}</span>
                                @endif
                            </h3>
                            <p class="info-text">{{ $product->description }}</p>
                            {{-- Start form code  --}}
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="row">
                                    
                                    
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group quantity">
                                            <label for="color">Quantity</label>
                                            <select class="form-control w-100" name="quantity">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="button cart-button">
                                                <button class="btn btn-primary d-block w-100" type="submit" style="width: 100%;">Add to
                                                    Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- E--nd code form --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{{ $product->description }}</p>
                                <h4>Category</h4>
                                <ul class="features">
                                    <li># {{ $product->category->id }}</li>
                                    
                                    <li>{{ $product->category->name }}</li>
                                    <li>{{ $product->category->created_at }}</li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- End Item Details -->


    @push('scripts')
        <script type="text/javascript">
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class 
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });
        </script>
    @endpush
</x-front-layout>

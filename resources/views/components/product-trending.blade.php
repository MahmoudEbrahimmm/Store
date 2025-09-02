<div class="single-blog">
    <div class="blog-img">
        <a href="blog-single-sidebar.html">
            <img src="{{ asset('storage/' . $product->image) }}" alt="#">
        </a>
    </div>
    <div class="blog-content">
        <a class="category" href="">{{$product->name}}</a>
        
        <p>{{ $product->description }}</p>
        <div class="button">
            <a href="{{ route('products.show', $product->slug) }}" class="btn">Read More</a>
        </div>
    </div>
</div>
<!-- End Single Blog -->







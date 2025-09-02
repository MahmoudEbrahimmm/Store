
                    <!-- Start Single Blog -->
                    <div class="single-blog mb-3">
                        <div class="blog-img">
                            
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="">
                            
                        </div>
                        <div class="blog-content">
                            {{$product->name}}
                            <h4>
                                {{$product->category->name}}
                            </h4>
                            <p>{{$product->description}}</p>
                            
                        </div>
                    </div>
                    <!-- End Single Blog -->
                

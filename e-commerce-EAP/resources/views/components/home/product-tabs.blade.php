<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Sale off</button>
                </li>
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($popularProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product-details', $product->id)}}">
                                        <img class="default-img" src="{{$product->photo}}" alt="">
                                        <img class="hover-img" src="{{$product->secondPhoto}}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <form id="{{$product->barcode}}" method="post" action="{{route('add.wishlist')}}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="product" value="{{$product->id}}">
                                        <div onclick="addToWishlist(<?php echo $product->barcode; ?>)">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </form>    
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Popular</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('shop')}}">{{$product->category->name}}</a>
                                </div>
                                <h2><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>${{$product->price}} </span>
                                </div>
                                <div class="product-action-1 show">
                                    <form id="{{$product->id}}" method="post" action="{{route('add.toCart')}}">
                                        @csrf
                                        @method('put')
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <div onclick="addToCart(<?php echo $product->id; ?>)" class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one (Featured)-->
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    @foreach($saleProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('product-details', $product->id)}}">
                                        <img class="default-img" src="{{$product->photo}}" alt="">
                                        <img class="hover-img" src="{{$product->secondPhoto}}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <form id="{{$product->barcode}}" method="post" action="{{route('add.wishlist')}}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="product" value="{{$product->id}}">
                                        <div onclick="addToWishlist(<?php echo $product->barcode; ?>)">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up"><i class="fi-rs-heart"></i></a>
                                        </div>
                                    </form>    
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale off</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{route('shop')}}">{{$product->category->name}}</a>
                                </div>
                                <h2><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h2>
                                <div class="rating-result" title="90%">
                                    <span>
                                        <span>90%</span>
                                    </span>
                                </div>
                                <div class="product-price">
                                    <span>${{$product->price}} </span>
                                    <span class="old-price">${{$product->price * 1.2}} </span>
                                </div>
                                <div class="product-action-1 show">
                                    <form id="{{$product->id}}" method="post" action="{{route('add.toCart')}}">
                                        @csrf
                                        @method('put')
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <div onclick="addToCart(<?php echo $product->id; ?>)" class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab two (Popular)-->
        </div>
        <!--End tab-content-->
    </div>
</section>
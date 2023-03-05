<section class="section-padding">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>New</span> Arrivals</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                @foreach($newProducts as $product)
                <div class="product-cart-wrap small hover-up">
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
                            <span class="hot">Hot</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h2>
                        <div class="rating-result" title="90%">
                            <span>
                            </span>
                        </div>
                        <div class="product-price">
                            <span>${{$product->price}} </span>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--End product-cart-wrap-2-->
            </div>
        </div>
    </div>
</section>
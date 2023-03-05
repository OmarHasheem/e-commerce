<div class="row product-grid-3">

    @foreach($products as $product)
{{$product->productname}}
        <div class="col-lg-4 col-md-4 col-6 col-sm-6">
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
                        <span class="best">Best Sell</span>
                    </div>
                </div>
                <div class="product-content-wrap">
                    <div class="product-category">
                        <a href="{{route('product.category', $product->category->slug)}}">{{$product->category->name}}</a>
                    </div>
                    <h2><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h2>
                    <div class="rating-result" title="90%">
                        <span>
                            <span>95%</span>
                        </span>
                    </div>
                    <div class="product-price">
                        <span>${{$product->price}}</span>
                    </div>
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

       
    <script>
        function addToWishlist(id){
            var form = document.getElementById(id);
            form.submit();
        }

        function addToCart(id){
            var cart = document.getElementById(id);
            cart.submit();
        }
    </script>

@endforeach 
</div>
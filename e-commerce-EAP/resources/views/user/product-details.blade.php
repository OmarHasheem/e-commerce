<x-home-master :categories=$categories>
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Fashion
                    <span></span> {{$product->name}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                                <img class="default-img" src="{{$product->photo}}" alt="product image">
                                                <img class="hover-img" src="{{$product->secondPhoto}}" alt="product image">
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="{{$product->photo}}" alt="product image"></div>
                                            <div><img src="{{$product->secondPhoto}}" alt="product image"></div>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                            <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                            <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{$product->name}}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: <a href="shop.html">{{$product->brand}}</a></span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <ins><span class="text-brand">${{$product->price}}</span></ins>

                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year {{$product->brand}} Brand Warranty</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                            </ul>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="product-extra-link2">
                                                <form method="post" action="{{route('add.toCart')}}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="product" value="{{$product->id}}">
                                                    <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                                </form>
                                                
                                                <form id="{{$product->barcode}}" method="post" action="{{route('add.wishlist')}}">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="product" value="{{$product->id}}">
                                                    <div onclick="addToWishlist(<?php echo $product->barcode; ?>)">
                                                        <a aria-label="Add To Wishlist" class="action-btn hover-up"><i class="fi-rs-heart"></i></a>
                                                    </div>
                                                </form>    
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">Barcode: <a href="#">{{$product->barcode}}</a></li>
                                            <li class="mb-5">Tags: 
                                                @foreach($product->tags as $tag)
                                                    <a href="{{url('shop?tag='.$tag->name)}}" rel="tag">{{$tag->name}}</a> , 
                                                @endforeach
                                            </li>
                                            <li>Availability:<span class="in-stock text-success ml-5">{{$product->stock}} Items In Stock</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            <h4 class="mt-30">Packaging & Delivery</h4>
                                            <hr class="wp-block-separator is-style-wide">
                                            <p>Less lion goodness that euphemistically robin expeditiously bluebird smugly scratched far while thus cackled sheepishly rigid after due one assenting regarding censorious while occasional or this more crane
                                                went more as this less much amid overhung anathematic because much held one exuberantly sheep goodness so where rat wry well concomitantly.
                                            </p>
                                            <p>Scallop or far crud plain remarkably far by thus far iguana lewd precociously and and less rattlesnake contrary caustic wow this near alas and next and pled the yikes articulate about as less cackled dalmatian
                                                in much less well jeering for the thanks blindly sentimental whimpered less across objectively fanciful grimaced wildly some wow and rose jeepers outgrew lugubrious luridly irrationally attractively
                                                dachshund.
                                            </p>
                                        </div>
                                    </div>
                                    <x-product-details.comments :comments=$comments :product=$product></x-product-details.comments>
                                </div>
                            </div>                           
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">

                        <x-shop.category-sidebar-widget :categories=$categories></x-shop.category-sidebar-widget>

                        <!-- Product sidebar Widget -->
                        <x-shop.product-sidebar-widget :newProducts=$newProducts></x-shop.product-sidebar-widget>
                       
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        function addToWishlist(id){
            var form = document.getElementById(id);
            form.submit();
        }
    </script>
@endsection
</x-home-master>
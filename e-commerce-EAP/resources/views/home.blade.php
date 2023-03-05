<x-home-master :categories=$categories>
@section('content')    
    <div>
        <main class="main">
            <x-home.features></x-home.features>

            <x-home.product-tabs :popularProducts=$popularProducts :saleProducts=$saleProducts></x-home.product-tabs>

            <section class="banner-2 section-padding pb-0">
                <div class="container">
                    <div class="banner-img banner-big wow fadeIn animated f-none">
                        <img src="{{asset('assets/imgs/banner/banner-4.png')}}" alt="">
                        <div class="banner-text d-md-block d-none">
                            <h4 class="mb-15 mt-40 text-brand">Repair Services</h4>
                            <h1 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h1>
                            <a href="{{route('shop')}}" class="btn">Learn More <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <x-home.popular-categories :categories=$categories></x-home.popular-categories>

            <section class="banners mb-15">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow fadeIn animated">
                                <img src="{{asset('assets/imgs/banner/banner-1.png')}}" alt="">
                                <div class="banner-text">
                                    <span>Smart Offer</span>
                                    <h4>Save 20% on <br>Woman Bag</h4>
                                    <a href="{{route('shop')}}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow fadeIn animated">
                                <img src="{{asset('assets/imgs/banner/banner-2.png')}}" alt="">
                                <div class="banner-text">
                                    <span>Sale off</span>
                                    <h4>Great Summer <br>Collection</h4>
                                    <a href="{{route('shop')}}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-md-none d-lg-flex">
                            <div class="banner-img wow fadeIn animated  mb-sm-0">
                                <img src="{{asset('assets/imgs/banner/banner-3.png')}}" alt="">
                                <div class="banner-text">
                                    <span>New Arrivals</span>
                                    <h4>Shop Today’s <br>Deals & Offers</h4>
                                    <a href="{{route('shop')}}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <x-home.new-arrivals :newProducts=$newProducts></x-home.new-arrivals>
        

            <section class="section-padding">
                <div class="container">
                    <h3 class="section-title mb-20 wow fadeIn animated"><span>Featured</span> Brands</h3>
                    <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                        <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
                        <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-1.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-2.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-3.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-4.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-5.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-6.png')}}" alt="">
                            </div>
                            <div class="brand-logo">
                                <img class="img-grey-hover" src="{{asset('assets/imgs/banner/brand-3.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </main>
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
@endsection    
</x-home-master>

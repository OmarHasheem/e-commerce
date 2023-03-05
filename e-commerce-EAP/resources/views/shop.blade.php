<x-home-master :categories=$categories>
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">Home</a>
                    <span> Shop </span> 
                </div>
            </div>
        </div>
        
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->count()}}</strong> items for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{session('perPage')}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a 
                                                @if(session("perPage") == 3) class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=3')}}">3</a>
                                            </li>
                                            <li><a 
                                                @if(session("perPage") == 6) class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=6')}}">6</a>
                                            </li>
                                            <li><a 
                                                @if(session("perPage") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=9')}}">9</a>
                                            </li>
                                            <li><a 
                                                @if(session("perPage") == 12) class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=12')}}">12</a>
                                            </li>
                                            <li><a 
                                                @if(session("perPage") == 15) class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=15')}}">15</a>
                                            </li>
                                            <li><a 
                                                @if(session("perPage") == "18") class="active" @endif 
                                                href="{{url('shop/'.$category.'?perPage=18')}}">18</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{session('sort')}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a 
                                                @if(session("sort") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?sort=default')}}">Default</a>
                                            </li>
                                            <li><a 
                                                @if(session("sort") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?sort=recent')}}">Recent</a>
                                            </li>
                                            <li><a 
                                                @if(session("sort") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?sort=old')}}">Oldest</a>
                                            </li>
                                            <li><a 
                                                @if(session("sort") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?sort=low')}}">Price: Low to High</a>
                                            </li>
                                            <li><a 
                                                @if(session("sort") == 9) class="active" @endif 
                                                href="{{url('shop/'.$category.'?sort=high')}}">Price: High to Low</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-shop.products :products=$products></x-shop.products>
                        
                        <!--pagination-->
                        <x-shop.pagination :products=$products></x-shop.pagination>

                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>

                        <x-shop.category-sidebar-widget :categories=$categories></x-shop.category-sidebar-widget>

                        <x-shop.fillter-by-price :details=$details :tags=$tags></x-shop.fillter-by-price>

                        <x-shop.product-sidebar-widget :newProducts=$newProducts ></x-shop.product-sidebar-widget>

                    </div>
                </div>
            </div>
        </section>
    </main>


@endsection
</x-home-master>
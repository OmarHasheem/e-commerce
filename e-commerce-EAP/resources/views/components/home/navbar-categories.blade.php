<div class="header-nav d-none d-lg-flex">
    <div class="main-categori-wrap d-none d-lg-block">
        <a class="categori-button-active" href="#">
            <span class="fi-rs-apps"></span> Browse Categories
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-large">
            <ul>
                @php($i=1)
                @foreach($categories as $category)
                    @if($i <= 3)
                        <li><a href="{{route('shop', $category->slug)}}"><i class="surfsidemedia-font-desktop"></i>{{$category->name}}</a></li>
                        @php($i ++)
                    @endif
                @endforeach
                <li>
                    <ul class="more_slide_open" style="display: none;">
                        @php($i=1)
                        @foreach($categories as $category)
                            @if($i > 3)
                                <li><a href="{{route('shop', $category->slug)}}"><i class="surfsidemedia-font-desktop"></i>{{$category->name}}</a></li>
                            @endif
                            @php($i ++)
                        @endforeach
                    </ul>
                </li>
            </ul>
            <div class="more_categories">Show more...</div>
        </div>
    </div>
    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
        <nav style="padding-left: 150px;">
            <ul>
                <li><a class="active" href="{{route('home')}}">Home </a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('shop')}}">Shop</a></li>                             
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="#">My Account<i class="fi-rs-angle-down"></i></a>
                    <ul class="sub-menu">
                        <li><a href="{{route('my-account')}}">Profile</a></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li> 

                        <form id="logout-form" method="post" action="{{route('logout')}}">
                            @csrf                                               
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

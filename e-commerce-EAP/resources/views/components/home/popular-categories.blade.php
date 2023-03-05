<section class="popular-categories section-padding mt-15 mb-25">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            <div class="carausel-6-columns" id="carausel-6-columns">
                @foreach($categories as $category)
                <div class="card-1">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{route('product.category', $category->slug)}}"><img src="{{$category->photo}}" width="300px" height="200px"  alt=""></a>
                    </figure>
                    <h5><a href="{{route('product.category', $category->slug)}}">{{$category->name}}</a></h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
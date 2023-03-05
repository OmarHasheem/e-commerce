<div class="widget-category mb-30">
    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
    <ul class="categories">
        <li><a href="{{route('product.category', '')}}">All Categories</a></li>
        @foreach($categories as $category)
            <li><a href="{{route('product.category', $category->slug)}}">{{$category->name}}</a></li>
        @endforeach

    </ul>
</div>
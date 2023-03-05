<div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title mb-10">New products</h5>
        <div class="bt-1 border-color-1"></div>
    </div>
    @foreach($newProducts as $product)
    <div class="single-post clearfix">    
        <div class="image">
            <img src="{{$product->photo}}" alt="#">
        </div>
        <div class="content pt-10">
            <h5><a href="{{route('product-details', $product)}}">{{$product->name}}</a></h5>
            <p class="price mb-0 mt-5">${{$product->price}}</p>
            <div class="product-rate">
                <div class="product-rating" style="width:90%"></div>
            </div>
        </div>
    </div>
    @endforeach
</div>

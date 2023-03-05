<x-home-master :categories=$categories>
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Wishlist
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Add to Cart</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{$product->photo}}" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name"><a href="{{route('product-details', $product->id)}}">{{$product->name}}</a></h5>
                                            <p class="font-xs"> {{$product->description}} </p>
                                        </td>
                                        <td class="price" data-title="Price"><span>$ {{$product->price}} </span></td>
                                        
                                        <td>
                                        <form action="{{route('add.toCart')}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="product" value="{{$product->id}}">
                                            <button type="submit">
                                                <i class="fi-rs-shopping-bag mr-10"></i>Add To Cart
                                            </button>
                                        </form>
                                        </td>
                                        
                                        <td class="action" data-title="Remove">
                                            <form id="{{$product->id}}" method="post" action="{{route('delete.wishlist')}}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="product" value="{{$product->id}}">
                                                <div onclick="submit_form(<?php echo $product->id; ?>)">
                                                    <a><i class="fi-rs-trash"></i></a>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
    function submit_form(id){
        var form = document.getElementById(id);
        form.submit();
    }
    </script>

@endsection
</x-home-master>
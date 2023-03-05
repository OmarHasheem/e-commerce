<x-home-master :categories=$categories>
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
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
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
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
                                        <td class="price" data-title="Price"><span>${{$product->price}} </span></td>
                                        <td class="text-center" data-title="Stock">
                                        
                                                <form method="post" action="{{route('product.cart.stock', $product)}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" style="width: 100px;" name="stock" max="{{$product->stock}}" 
                                                        value="{{$product->sub_total()/$product->price}}"
                                                        
                                                        onchange="submit"> 
                                                   
                                                </form></td>

                                        
                                        <td class="text-right" data-title="Cart">
                                            <span> ${{$product->sub_total()}} </span>
                                        </td>

                                    
                                        <td class="action" data-title="Remove">
                                        <form id="{{$product->id}}" method="post" action="{{route('delete.fromCart')}}">
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
                                    <tr>
                                       <td colspan="6" class="text-end">
                                            <form method="post" action="{{route('delete.allCart')}}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit">
                                                    <i class="fi-rs-cross-small"></i> Clear Cart
                                                </button>
                                            </form>       
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>
                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i>Continue Shopping</a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>

                        <div style="margin-right: 400px;">
                            <x-cart.calculate-shipping></x-cart.calculate-shipping>
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
<x-home-master :categories=$categories>
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Order Details</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <p>Details of Order: {{$order->id}}</p>
                <table class="table" style="width: 75%; margin-left: 200PX;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td style="width: 60px;" class="image product-thumbnail"><img src="{{$product->photo}}"></td>
                                <td style="width: 60px;" >{{$product->name}}</td>
                                <td style="width: 60px;" >${{$product->price}}</td>
                                <td style="width: 60px;" >{{$product->pivot->stock}}</td>
                                <td style="width: 60px;" >${{$product->price * $product->pivot->stock}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
</x-home-master>
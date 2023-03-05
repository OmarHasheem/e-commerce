<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Products of Order</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <p>Details of Order: {{$order->id}}</p>
                <p>Owner of Order: {{$order->user->name}}</p>
                <p>Total price of Order: {{$order->total_price()}}</p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <td style="width: 60px;" ><img width="100px" height="100px" src="{{$product->photo}}"></td>
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
</x-admin-master>
<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Orders</h3>
        </div>

        @if(session('category-deleted-message'))
            <div class="alert alert-danger">{{session('category-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>User id</th>
                        <th>Item</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Total Price</th>
                        <th>Payment</th>
                        <th>User id</th>
                        <th>Item</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a href="{{route('admin.productsOfOrder', $order->id)}}">{{$order->id}}</a></td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->payment}}</td>
                                <td><a href="{{route('user.index')}}">{{$order->user_id}}</a></td>
                                <td>{{$order->items()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
</x-admin-master>
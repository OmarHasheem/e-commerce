<x-admin-master>
@section('content')

        @if(session('product-created-message'))
            <div class="alert alert-success">{{session('product-created-message')}}</div>
        @elseif(session('product-updated-message'))
            <div class="alert alert-success">{{session('product-updated-message')}}</div>
        @elseif(session('product-deleted-message'))
            <div class="alert alert-danger">{{session('product-deleted-message')}}</div>
        @endif

 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Products</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Description</th> 
                            <th>Stock</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Photo</th>
                            <th>Second Photo</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Photo</th>
                            <th>Second Photo</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>    
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><a href="{{route('product.edit', $product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->barcode}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category_id}}</td>
                                <td>{{$product->subcategory_id}}</td>
                                <td><img src="{{$product->photo}}" width="100px" height="100px"  alt=""></td>
                                <td><img src="{{$product->secondPhoto}}" width="100px" height="100px"  alt=""></td>
                                <td>
                                    <form action="{{route('product.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
</x-admin-master>
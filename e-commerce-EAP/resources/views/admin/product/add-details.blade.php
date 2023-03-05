<x-admin-master>
@section('content')
    <h1>Add Details</h1 >
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Add Details</h3>
        </div>

        
        @if(session('attach-detail-message'))
            <div class="alert alert-success">{{session('attach-detail-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Stock</th>
                        <th>Attach</th>
                        <th>Detach</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Stock</th>
                        <th>Attach</th>  
                        <th>Detach</th>  
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->id}}</td>
                                <td>{{$detail->name}}</td>
                                <td>{{$detail->value}}</td>

                                <form action="{{route('product.detail.attach', $product->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                <td>
                                    <input style="width: 100px;" max="999" type="number" name="stock" required>
                                </td>
                                
                                <td>
                                    <input type="hidden" name='detail' value="{{$detail->id}}">              
                                    <button type="submit" class="btn btn-primary">Attach</button>
                                </td>
                                </form>
                                
                                <td>
                                    <form action="{{route('product.detail.detach', $product->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger" 
                                            @if($product->details->contains($detail))
                                                disabled 
                                            @endif
                                        >Detach</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form style="padding-left: 1000px;" action="{{route('product.tag.add', $product->id)}}" method="post">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary">Go to Add Tags</button>
                </form>

            </div>
        </div>
    </div>

@endsection
</x-admin-master>
<x-admin-master>
@section('content')
    <h1>Add Tags</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Add Tags</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Attach</th>
                        <th>Detach</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>ِAttach</th> 
                        <th>Detach</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>
                                    <input type="checkbox" @if($product->tags->contains($tag))
                                        checked
                                        @endif disabled >
                                </td>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>              
                                    <form action="{{route('product.tag.attach', $product->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name='tag' value="{{$tag->id}}">
                                        <button type="submit" class="btn btn-primary"
                                                @if($product->tags->contains($tag))
                                                    disabled 
                                                @endif
                                            >Attach</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('product.tag.detach', $product->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name='tag' value="{{$tag->id}}">
                                        <button type="submit" class="btn btn-danger"
                                                @if(!$product->tags->contains($tag))
                                                    disabled 
                                                @endif
                                        >Detach</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form style="padding-left: 1000px;" action="{{route('product.index')}}" method="post">
                    @csrf
                    @method('GET')
                    <button type="submit" class="btn btn-primary">Go to Products page</button>
                </form>

            </div>
        </div>
    </div>

@endsection
</x-admin-master>
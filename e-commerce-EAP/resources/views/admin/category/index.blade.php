<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Categories</h3>
        </div>

        @if(session('category-created-message'))
            <div class="alert alert-success">{{session('category-created-message')}}</div>
        @elseif(session('category-updated-message'))
            <div class="alert alert-success">{{session('category-updated-message')}}</div>
        @elseif(session('category-deleted-message'))
            <div class="alert alert-danger">{{session('category-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Photo</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Photo</th>
                        <th>Delete</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td><a href="{{route('category.edit', $category->id)}}">{{$category->name}}</a></td>
                                <td>{{$category->slug}}</td>
                                <td><img src="{{$category->photo}}" width="100px" height="100px" alt=""></td>
                                <td>
                                    <form action="{{route('category.destroy', $category->id)}}" method="post">
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
<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Sub-Categories</h3>
        </div>

        
        @if(session('subCategory-created-message'))
            <div class="alert alert-success">{{session('subCategory-created-message')}}</div>
        @elseif(session('subCategory-updated-message'))
            <div class="alert alert-success">{{session('subCategory-updated-message')}}</div>
        @elseif(session('subCategory-deleted-message'))
            <div class="alert alert-danger">{{session('subCategory-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Related to</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Related to</th>
                        <th>Delete</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$subCategory->id}}</td>
                                <td><a href="{{route('subCategory.edit', $subCategory->id)}}">{{$subCategory->name}}</a></td>
                                <td><a href="{{route('category.index')}}">{{$subCategory->category->name}}</a></td>
                                <td>
                                    <form action="{{route('subCategory.destroy', $subCategory->id)}}" method="post">
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
<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Tags</h3>
        </div>

        @if(session('tag-created-message'))
            <div class="alert alert-success">{{session('tag-created-message')}}</div>
        @elseif(session('tag-updated-message'))
            <div class="alert alert-success">{{session('tag-updated-message')}}</div>
        @elseif(session('tag-deleted-message'))
            <div class="alert alert-danger">{{session('tag-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Delete</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td><a href="{{route('tag.edit', $tag->id)}}">{{$tag->name}}</a></td>
                                <td>
                                    <form action="{{route('tag.destroy', $tag->id)}}" method="post">
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
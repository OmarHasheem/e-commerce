<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Details</h3>
        </div>

        @if(session('detail-created-message'))
            <div class="alert alert-success">{{session('detail-created-message')}}</div>
        @elseif(session('detail-updated-message'))
            <div class="alert alert-success">{{session('detail-updated-message')}}</div>
        @elseif(session('detail-deleted-message'))
            <div class="alert alert-danger">{{session('detail-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Delete</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->id}}</td>
                                <td><a href="{{route('detail.edit', $detail->id)}}">{{$detail->name}}</a></td>
                                <td>{{$detail->value}}</td>
                                <td>
                                    <form action="{{route('detail.destroy', $detail->id)}}" method="post">
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
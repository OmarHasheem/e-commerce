<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Contacts</h3>
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
                        <th>Subject</th>
                        <th>Message</th>
                        <th>User id</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>User id</th>
                        <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                                <td><a href="{{route('user.index')}}">{{$contact->user_id}}</a></td>
                                <td>
                                    <form action="{{route('contact.destroy', $contact->id)}}" method="post">
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
<x-admin-master>
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Users</h3>
        </div>

        @if(session('user-deleted-message'))
            <div class="alert alert-danger">{{session('user-deleted-message')}}</div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>Phone-number</th>
                        <th>Type of user</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>Phone-number</th>
                        <th>Type of user</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th> 
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                
                                <td>
                                    <form id="{{$user->id}}" action="{{route('user.update')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <select  name="utype" onchange="edit_user_type(<?php echo $user->id; ?>)">
                                            <option value="{{$user->utype}}">{{$user->utype}}</option>
                                                @if($user->utype == "ADM")
                                                    <option value="USR">USR</option>
                                                @else
                                                    <option value="ADM">ADM</option>
                                                @endif
                                        </select>
                                    </form>                                
                                </td>

                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>
                                    <form action="{{route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" class="btn btn-danger" @if($user->isAdmin()) disabled @endif >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    function edit_user_type(id) {
        var form = document.getElementById(id);
        form.submit();
    }
</script>
@endsection
</x-admin-master>
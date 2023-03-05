<x-admin-master>
@section('content')

    <h1>Create Detail</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('detail.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" 
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        >

                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="name">Value</label>
                    <input type="text" 
                        name="value"
                        id="value"
                        class="form-control @error('value') is-invalid @enderror"
                        >

                        @error('value')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
</x-admin-master>
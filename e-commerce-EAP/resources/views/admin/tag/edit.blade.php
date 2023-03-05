<x-admin-master>
@section('content')

    <h1>Edit Tags</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('tag.update', $tag)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" 
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{$tag->name}}"
                        >

                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
</x-admin-master>
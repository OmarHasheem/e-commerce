<x-admin-master>
@section('content')

    <h1>Create Categories</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
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
                    <label for="slug">Slug</label>
                    <input type="text" 
                        name="slug"
                        id="slug"
                        class="form-control @error('slug') is-invalid @enderror"
                        >

                        @error('slug')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" 
                        name="photo"
                        id="photo"
                        class="@error('photo') is-invalid @enderror"
                        >

                        @error('photo')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
</x-admin-master>
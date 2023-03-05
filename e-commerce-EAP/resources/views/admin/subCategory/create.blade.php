<x-admin-master>
@section('content')

    <h1>Create Sub-Category</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('subCategory.store')}}" method="post" enctype="multipart/form-data">
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
                    <label for="category" style="color: #4e73df; font-weight: bold;">Choose Category</label>
                    @foreach($categories as $category)
                        <br>
                        <input style="margin-left: 20px;" type="radio" name="category" id="{{$category->name}}" value="{{$category->id}}"> 
                        <label for="{{$category->name}}">{{$category->name}}</label> 
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
</x-admin-master>
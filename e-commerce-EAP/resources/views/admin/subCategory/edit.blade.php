<x-admin-master>
@section('content')

    <h1>Edit Sub-Category</h1>

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('subCategory.update', $subCategory)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" 
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{$subCategory->name}}"
                        >

                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    <div class="form-group">
                        <label for="category" style="color: #4e73df; font-weight: bold;">Choose Category</label>
                        @foreach($categories as $category)
                            <br>
                            <input style="margin-left: 20px;" type="radio" name="category" id="{{$category->name}}" 
                                value="{{$category->id}}" " @if($category->name == $subCategory->category->name) checked @endif"> 
                            <label for="{{$category->name}}">{{$category->name}}</label> 
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
</x-admin-master>
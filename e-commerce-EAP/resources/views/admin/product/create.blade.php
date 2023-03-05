<x-admin-master>
@section('content')

    <h1>Create Product</h1>

<div class="row">
    <div class="col-sm-6">
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <input type="file" name="photo">
                </div>

                <div class="form-group">
                    <input type="file" name="secondPhoto">
                </div>

                <div class="form-group">
                        <label for="name">Name of Product</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                        >

                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text"
                               name="brand"
                               class="form-control @error('brand') is-invalid @enderror"
                               id="brand"
                        >

                        @error('brand')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"
                               name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               id="price"
                        >

                        @error('price')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number"
                               name="stock"
                               class="form-control @error('stock') is-invalid @enderror"
                               id="stock"
                        >

                        @error('stock')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="text"
                               name="barcode"
                               class="form-control @error('barcode') is-invalid @enderror"
                               id="barcode"
                        >

                        @error('barcode')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label style="color: #4e73df; font-weight: bold;">Choose Sub-Category</label>
                        @foreach($subCategories as $subCategory)
                                <br>
                                <input type="hidden" name="{{$subCategory->id}}" value="{{$subCategory->category_id}}">
                                <input style="margin-left: 20px;" type="radio" name="subCategory" id="{{$subCategory->name}}" 
                                        value="{{$subCategory->id}}"> 
                                <label for="{{$subCategory->name}}">{{$subCategory->name}}</label> 
                        
                        @endforeach
                </div>

                <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="65" rows="10"></textarea>

                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>



                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
</x-admin-master>
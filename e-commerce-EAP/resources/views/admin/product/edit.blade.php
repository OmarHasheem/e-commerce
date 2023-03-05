<x-admin-master>
@section('content')

    <h1>Edit Product</h1>

<div class="row">
    <div class="col-sm-6">
        <form method="post" action="{{route('product.update', $product)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="file" name="photo">
                </div>

                <img src="{{$product->photo}}" alt="">

                <div class="form-group">
                    <input type="file" name="secondPhoto">
                </div>

                <img src="{{$product->secondPhoto}}" alt="">

                <div class="form-group">
                        <label for="name">Name of Product</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               value="{{$product->name}}"
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
                               value="{{$product->brand}}"
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
                               value="{{$product->price}}"
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
                               value="{{$product->stock}}"
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
                               value="{{$product->barcode}}"
                        >

                        @error('barcode')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                </div>

                <div class="form-group">
                        <label for="subCategory" style="color: #4e73df; font-weight: bold;">Choose Sub-Category</label>
                        @foreach($subCategories as $subCategory)
                                <br>
                                <input style="margin-left: 20px;" type="radio" name="subCategory" id="{{$subCategory->name}}" 
                                        value="{{$subCategory->id}}" " @if($subCategory->id == $product->subcategory_id) checked @endif"> 
                                <label for="{{$subCategory->name}}">{{$subCategory->name}}</label> 
                        @endforeach
                </div>

                <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="65" rows="10">{{$product->description}}</textarea>

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
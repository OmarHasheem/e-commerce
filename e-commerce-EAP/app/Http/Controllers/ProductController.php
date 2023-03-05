<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index() {
        $products = Product::all();
        return view('admin.product.index', ['products'=>$products]);
    }
//return->responseJson[products];
    public function show(Product $product) {
        return view('user.product-details',[
            'categories' => Category::all(),
            'product' => $product,
            'comments' => $product->comments,
            'newProducts' => Product::query()->orderBy('id', 'desc')->take(3)->get(),
        ]);
    }

    public function create() {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.product.create', [
            'categories' => $categories,
            'subCategories'=> $subCategories,
        ]);
    }

    public function store(Request $request){
        request()->validate([
            'name'        => 'required',
            'brand'       => 'required',
            'description' => 'required',
            'stock'       => 'required',
            'barcode'     => 'required',
            'price'       => 'required',
            'photo'       => 'required | file',
            'secondPhoto' => 'required | file',
            'subCategory' => 'required',
        ]);

            $image = request('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            request('photo')->move('product', $imageName);
            $image = $imageName;

            $secondImage = request('secondPhoto');
            $imageName2 = time().'.'.$secondImage->getClientOriginalExtension();
            request('secondPhoto')->move('product', $imageName2);
            $secondImage = $imageName2;

        $category = SubCategory::findOrFail(request('subCategory'))->category_id;
        Product::create([
            'name'           => request('name'),
            'brand'          => request('brand'),
            'description'    => request('description'),
            'stock'          => request('stock'),
            'barcode'        => request('barcode'),
            'price'          => request('price'),
            'photo'          => $image,
            'secondPhoto'    => $secondImage,
            'subCategory_id' => request('subCategory'),
            'category_id'    => $category
        ]);
        $product = Product::get()->last();
        return redirect()->route('product.detail.add', $product);
    }

    public function edit(Product $product) {
        $subCategories = SubCategory::all();
        $tags = Tag::all();
        return view('admin.product.edit', [
            'product'=>$product,
            'subCategories' => $subCategories,
            'tags' => $tags,
        ]);
    }

    public function update(Product $product) {

        if($image = request('photo')) {
            $imageName = time().'.'.$image->getClientOriginalExtension();
            request('photo')->move('product', $imageName);
            $image = $imageName;
            $product->photo = $image;
        }

        
        if($secondImage = request('secondPhoto')) { 
            $imageName2 = time().'1.'.$secondImage->getClientOriginalExtension();
            request('secondPhoto')->move('product', $imageName2);
            $secondImage = $imageName2;
            $product->secondPhoto = $secondImage;
        }

        $product->name = request('name');
        $product->brand  = request('brand');
        $product->description = request('description');
        $product->stock = request('stock');
        $product->barcode = request('barcode');
        $product->price = request('price');
        $product->subCategory_id = request('subCategory');
        $product->category_id = SubCategory::findOrFail(request('subCategory'))->category_id;

        if($product->isDirty(['name', 'brand', 'description', 'stock', 'barcode', 'price', 'subCategory_id'])) {
            $product->update();
            session()->flash('product-updated-message', 'The product '. $product->name .' has been updated');
        } else {
            session()->flash('product-updated-message', 'Nothing has been updated');
        }

        $product = Product::find($product->id);
        return redirect()->route('product.detail.add', $product);
    }

    public function destroy(Product $product) {
        $product->delete();
        session()->flash('product-deleted-message', 'The product has been added');
        return back();
    }

    public function attach_detail(Product $product) {
        $product->details()->attach(request('detail'));

        Product::find($product->id)->details()->updateExistingPivot(request('detail'), ['stock' => request('stock')]);

        session()->flash('attach-detail-message', 'The attach has been added');
        return back();
    }

    public function detach_detail(Product $product) {
        $product->details()->detach(request('detail'));

        session()->flash('attach-detail-message', 'The attach has been deleted');
        return back();
    }

    public function attach_tag(Product $product) {
        $product->tags()->attach(request('tag'));

        session()->flash('attach-tag-message', 'The attach has been added');
        return back();
    }

    public function detach_tag(Product $product) {
        $product->tags()->detach(request('tag'));

        session()->flash('detach-tag-message', 'The attach has been deleted');
        return back();
    }

    public function attach_product_wishlist() {
        $user = auth()->user();
        $user->wishlist()->attach(request('product'));

        return back();
    }

    public function detach_product_wishlist() {
        $user = auth()->user();
        $user->wishlist()->detach(request('product'));

        return back();
    }

    public function attach_product_cart() {
        $product = Product::find(request('product')); 

        if($product->stock < 1) {
            return back();
        }

        if(Product::stockInCart($product->id) > 0) {
            $stock = Product::stockInCart($product->id);

            $stock = $stock + 1;
            if ($product->stock < $stock) {
                $stock = $product->stock;
            }
            Product::find($product->id)->carts()->updateExistingPivot(auth()->user(), ['stock' => $stock]);
        } else {
            auth()->user()->carts()->attach($product->id);
        }

        return back();
    }

    public function detach_product_cart() {
        $user = auth()->user();
        $user->carts()->detach(request('product'));

        return back();
    }

    public function detach_all_product_cart() {
        $user = auth()->user();
        $user->carts()->detach();

        return back();
    }

    public function edit_stock(Product $product) {
        Product::find($product->id)->carts()->updateExistingPivot(auth()->user(), ['stock' => request('stock')]);

        return back();
    }
}
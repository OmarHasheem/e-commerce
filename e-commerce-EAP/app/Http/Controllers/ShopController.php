<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Tag;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //

    public function index($category = null) {
        $products = Product::query();
        $products = $products->where('products.stock', '>', 0);

        if(request('perPage')){
            session()->put('perPage', request('perPage'));
        } else if(session('perPage') == null) {
            session()->put('perPage', 9);
        }
        $perPage = session('perPage');
        

        if(request('sort') or session('sort')){
            if (request('sort'))
                session()->put('sort', request('sort'));
            
            if (session('sort') == "low") {
                $products = $products->orderBy('price', 'asc');
            } else if(session('sort') == "high") {
                $products = $products->orderBy('price', 'desc');
            } else if(session('sort') == "recent") {
                $products = $products->orderBy('id', 'desc');
            } else if(session('sort') == "old" || session('sort') == "default") {
                $products = $products->orderBy('id', 'asc');
            }      
        } else if(session('sort') == null){
            session()->put('sort', 'Default');
        }

        if($category != null) {
            $category_id = Category::query()->where('slug', '=', $category)->get()->first()->id;
            $products = $products->where('category_id', '=', $category_id);
        }

        if(request('color') or session('color')) {
            if (request('color'))
                session()->put('color', request('color'));

            if(session('color') != "Default")
                $products = $products->select('products.*')
                ->join('detail_product', 'products.id', '=', 'detail_product.product_id')
                ->join('details', 'details.id', '=', 'detail_product.detail_id')
                ->where('value', '=', session('color'));
        } else {
            session()->put('color', 'Default');
        }

        if(request('tag') or session('tag')) {
            if (request('tag'))
                session()->put('tag', request('tag'));

            if(session('tag') != "Default")
                $products = $products->select('products.*')
                ->join('product_tag', 'products.id', '=', 'product_tag.product_id')
                ->join('tags', 'tags.id', '=', 'product_tag.tag_id')
                ->where('tags.name', '=', session('tag'));
        }

        if(request('search')) {
            session()->flash('search', request('search'));
            $products = $products->where('name', '=', request('search'));
        }
    
        $products = $products->paginate($perPage);
        return view('shop', [
            'products' => $products,
            'category' => $category,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'newProducts' => Product::query()->orderBy('id', 'desc')->take(3)->get(),
            'details' => Detail::query()->where('name', '=', 'color')->get(),
        ]);
    }
}

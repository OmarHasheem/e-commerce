<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //

    public function index() {
        $categories = Category::all();

        return view('admin.category.index', ['categories'=>$categories]);
    }
    
    public function create() {
        return view('admin.category.create');
    }

    public function store() {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'photo' => 'required | file'
        ]);

        $image = request('photo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        request('photo')->move('categories', $imageName);
        $image = $imageName;

        Category::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::slug(Str::lower(request('name')), '_'),
            'photo' => $image,
        ]);

        session()->flash('category-created-message', 'The ' . request('name') . ' was created');

        return redirect()->route('category.index');
    }

    public function edit(Category $category) {
        return view('admin.category.edit', ['category'=>$category]);
    }

    public function update(Category $category) {
        $category->name = Str::ucfirst(request('name'));
        $category->slug = Str::slug(Str::lower(request('name')), '_');
        
        $image = request('photo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        request('photo')->move('categories', $imageName);
        $image = $imageName;

        $category->photo = $image;

        if($category->isDirty(['name', 'slug', 'photo'])) {
            
            $category->save();
            session()->flash('category-updated-message', 'The ' . request('name') . ' was updated');
        
        } else {
            session()->flash('category-updated-message', 'Nothin was updated');
        }

        return redirect()->route('category.index');
    }

    public function destroy(Category $category) {
        $name = $category->name;
        $category->delete();

        session()->flash('category-deleted-message', 'The ' . $name . ' was deleted');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //

    public function index() {
        $subCategories = SubCategory::all();
        return view('admin.subCategory.index', ['subCategories'=>$subCategories]);
    }

    public function show() {

    }

    public function create() {
        $categories = Category::all();
        return view('admin.subCategory.create', ['categories'=> $categories]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required']
        ]);

        SubCategory::create([
            'name' => $request['name'],
            'category_id' => $request['category']
        ]);

        session()->flash('subCategory-created-message', 'The ' . $request['name'] . ' was created');

        return redirect()->route('subCategory.index');
    }

    public function edit(SubCategory $subCategory) {
        $categories = Category::all();
        return view('admin.subCategory.edit',
         ['subCategory'=> $subCategory, 'categories' => $categories]);
    }

    public function update(SubCategory $subCategory) {
        $subCategory->name = request('name');
        $subCategory->category_id = request('category');

        if($subCategory->isDirty(['name', 'category_id'])) {
        
            $subCategory->save();
            session()->flash('subCategory-updated-message', 'The Sub-Ctegory was updated');
        
        } else {
            session()->flash('subCategory-updated-message', 'Nothing is updated');
        }

        return redirect()->route('subCategory.index');
    }

    public function destroy(SubCategory $subCategory) {
        $name = $subCategory->name;
        $subCategory->delete();

        session()->flash('subCategory-deleted-message', 'The ' . $name . ' was created');
        return redirect()->route('subCategory.index');
    }
}

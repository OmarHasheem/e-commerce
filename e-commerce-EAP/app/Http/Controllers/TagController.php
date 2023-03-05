<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function index() {
        $tags = Tag::all();

        return view('admin.tag.index', ['tags'=>$tags]);
    }

    public function create() {
        return view('admin.tag.create');
    }

    public function store() {
        Tag::create([
            'name' => request('name'),
        ]);

        session()->flash('tag-created-message', 'The ' . request('name') . ' was created');

        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag) {
        return view('admin.tag.edit', ['tag' => $tag]);
    }

    public function update(Tag $tag) {
        $tag->name = request('name');
        if($tag->isDirty(['name'])) {
        
            $tag->save();
            session()->flash('tag-updated-message', 'The tag was updated');
        
        } else {
            session()->flash('tag-updated-message', 'Nothing is updated');
        }

        return redirect()->route('tag.index');
    }

    public function destroy(Tag $tag) {
        $name = $tag->name;
        $tag->delete();

        session()->flash('tag-deleted-message', 'The ' . $name . ' was deleted');
        return back();
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
   
    public function index() {
        $details = Detail::all();

        return view('admin.detail.index', ['details'=>$details]);
    }

    public function create() {
        return view('admin.detail.create');
    }

    public function store() {
        Detail::create([
            'name' => request('name'),
            'value' => request('value'),
        ]);

        session()->flash('detail-created-message', 'The ' . request('name') . ' was created');

        return redirect()->route('detail.index');
    }

    public function edit(Detail $detail) {
        return view('admin.detail.edit', ['detail' => $detail]);
    }

    public function update(Detail $detail) {
        $detail->name = request('name');
        $detail->value = request('value');
        if($detail->isDirty(['name', 'value'])) {
        
            $detail->save();
            session()->flash('detail-updated-message', 'The detail was updated');
        
        } else {
            session()->flash('detail-updated-message', 'Nothing is updated');
        }

        return redirect()->route('detail.index');
    }

    public function destroy(Detail $detail) {
        $name = $detail->name;
        $detail->delete();

        session()->flash('tag-deleted-message', 'The ' . $name . ' was deleted');
        return back();
        
    }

}

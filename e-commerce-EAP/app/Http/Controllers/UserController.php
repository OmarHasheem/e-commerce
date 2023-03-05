<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index() {
        $users = User::all();
        return view('admin.user.index', ['users'=>$users]);
    }

    public function show() {
        return view('user.my-account', [
            'orders' => auth()->user()->orders,
            'address' => auth()->user()->address,
            'user' => auth()->user(),
            'categories' => Category::all()
        ]);
    }

    public function edit() {
        $user = auth()->user();
        $user->name = request('name');
        $user->username = request('username');
        $user->email = request('email');
        $user->phone_number = request('phone_number');
        $user->password = Hash::make(request('password'));
        $user->utype = request('utype');

        if($user->isDirty(['name', 'username', 'email', 'phone_number', 'password'])) {
            
            $user->save();
            session()->flash('user-updated-message', 'The ' . request('name') . ' was updated');
        
        } else {
            session()->flash('user-updated-message', 'Nothin was updated');
        }

        return back();
    }

    public function update() {
        $user = User::find(request('user_id'));

        $user->utype = request('utype');

        $user->save();

        return back();
    }

    public function destroy(User $user) {
        session()->flash('user-deleted-message', 'The user '. $user->name . ' has been deleted');
    
        $user->delete();
        
        return back();
    }


}

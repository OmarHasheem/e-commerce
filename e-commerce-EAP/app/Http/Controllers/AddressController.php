<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class AddressController extends Controller
{
    public function store() {
        request()->validate([
            'country' => 'required',
            'city' => 'required',
            'region' => 'required',
            'street' => 'required',
            'building_number' => 'required | numeric',
            'floor' => 'required | numeric',
            'apartment_number' => 'required | numeric',
            'user_id' => 'required'
        ]);

        if(!isset(auth()->user()->address)) {    
            Address::create([
                'country' => request('country'),
                'city' => request('city'),
                'region' => request('region'),
                'street' => request('street'),
                'building_number' => request('building_number'),
                'floor' => request('floor'),
                'apartment_number' => request('apartment_number'),
                'user_id' => request('user_id')
            ]);
        } else {
            $address = Address::where('user_id', '=', auth()->user()->id)->update([
                'country' => request('country'),
                'city' => request('city'),
                'region' => request('region'),
                'street' => request('street'),
                'building_number' => request('building_number'),
                'floor' => request('floor'),
                'apartment_number' => request('apartment_number'),
                'user_id' => request('user_id')
            ]);
        }
        
        return back();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('stock');
    }

    public function items() {
        $item = 0;
        foreach($this->products as $product) {
            $item += $product->pivot->stock;
        }

        return $item;
    }

    public function total_price() {
        $price = 0;
        foreach($this->products as $product) {
            $price += $product->pivot->stock * $product->price;
        }

        return $price;
    }

    public function status() {
        return $this->created_at <= Carbon::parse('Now -10 days');
    }
}

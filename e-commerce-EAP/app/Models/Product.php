<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function carts() {
        return $this->belongsToMany(User::class, 'carts', 'product_id', 'user_id')->withPivot('stock')
        ->withTimestamps()->as('stock_cart');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps()->withPivot('stock');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subCategory() {
        return $this->belongsTo(SubCategory::class);
    }

    public function details() {
        return $this->belongsToMany(Detail::class)->as('detailPivot')
                ->withPivot('stock')->withTimestamps();
    }

    public function wishlist() {
        return $this->belongsToMany(User::class, 'wishlists', 'product_id', 'user_id')->withTimestamps();
    }


    public function isRelatedToCategory($name){
        if($this->category->slug == $name) 
            return true;

        return false;
    }

    public function sub_total(){

        foreach($this->carts as $product) {
            if ($product->stock_cart->user_id == auth()->user()->id){
                $stock = $product->stock_cart->stock;
            }
        }
        return $this->price * $stock;
    }

    public static function stockInCart($id) {
        foreach(auth()->user()->carts as $product) {
            if ($product->id == $id) {
                $stock = $product->sub_total() / $product->price;
            }
        }
        return (isset($stock) ? $stock : 0);
    }

    protected function photo(): Attribute {
        return Attribute::make(
            get: fn ($value) => ("/product//".$value),
        );
    } 

    protected function secondPhoto(): Attribute {
        return Attribute::make(
            get: fn ($value) => ("/product//".$value),
        );
    } 
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone_number',
        'utype',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function carts() {
        return $this->belongsToMany(Product::class, 'carts','user_id', 'product_id')->
                withTimestamps()->as('stock_cart');
    }

    public function address() {
        return $this->hasOne(Address::class);
    }

    public function contacts() {
        return $this->hasMany(Contact::class);
    }

    public function wishlist() {
        return $this->belongsToMany(Product::class, 'wishlists', 'user_id', 'product_id')->withTimestamps();
    }

    public function isAdmin() {
        if($this->utype == 'ADM') {
            return true;
        } else {
            return false;
        }
    }

    public function order_price() {
        $total = 0;
        foreach(auth()->user()->carts as $product){
            $total += $product->sub_total();
        }

        return $total;
    }

    public function count_of_cart() {
        $total = 0;
        foreach(auth()->user()->carts as $product){
            $total ++;
        }

        return $total;
    }

    public function count_of_wishlist() {
        $total = 0;
        foreach(auth()->user()->wishlist as $product){
            $total ++;
        }

        return $total;
    }
}
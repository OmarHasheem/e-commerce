<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sub_categories() {
        return $this->hasMany(SubCategory::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    protected function photo(): Attribute {
        return Attribute::make(
            get: fn ($value) => ("/categories//".$value),
        );
    } 

}

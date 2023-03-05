<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
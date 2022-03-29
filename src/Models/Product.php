<?php

namespace VetNext\Front\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public $sortable = ['category', 'price', 'created_at', 'updated_at'];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}

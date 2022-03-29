<?php

namespace VetNext\Front\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $guarded = [];

    public $sortable = ['category', 'price', 'created_at', 'updated_at'];
}

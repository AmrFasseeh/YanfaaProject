<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'imagePath', 'description', 'price'];

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist');
    }
}

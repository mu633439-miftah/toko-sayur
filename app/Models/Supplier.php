<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'no_wa',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}

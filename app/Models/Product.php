<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Stock;
use App\Models\Transaction_item;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'supplier_id',
        'name',
        'harga',
        'photo',
        'type',
        'satuan',
    ];

    public function suppliers() {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function stock() {
        return $this->hasOne(Stock::class, 'product_id');
    }

    public function transaksi_items() {
        return $this->hasMany(Transaction_item::class);
    }
}

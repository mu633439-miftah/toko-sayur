<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use App\Models\Product;

class Transaction_item extends Model
{
    protected $table = 'transaction_items';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'jumlah',
        'harga'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

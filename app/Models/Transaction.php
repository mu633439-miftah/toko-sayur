<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaction_item;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'status',
        'snap_token',
        'tgl_transaksi',
        'catatan',
        'alamat',
        'total',
    ];

    public function pemesan(){
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id', 'name']);
    }

    public function transaksi_items(){
        return $this->hasMany(Transaction_item::class);
    }
}

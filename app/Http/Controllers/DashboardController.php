<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // total penjualan hari ini        
        $sumPenjualanDay = Transaction::whereDate('created_at', Carbon::today())
            ->where('status', 'paid')
            ->sum('total');

        // jumlah produk
        $jumlahProduk = Product::count();

        // jumlah user
        $jumlahUser = User::where('role', 'user')->count();

        // jumlah supplier
        $jumlahSupplier = Supplier::count();


        return view('dashboard.index', compact('sumPenjualanDay', 'jumlahProduk', 'jumlahUser', 'jumlahSupplier'));
    }
}

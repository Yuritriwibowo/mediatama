<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Event;
use App\Models\DpConfirmation;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalProduk' => Product::count(),
            'totalEvent'  => Event::count(),
            'dpPending'   => DpConfirmation::where('status', 'pending')->count(),
            'dpConfirmed'=> DpConfirmation::whereIn('status', ['confirmed','paid'])->count(),
            'latestDp'    => DpConfirmation::latest()->take(5)->get(),
        ]);
    }
}

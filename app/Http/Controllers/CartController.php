<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Product $product)
    {
        return response()->json([
            'status'=>'success',
        ]);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add([
            $product->id,
            $product->name,
            $request->input('quantity'),
            $product->price,
        ]);

        return redirect()->route('products.details')->with('message', 'added');
    }
}

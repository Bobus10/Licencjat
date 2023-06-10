<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ShoppingCart as Cart;

class Productlist extends Component
{
    public $product;
    public function render()
    {
        return view('livewire.productlist', [
            'product' => Product::get(),
        ]);
    }
    public function addToCart($id)
    {
        if (auth()->user()) {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];
            Cart::updateOrCreate($data);
        } else {
            return redirect(route('login'));
        }
    }
}

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
        $product = Product::get();

        return view('livewire.productlist', [
            'product' => $product,
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

            $this->emit('updateCartCount');

            session()->flash('success', 'Product added to the cart successfully');
        } else {
            return redirect(route('login'));
        }
    }
}

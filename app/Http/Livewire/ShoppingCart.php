<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart as Cart;
use App\Http\Requests\UpsertProductRequest;
use Illuminate\Support\Facades\Request;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0;

    public function render()
    {
        $this -> cartItems = Cart::with('product')
            ->where(['user_id'=>auth()->user()->id])
            ->get();
        $this->total = 0; $this->sub_total = 0 ; $this->tax = 0;

        foreach($this->cartItems as $item){
            $this->sub_total += $item->product->price * $item->quantity;
        }
        $this->total = $this->sub_total - $this->tax;

        return view('livewire.shopping-cart',[
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        ]);
    }
    public function incrementQty($id)
    {
        $cart = Cart::find($id);
        if($cart){
            $cart->increment('quantity');
            $this->emit('updateCartCount');
        }
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        if($cart && $cart->quantity > 1){
            $cart->decrement('quantity');
            $this->emit('updateCartCount');
        }
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart -> delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ShoppingCart as Cart;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0, $shipping=0;

    public function render()
    {
        $this -> cartItems = Cart::with('product')
            ->where(['user_id'=>auth()->user()->id])
            ->get();
        $this->total = 0; $this->sub_total = 0 ; $this->tax = 0; $this->shipping=9.99;

        foreach($this->cartItems as $item){
            $this->sub_total += $item->product->price * $item->quantity;
        }
        $this->total = $this->sub_total - $this->tax + $this->shipping;
        return view('livewire.shopping-cart',[
            'cartItems' => $this->cartItems,
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        ]);
    }
    public function incrementQty($id)
    {
        $cart = Cart::find($id);
        if($cart){
            $cart->increment('quantity');
            $this->getCartItemCount();
        }
    }

    public function decrementQty($id)
    {
        $cart = Cart::whereId($id)->first();
        if($cart && $cart->quantity > 1){
            $cart->decrement('quantity');
            $this->getCartItemCount();
        }
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart -> delete();
        return redirect()->back();
    }
    // public function destroyAll(){
    //     return redirect()->back();
    // }
    public function getCartItemCount(){
        $this->cartItems = shoppingcart::whereUserId(auth()->user()->id)->count();
    }
}

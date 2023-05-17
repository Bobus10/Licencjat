<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ShoppingCart as Cart;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{
    public $cartItems, $sub_total = 0, $total = 0, $tax = 0, $shipp = 0;
    public static $shipping=9.99;

    public function render()
    {
        $this -> cartItems = Cart::with('product')->where(['user_id'=>auth()->user()->id])->get();
        $this->total = 0; $this->sub_total = 0 ; $this->tax = 0;$this->shipp= ShoppingCart::$shipping;

        foreach($this->cartItems as $item){
            $this->sub_total += $item->product->price * $item->quantity;
        }

        $this->total = $this->sub_total - $this->tax + $this->shipp;

        return view('livewire.shopping-cart',[
            'cartItems' => $this->cartItems,
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
            'shipping' => $this->shipp,
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

    public function destroyAll(){
        $user_id = Auth::user()->id;
        Cart::where('user_id', $user_id)->delete();
        return redirect()->back();
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart -> delete();
        return redirect()->back();
    }

    // ShoppingCart::where('user_id', $user->id)->delete();
    //$user = Auth::user();
    public function getCartItemCount(){
        $this->cartItems = Cart::whereUserId(auth()->user()->id)->count();
    }
}

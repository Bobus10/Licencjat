<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart as Cart;

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

    public function incrementQty($id){
        // $cart = Cart::where('id',$id)->where('user_id', auth()->user()->id)->first();
        $cart = Cart::whereId($id)->first();
        $cart->quantity +=1;
        $cart->save();
    }

    public function decrementQty($id){
        $cart = Cart::whereId($id)->first();
        if($cart->quantity >1){
            $cart->quantity -=1;
            $cart->save();
        }else{
            echo "Less then 1";
        }
    }
}

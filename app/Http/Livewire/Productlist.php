<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\ShoppingCart as Cart;
use WithPagination;

use Livewire\Component;

class Productlist extends Component
{
    public $products;
    // protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $this -> products = Product::get();


        return view('livewire.productlist', [
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        ]);
    }

    public function addToCart($id){
        if(auth() -> user()){
            $data = [
                'user_id' => auth() -> user()->id,
                'product_id' => $id,
            ];
            Cart::UpdateOrCreate($data);

            $this->emit('updateCartCount');

            session()->flash('success', 'Product add to the cart successfully');
        }else {
            return redirect(route('login'));
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ShoppingCart as Cart;
use Illuminate\Support\Facades\Request;

class Productlist extends Component
{
    use WithPagination;

    public $pageSize = 5;
    protected $products;
    protected $listeners = ['pageSizeUpdated'];

    public function mount($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function pageSizeUpdated($value)
    {
        $this->pageSize = $value;
        $this->resetPage();
        $this->applyFilters();
    }

    public function render()
    {
        $this->applyFilters();

        return view('livewire.productlist', [
            'products' => $this->products,
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        ]);
    }

    public function applyFilters()
    {
        $categories = Request::input('category', []);
        $minPrice = Request::input('min_price');
        $maxPrice = Request::input('max_price');

        $query = Product::query();

        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        if ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice !== null && $maxPrice > 0) {
            $query->where('price', '<=', $maxPrice);
        }

        $this->products = $query->paginate($this->pageSize);
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

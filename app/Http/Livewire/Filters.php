<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Filters extends Component
// {
//     use WithPagination;

//     public $pageSize = 5;
//     public $selectedCategories = [];
//     public $minPrice;
//     public $maxPrice;

//     public $categories;

//     protected $listeners = ['filtersUpdated' => 'applyFilters'];

//     public function applyFilters()
//     {
//         $this->resetPage();
//     }

//     public function render(Request $request)
//     {
//         $categories = $request->input('category', []);
//         $minPrice = $request->input('min_price');
//         $maxPrice = $request->input('max_price');

//         $query = Product::query();

//         if (!empty($categories)) {
//             $query->whereIn('category_id', $categories);
//         }

//         if ($minPrice !== null) {
//             $query->where('price', '>=', $minPrice);
//         }

//         if ($maxPrice !== null && $maxPrice > 0) {
//             $query->where('price', '<=', $maxPrice);
//         }

//         $products = $query->paginate($this->pageSize);

//         $this->categories = ProductCategory::orderBy('name', 'asc')->get();

//         return view('livewire.filters', [
//             'filteredProducts' => $products,
//             'categories' => $categories,
//             'minPrice' => $minPrice,
//             'maxPrice' => $maxPrice,
//         ]);
//     }
// }<?php

{
    use WithPagination;

    // public $pageSize = 5;
    // public $selectedCategories = [];
    // public $minPrice;
    // public $maxPrice;

    // protected $queryString = [
    //     'selectedCategories' => ['except' => []],
    //     'minPrice' => ['except' => null],
    //     'maxPrice' => ['except' => null],
    // ];

    // public function applyFilters()
    // {
    //     $this->resetPage();
    // }

    // public function render()
    // {
    //     $query = Product::query();

    //     if (!empty($this->selectedCategories)) {
    //         $query->whereIn('category_id', $this->selectedCategories);
    //     }

    //     if ($this->minPrice !== null) {
    //         $query->where('price', '>=', $this->minPrice);
    //     }

    //     if ($this->maxPrice !== null && $this->maxPrice > 0) {
    //         $query->where('price', '<=', $this->maxPrice);
    //     }

    //     $products = $query->paginate($this->pageSize);

    //     $categories = ProductCategory::orderBy('name', 'asc')->get();

    //     return view('livewire.filters', [
    //         'filteredProducts' => $products,
    //         'categories' => $categories,
    //     ]);
    // }
}


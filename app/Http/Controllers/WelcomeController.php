<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Livewire\Filters;
use App\Http\Livewire\Productlist;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Session;


class WelcomeController extends Controller
{
    public $pageSize=5;

    public function index(Request $request)
    {
        $categories = $request->input('category', []);
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        $products = Product::query();

        if (!empty($categories)) {
            $products->whereIn('category_id', $categories);
        }

        if ($minPrice !== null) {
           $products->where('price', '>=', $minPrice);
       }
       if ($maxPrice !== null && $maxPrice > 0) {
        $products->where('price', '<=', $maxPrice);
        }

        $products = $products->paginate($this->pageSize);

     return view('welcome', [
         'products' => $products,
         'categories' => ProductCategory::orderBy('name', 'asc')->get(),
         'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
         'minPrice' => $minPrice,
         'maxPrice' => $maxPrice,
     ]);
 }
}
// //  }
// public function __invoke(Request $request)
// {
//     $categories = $request->input('category', []);
//     $minPrice = $request->input('min_price');
//     $maxPrice = $request->input('max_price');
//     $pageSize = $request->input('pageSize', 5); // Domyślna wartość 5

//     // Pobierz stany filtrów z sesji, jeśli istnieją
//     $sessionCategories = Session::get('category_filters', []);
//     $sessionMinPrice = Session::get('min_price_filter');
//     $sessionMaxPrice = Session::get('max_price_filter');

//     // Jeśli stany filtrów z sesji istnieją, zastosuj je
//     if (!empty($sessionCategories)) {
//         $categories = $sessionCategories;
//     }

//     if ($sessionMinPrice !== null) {
//         $minPrice = $sessionMinPrice;
//     }

//     if ($sessionMaxPrice !== null && $sessionMaxPrice > 0) {
//         $maxPrice = $sessionMaxPrice;
//     }

//     $products = Product::query();

//     if (!empty($categories)) {
//         $products->whereIn('category_id', $categories);
//     }

//     if ($minPrice !== null) {
//         $products->where('price', '>=', $minPrice);
//     }

//     if ($maxPrice !== null && $maxPrice > 0) {
//         $products->where('price', '<=', $maxPrice);
//     }

//     $products = $products->paginate($pageSize);

//     return view('welcome', [
//         'products' => $products,
//         'categories' => ProductCategory::orderBy('name', 'asc')->get(),
//         'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
//         'minPrice' => $minPrice,
//         'maxPrice' => $maxPrice,
//         'pageSize' => $pageSize,
//     ]);
// }
//}


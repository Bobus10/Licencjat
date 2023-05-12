<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Livewire\Filters;
use App\Http\Livewire\Productlist;


class WelcomeController extends Controller
{
    // public function __invoke()
    // {
    //     $categories = ProductCategory::orderBy('name', 'asc')->get();
    //     return view('welcome', [
    //         'categories' => $categories,
    //     ]);
    // }

    // public function changePageSize($size){
    //     $this->pageSize=$size;
    // }
//     public function __invoke(Request $request)
//     {
//         $categories = $request->input('category', []);
//         $minPrice = $request->input('min_price');
//         $maxPrice = $request->input('max_price');

//         $products = Product::query();

//         if (!empty($categories)) {
//             $products->whereIn('category_id', $categories);
//         }

//         if ($minPrice !== null) {
//            $products->where('price', '>=', $minPrice);
//        }
//     if ($maxPrice !== null && $maxPrice > 0) {
//         $products->where('price', '<=', $maxPrice);
//     }
//     $pageSize=5;
//     // $products = $products->paginate($this->pageSize);

//      return view('welcome', [
//          'filteredProducts' => $products,
//          'categories' => ProductCategory::orderBy('name', 'asc')->get(),
//          'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
//          'minPrice' => $minPrice,
//          'maxPrice' => $maxPrice,
//          'pageSize' => $pageSize,
//      ]);
//  }
public function __invoke(Request $request)
{
    $categories = $request->input('category', []);
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');
    $pageSize = $request->input('pageSize', 5); // Domyślna wartość 5

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

    $products = $products->Paginate($pageSize);

    return view('welcome', [
        'filteredProducts' => $products,
        'categories' => ProductCategory::orderBy('name', 'asc')->get(),
        'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        'minPrice' => $minPrice,
        'maxPrice' => $maxPrice,
        'pageSize' => $pageSize,
    ]);
}

}


<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    //use WithPagination;
    public $pageSize=5;

    public function changePageSize($size){
        $this->pageSize=$size;
    }
    /**
     * Display a listing of the resource.
     */            //
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
             'filteredProducts' => $products,
             'categories' => ProductCategory::orderBy('name', 'asc')->get(),
             'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
             'minPrice' => $minPrice,
             'maxPrice' => $maxPrice,
         ]);
     }
}

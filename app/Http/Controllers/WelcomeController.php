<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;


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
        $filteredProductCount = $products->total();

        return view('welcome', [
            'products' => $products,
            'categories' => ProductCategory::orderBy('name', 'asc')->get(),
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'filteredProductCount' => $filteredProductCount,
        ]);
    }
}

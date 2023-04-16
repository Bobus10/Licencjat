<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->query('filter');
        $query = Product::query();
        if(!is_null($filters)){
            if(array_key_exists('categories', $filters)){
                $query = $query->whereIn('category_id', $filters['categories']);
            }
            if(!is_null($filters['price_min'])){
                $query = $query->whereIn('price', '>=', $filters['price_min']);
            }
            if(!is_null($filters['price_max'])){
                $query = $query->whereIn('price', '<=', $filters['price_max']);
            }

            return response()->json([
                'data' => $query->get(),
            ]);
        }

        return view('welcome',[
            'products' => Product::paginate(6),
            'categories' => ProductCategory::orderBy('name', 'asc')->get(),
        ]);
    }
}

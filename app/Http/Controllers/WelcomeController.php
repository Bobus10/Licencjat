<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome',[
            'products' => Product::paginate(10)
        ]);
    }
}

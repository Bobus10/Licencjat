<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpsertProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index',[
            'products' => Product::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create',[
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(UpsertProductRequest $request)
    {
        $product = new Product($request->validated());
        if($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',[
            'products' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',[
            'products' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpsertProductRequest $request, Product $product): RedirectResponse
    {
        $product->fill($request->validated());
        if($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        $product -> delete();
        return redirect()->back();
    }
    public function details(Product $product)
    {
        return view('products.details',[
            'products' => $product,
            'defaultImageUrl' => 'https://via.placeholder.com/240x240/5fa9f8/efefef',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
// use App\Http\Livewire\ShoppingCart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("orders.order",[
            'orders' => Order::paginate(10),
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   //pobranie danych z koszyka i zapisanie w zamówianiach+
        $user = Auth::user();
        $cartItems = ShoppingCart::where('user_id', $user->id)->with('product')->get();


        foreach($cartItems as $item){
            $productz = $item->product_id;
            $price = $item->product->price;
            $quantity = $item->quantity;
            Order::create([
                'user_id' => $user->id,
                'product_id' => $productz,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }
        ShoppingCart::where('user_id', $user->id)->delete();
        //dd(Order::where('user_id', $user->id)->get());
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function showOrders(Order $order)
    {
        $order = Order::with('product')->get()->groupBy(function ($order) {
            return $order->created_at->format('Y-m-d'); // Grupowanie po roku, miesiącu i dniu
        });

        return view('orders.details',[
            'orders' => $order,
            'products' => Product::all(),
        ]);
    }
}

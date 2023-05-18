<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
// use App\Http\Livewire\ShoppingCart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user_id = Auth::id();
        // $orders = Order::where('user_id', $user_id)->get();
        $dates = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') AS date"))
        ->where('user_id', $user_id)
        ->groupBy('date')
        ->get()
        ->pluck('date')
        ->map(function ($datetime) {
            return Carbon::parse($datetime)->toDateTimeString();
        })
        ->unique();

        // $sumQty = $this->sumQty($orders);
        // $sumPrice = $this->sumPrice($orders);

        $orders = [];

        foreach ($dates as $datetime) {
            $dateOrders = Order::where('user_id', $user_id)
                ->whereBetween('created_at', [
                    Carbon::parse($datetime)->startOfMinute(),
                    Carbon::parse($datetime)->endOfMinute(),
                ])
                ->get()->filter(function ($order) use ($datetime) {
                    return Carbon::parse($order->created_at)->toDateTimeString() === $datetime;
                });

            $sumQty = $this->sumQty($dateOrders);
            $sumPrice = $this->sumPrice($dateOrders);

            $orders[] = [
                'datetime' => $datetime,
                'sumQty' => $sumQty,
                'sumPrice' => $sumPrice,
                'items' => $dateOrders,
            ];
        }

        return view("orders.order",[
            'dates' => $dates,
            'orders' => $orders,
            'products' => Product::all(),
            // 'sumQty' => $sumQty,
            // 'sumPrice' => $sumPrice,
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

    public function showOrders($datetime)
    {
        $user_id = Auth::id();

        $orders = Order::where('user_id', $user_id)
            ->where('created_at', $datetime)
            ->get();

        return view('orders.details', [
            'orders' => $orders,
            'products' => Product::all(),
        ]);
    }

    public function sumQty($orders)
    {
        $qty =0;
        foreach ($orders as $order){
            $qty += $order->quantity;
        }
        return $qty;
    }
    public function sumPrice($orders)
    {
        $price =0;
        foreach ($orders as $order){
            $price += $order->price * $order->quantity;
        }
        return $price;
    }

}

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
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $perPage = 25; // Liczba wyników na stronę

        $dates = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') AS date"))
            ->where('user_id', $user_id)
            ->groupBy('date')->orderBy('date', 'desc')
            ->get()
            ->pluck('date')
            ->map(function ($datetime) {
                return Carbon::parse($datetime)->toDateTimeString();
            })
            ->unique();

        $page = $request->query('page', 1); // Pobranie numeru bieżącej strony
        $offset = ($page - 1) * $perPage;
        $pagedDates = $dates->slice($offset, $perPage);

        $orders = [];

        foreach ($pagedDates as $datetime) {
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

        $datesPaginated = new LengthAwarePaginator(
            $pagedDates,
            $dates->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view("orders.order", [
            'dates' => $datesPaginated,
            'orders' => $orders,
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
    {
        $user = Auth::user();
        $cartItems = ShoppingCart::where('user_id', $user->id)->with('product')->get();

        foreach($cartItems as $item){
            $productz = $item->product_id;
            $price = $item->product->price;
            $quantity = $item->quantity;

            if ($item->quantity > $item->product->amount) {
                return back()->withError('Niewystarczająca ilość produktu. Maksymalna dostępna ilość: ' . $item->product->amount);
            }
            $item->product->amount -= $item->quantity;
            $item->product->save();

            Order::create([
                'user_id' => $user->id,
                'product_id' => $productz,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }

        ShoppingCart::where('user_id', $user->id)->delete();
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

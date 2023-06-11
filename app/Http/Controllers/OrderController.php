<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $perPage = 15;
        $orders = [];

        $dates = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') AS date"))
            ->where('user_id', $user_id)
            ->groupBy('date')->orderBy('date', 'desc')
            ->paginate($perPage);

        foreach ($dates as $date) {
            $datetime = Carbon::parse($date->date)->toDateTimeString();

            $dateOrders = Order::where('user_id', $user_id)
                ->whereBetween('created_at', [
                    Carbon::parse($datetime)->startOfMinute(),
                    Carbon::parse($datetime)->endOfMinute(),
                ])->get()->filter(function ($order) use ($datetime) {
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

        return view("orders.order", [
            'dates' => $dates,
            'orders' => $orders,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $cartItems = ShoppingCart::where('user_id', $user->id)->with('product')->get();

        foreach($cartItems as $item){
            $productId = $item->product_id;
            $price = $item->product->price;
            $quantity = $item->quantity;

            if ($item->quantity > $item->product->amount) {
                return back()->withError('Niewystarczająca ilość produktu. Maksymalna dostępna ilość: ' . $item->product->amount);
            }
            $item->product->amount -= $item->quantity;
            $item->product->save();

            Order::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }

        ShoppingCart::where('user_id', $user->id)->delete();
        return redirect(route('orders.index'));
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

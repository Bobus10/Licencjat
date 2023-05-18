@extends('layouts.app')
@section('content')
<div class="container">
    @php
        use App\Http\Controllers\OrderController;
    @endphp
    <div class="row">
        <div class="card-header d-flex align-items-center">
            <a href="{{ route('orders.index') }}" class="float-right mr-2">
                <button type="button" class="btn btn-success">
                    <i class="fa-solid fa-chevron-left"></i> Powrót
                </button>
            </a>
            <h1 class="mb-0 ml-2"> Zamówienie z </h1>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">{{ __('validation.attributes.price') }}</th>
                    <th scope="col">{{ __('validation.attributes.amount') }}</th>
                    <th scope="col">Suma</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $li=1;
                    $sumPrice =0;
                    $sumQty =0;
                    $shippment = 9.99;
                @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $li++}}</td>
                        <td>{{ $order->products->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price * $order->quantity }}</td>
                    </tr>
                    @php
                        $sumPrice += $order->price * $order->quantity;
                        $sumQty += $order->quantity;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="text-right"><strong><i class="fa-solid fa-truck-ramp-box"></i> Dostawa:</strong></td>
                    <td>{{ $shippment }}</td>
                </tr>
                <tr class="table-dark">
                    <td colspan="3" class="text-right"><strong>Sumy:</strong></td>
                    <td><strong>{{ $sumQty }}</strong></td>
                    <td><strong>{{ $sumPrice + $shippment }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

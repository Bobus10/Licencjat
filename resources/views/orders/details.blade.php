@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($orders as $date => $orderItems)
        <div>
            <h2>Zamówienia z {{ $date }}</h2>
            <ul>
                @foreach ($orderItems as $order)
                    {{-- <li>{{ $order->products->name }}</li> --}}
                    eo
                @endforeach
            </ul>
        </div>
    @endforeach
    </div>
</div>
@endsection

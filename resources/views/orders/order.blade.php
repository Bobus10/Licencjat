@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">uzytkownik</th>
                    <th scope="col">{{ __('validation.attributes.name') }}</th>
                    <th scope="col">{{ __('validation.attributes.price') }}</th>
                    <th scope="col">{{ __('validation.attributes.amount') }}</th>
                    <th scope="col">guzik</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                @if ( Auth::user()->id == $order->user_id)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->products->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td><a href="{{ route('orders.details', $order->id) }}" class="float-right">
                            <button type="button" class="btn btn-success"> P </button></a>p
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
    </div>
</div>
@endsection


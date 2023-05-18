@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data / godzina</th>
                    <th scope="col">{{ __('validation.attributes.price') }}</th>
                    <th scope="col">Liczba przedmiotów</th>
                    <th scope="col">Akcja</th>
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
                        <td>{{ $order['datetime'] }}</td>
                        <td>{{ $order['sumPrice']+$shippment }}</td>
                        <td>{{ $order['sumQty'] }}</td>
                        <td>
                            <a href="{{ route('orders.details', $order['datetime']) }}" class="float-right">
                            <button type="button" class="btn btn-success">Podgląd</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


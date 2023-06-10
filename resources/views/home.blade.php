@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"> <a href="{{ URL('/') }}"> Sklep </a></th>
                                <th scope="col"> <a href="{{ route('shopping-cart') }}"> koszyk </a></th>
                                <th scope="col"> <a href="{{ route('orders.index') }}"> zamówienia </a></th>
                                @can('isAdmin')
                                    <th scope="col"> <a href="{{ route('users.index') }}"> użytkownicy </a></th>
                                    <th scope="col"> <a href="{{ route('products.index') }}"> Produkty </a></th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

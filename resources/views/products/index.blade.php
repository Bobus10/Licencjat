@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{ __('shop.product.index_title') }}</h1>
            </div>
            <div class="col-6 float-right">
                <a  href="{{ route('products.create') }}" class="float-right">
                    <button type="button" class="btn btn-primary">{{ __('shop.button.add') }}</button>
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('validation.attributes.name') }}</th>
                        <th scope="col">{{ __('validation.attributes.description') }}</th>
                        <th scope="col">{{ __('validation.attributes.amount') }}</th>
                        <th scope="col">{{ __('validation.attributes.price') }}</th>
                        <th scope="col">{{ __('shop.product.fields.categories') }}</th>
                        <th scope="col">{{ __('shop.columns.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>{{ $product->price }}</td>
                            <td>@if ($product->hasCategory()){{ $product->category->name }}@endif</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="float-right">
                                    <button type="button" class="btn btn-success"> P </button>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="float-right">
                                    <button type="button" class="btn btn-primary"> E </button>
                                </a>
                                <a class="float-right">
                                    <button data-id="{{ $product->id }}" type="button" class="btn btn-danger delete"> X </button>
                                </a>
                                {{-- <button class="btn btn-danger btn-sm delete " data-id="{{ $product->id }}"> X </button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('products') }}/";
    {{-- const messagesDelete = "{{ __('shop.messages.delete.confirm') }}."; --}}
    const messagesDelete=["{{ __('shop.messages.delete.confirm') }}",
    "{{ __('shop.messages.delete.text') }}",
    "{{ __('shop.messages.delete.confirm_button') }}",
    "{{ __('shop.messages.delete.cancel_button') }}",
    "{{ __('shop.messages.delete.done') }}",
    "{{ __('shop.messages.delete.fail') }}"];
@endsection
@vite(['resources/js/delete.js'])

@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="{{ route('products.index') }}" method="GET">
        <div class="row">
            <div class="col-6">
                <h1>{{ __('shop.product.index_title') }} <i class="fa-solid fa-rectangle-list"></i></h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-primary">{{ __('shop.button.add') }} <i class="fa-solid fa-plus"></i></button>
                </a>
                <button id="filter-button" type="submit" class="btn btn-white border border-secondary">{{ __('validation.attributes.filter') }}uj <i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            @foreach ($filters as $filter)
                                <th scope="col">
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $filter['name'] }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $filter['label'] }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $filter['name'] }}">
                                            <li class="form-check">
                                                <input class="form-check-input" type="radio" name="{{ $filter['name'] }}" id="{{ $filter['name'] }}Min" value="min" {{ request($filter['name']) === 'min' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="{{ $filter['name'] }}Min">Rosnąco</label>
                                            </li>
                                            <li class="form-check">
                                                <input class="form-check-input" type="radio" name="{{ $filter['name'] }}" id="{{ $filter['name'] }}Max" value="max" {{ request($filter['name']) === 'max' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="{{ $filter['name'] }}Max">Malejąco</label>
                                            </li>
                                            <li class="form-check">
                                                <input default class="form-check-input" type="radio" name="{{ $filter['name'] }}" id="{{ $filter['name'] }}Max" value="none" {{ empty(request($filter['name'])) ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="{{ $filter['name'] }}none">Brak</label>
                                            </li>
                                        </ul>
                                    </div>
                                </th>
                            @endforeach
                            <th scope="col">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('shop.product.fields.categories') }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ( $categories as $category )
                                            <li class="form-check">
                                                <label class="form-check-label" >
                                                    <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}/>
                                                    {{ $category->name }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </th>
                            <th scope="col">{{ __('shop.columns.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td><p class="text-break">{{ $product->name }}</p></td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->price }}</td>
                                <td>@if ($product->hasCategory()) {{ $product->category->name }} @endif</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <button type="button" class="btn btn-success"> <i class="fa-regular fa-eye"></i> </button>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <button type="button" class="btn btn-primary"> <i class="fa-solid fa-file-pen"></i> </button>
                                        </a>
                                        <a href="{{ route('products.destroy', $product->id) }}">
                                            <button type="button" class="btn btn-danger delete"> <i class="fa-solid fa-trash-can"></i> </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
                <div class="pagination justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


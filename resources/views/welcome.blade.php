@extends('layouts.app')
@section('content')
<header>
</header>
@php
    use App\Http\Livewire\ShoppingCart;
@endphp
    <!-- sidebar + content -->
<div class="container">
    <div class="row">
          <!-- sidebar -->
        <div class="col-lg-3">
            <!-- Toggle button -->
            <button
                    class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
            <span>Show filter</span>
            </button>
            <!-- Collapsible wrapper  -->
            <form action="{{ url('/') }}" method="GET">
                <div class="collapse card d-lg-block mb-5" id="navbarSupportedContent">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item" id="products_wrapper">
                            <h2 class="accordion-header" id="headingTwo">
                                <button
                                        class="accordion-button text-dark bg-light"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target="#panelsStayOpen-collapseTwo"
                                        aria-expanded="true"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                Kategorie
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                                <div class="accordion-body">
                                @foreach ( $categories as $category )
                                    <div>
                                        <!-- Checked checkbox -->
                                        <div class="form-check">
                                            <label class="form-check-label" >
                                                <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}/>
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                                                {{-- Filtr cena --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button
                                    class="accordion-button text-dark bg-light"
                                    type="button"
                                    data-mdb-toggle="collapse"
                                    data-mdb-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                Cena
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                                <div class="accordion-body">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-outline">
                                                <label class="form-label">
                                                    <input type="number" class="form-control" name="min_price" placeholder="0" min="0" value="{{ old('price_min', ($minPrice !== null) ? $minPrice : '') }}"/>
                                                    Min
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-outline">
                                                <label class="form-label" >
                                                    <input type="number" class="form-control" name="max_price" placeholder="1 000" min="0" value="{{ old('max_price', ($maxPrice !== null) ? $maxPrice : '') }}"/>
                                                    Max
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="filter-button" type="submit" class="btn btn-white w-100 border border-secondary">{{ __('validation.attributes.filter') }}uj <i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <!-- sidebar -->
        <!-- content -->
        <div class="col-lg-9">
            <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
                <strong class="d-block py-2">{{ $filteredProductCount }} Produktów </strong>
            </header>
            <div id="product_wrapper" wire:target="pageSizeUpdated, updatedFilters" wire:loading>
            Loading...
            </div>
            <div class="row justify-content-center mb-3">
                @foreach ($products as $product)
                    <div class="col-md-12">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                            {{-- <a href="{{ route('products.details', $product->id) }}" class="float-right"> --}}
                                        @if(!is_null($product->image_path))
                                            <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                            <img src={{ $defaultImageUrl }} class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @endif
                                            {{-- </a> --}}
                                        <a href="#!">
                                            <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-5 col-sm-7">
                                        <h5>{{ $product->name }}</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-warning mb-1 me-2">
                                            <span class="ms-1">Dostępność: {{ $product->amount }} </span>
                                            </div>
                                            <span class="text-muted"></span>
                                        </div>
                                        <p class="text mb-4 mb-md-0">
                                            @php
                                                $opis = nl2br($product->description);
                                            @endphp
                                            {!! $opis !!}
                                        </p>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-sm-5">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">{{ $product->price }} PLN </h4>
                                        </div>
                                        <h6 class="text-success">Dostawa: {{ ShoppingCart::$shipping }}</h6>
                                        <div class="mt-4">
                                            @auth
                                                {{-- dodaj do koszyka --}}
                                                <livewire:productlist :product="$product" disabled/>
                                            @endauth
                                            @guest
                                                <a href="{{ route('login') }}"><button class="btn btn-success btn-sm">
                                                    <i class="fas fa-cart-plus"></i> Dodaj do koszyka
                                                </button></a>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{  $products->appends(request()->query())->links()  }}
        </div>
    </div>
</div>
@livewireScripts
@endsection
@section('javascript')
    const WELCOME_DATA ={
        storagePath: "{{ asset('storage')}}/",
        addToCart: '{{ url('cart') }}/',
    }
@endsection
@vite(['resources/js/welcome.js'])

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if ( $cartItems->count() > 0 )
    <div class="block-heading pb-2">
        @if ( $cartItems->count() == 1)
            <h2>W Koszyku jest {{ $cartItems->count() }} przedmiot</h2>
        @else
            <h2>W Koszyku są {{ $cartItems->count() }} przedmioty</h2>
        @endif
        <a href="/"><button class="btn btn-primary "><i class="fa-solid fa-chevron-left"></i> Wróć do zakupów</button></a>
        <a href="{{ route('shopping-cart.destroyAll') }}"><button class="btn btn-danger allDlt">Wyczyść koszyk <i class="fa-solid fa-trash-can"></i></button></a>
    </div>
    <div class="content">
        <div class="row">
            <div class="col">
            @foreach ($cartItems as $item)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                            <a href="{{ route('products.details', $item->product->id) }}" class="float-right">
                                        @if(!is_null($item->product->image_path))
                                            <img src="{{ asset('storage/' . $item->product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                            <img src={{ $defaultImageUrl }} class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @endif
                                            </a>
                                    </div>
                                    </div>
                                    <div class="col-xl-5 col-md-4 col-sm-7">
                                        <a href="{{ route('products.details', $item->product->id) }}" class="float-right text-decoration-none text-black">
                                        <h5>{{ $item->product->name }}</h5></a>
                                        <div class="mt-3 d-flex">
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-primary" wire:click="decrementQty({{ $item->id }})"> - </button>
                                            </div><div class="btn-group me-2" role="group" aria-label="sc group">
                                                <span class="p-2">{{ $item->quantity }}</span>
                                            </div><div class="btn-group me-2" role="group" aria-label="th group">
                                                <button type="button" class="btn btn-primary" wire:click="incrementQty({{ $item->id }})"> + </button>
                                            </div><div class="btn-group me-2" role="group" aria-label="fr group">
                                                <button type="button" class="btn btn-danger mx-2 singleDlt active" data-product-name="{{ $item->product->name }}">
                                                    <a href="{{ route('shopping-cart.destroy', $item->id) }}" class="link-light"><i class="fa-solid fa-trash-can"></i>
                                                </button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4 col-sm-5 ">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h6 class="mb-1 me-1">Cena: {{ $item->product->price }} PLN</h6>
                                        </div>
                                        <h4 class="mb-1 me-1">Wartość: {{ $item->product->price * $item->quantity }} PLN</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
                <div class="col col-lg-3 card border-secondary pb-2">
                    <div class="">
                        <h3 class="card-header"> Podsumowanie </h3>
                        <div class=""><span class="text">Cena częściowa: </span><span class="price"> {{ $sub_total }} PLN</span></div>
                        <div class=""><span class="text">Zniżki: </span><span class="price"> {{ $tax }} PLN</span></div>
                        <div class=""><span class="text">Dostawa: </span><span class="price"> {{ $shipping }} PLN</span></div>
                        <div class=""><span class="text-success">Całkowita wartość: </span><span class="price text-success"> {{ $total }} PLN</span></div>
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-primary btn-lg btn-block checkout-info"> Zapłać <i class="fa-solid fa-credit-card"></i></button>
                        </form>
                    </div>
                </div>
 {{-- htef="checkout.index" --}}
        @else
            <div class="block-heading pb-2 text-center">
                <h2>Brak produktów w koszyku</h2>
                <a href="/"><button class="btn btn-primary ">Wróć do zakupów</button></a>
            </div>
        @endif

        </div>
    </div>
</div>

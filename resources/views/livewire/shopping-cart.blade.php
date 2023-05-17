<div class="container">
    @if ( $cartItems->count() > 0 )
    <div class="block-heading pb-2">
        @if ( $cartItems->count() == 1)
            <h2>W Koszyku jest {{ $cartItems->count() }} przedmiot</h2>
        @else
            <h2>W Koszyku są {{ $cartItems->count() }} przedmioty</h2>
        @endif
        <a href="/"><button class="btn btn-primary ">Wróć do zakupów</button></a>
        <a href="{{ route('shopping-cart.destroyAll') }}"><button class="btn btn-danger">Wyczyść koszyk</button></a>
    </div>
{{-- , Auth()->user()->id --}}
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
                                <div class="col-xl-6 col-md-4 col-sm-7">
                                    <a href="{{ route('products.details', $item->product->id) }}" class="float-right text-decoration-none text-black">
                                    <h5>{{ $item->product->name }}</h5></a>
                                    <div class="d-flex justify-content-between">

                                    </div>
                                    <div class="mt-3 d-flex">
                                        <button class="btn btn-primary" wire:click="decrementQty({{ $item->id }})"> - </button>
                                        <span class="p-2">{{ $item->quantity }}</span>
                                        <button class="btn btn-primary" wire:click="incrementQty({{ $item->id }})"> + </button>
                                        <a href="{{ route('shopping-cart.destroy', $item->id) }}">
                                            <button type="button" class="btn btn-close btn-close mx-2"></button></a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-5">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h6 class="mb-1 me-1">Unit Price: {{ $item->product->price }} PLN</h6>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                    </div>
                                    <h4  class="mb-1 me-1">Total Price: {{ $item->product->price * $item->quantity }} PLN</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
            <div class="col col-lg-3 card border-secondary pb-2">
                <div class="summary ">
                    <h3 class="card-header">Summary</h3>
                    <div class="summary-item"><span class="text">Subtotal: </span><span class="price"> {{ $sub_total }} PLN</span></div>
                    <div class="summary-item"><span class="text">Discount: </span><span class="price"> {{ $tax }} PLN</span></div>
                    <div class="summary-item"><span class="text">Shipping: </span><span class="price"> {{ $shipping }} PLN</span></div>
                    <div class="summary-item"><span class="text-success">Total: </span><span class="price text-success"> {{ $total }} PLN</span></div>
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-primary btn-lg btn-block" htef="checkout.index"> Checkout</button>
                    </form>
                </div>
            </div>

    @else
        <div class="block-heading pb-2 text-center">
            <h2>Brak produktów w koszyku</h2>
            <a href="/"><button class="btn btn-primary ">Wróć do zakupów</button></a>
        </div>
    @endif

        </div>
    </div>
</div>



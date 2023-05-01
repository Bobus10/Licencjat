@section('content')
<div class="container">
    <div class="block-heading">
      <h2>Shopping Cart</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
    </div>
    <div class="content">
        <div class="row">
            @if (!is_null($cartItems))
                                {{-- Produkty z koszyka --}}
             <div class="col-md-12 col-lg-8">
                 <div class="items">
                     <div class="product">
                        <div class="row">
                            @foreach ($cartItems as $item)
                             <div class="col-md-3">
                            @if(!is_null($item->product->image_path))
                                <img src="{{ asset('storage/' . $item->product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                            @else
                                <img src={{ $defaultImageUrl }} class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                            @endif
                             </div>
                             <div class="col-md-8">
                                 <div class="info">
                                     <div class="row">
                                         <div class="col-md-5 product-name">
                                             <div class="product-name">
                                                {{ $item->product->name }}  {{ $item->product->price }} PLN
                                                 {{-- <div class="product-info">
                                                     <div>Display: <span class="value">5 inch</span></div>
                                                     <div>RAM: <span class="value">4GB</span></div>
                                                     <div>Memory: <span class="value">32GB</span></div>
                                                 </div> --}}
                                             </div>
                                         </div>
                                         <div class="col-md-4 quantity">quantity
                                            <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                                <button id="decrementQty" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none" wire:click="decrementQty({{ $item->id }})">
                                                    <span class="m-auto text-2xl font-thin">-</span>
                                                </button>
                                                <span class="p-2">{{ $item->quantity}}</span>
                                                <button id="incrementQty" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer"  >
                                                    <span class="m-auto text-2xl font-thin" wire:click="incrementQty({{ $item->id }})">+</span>
                                                </button>
                                            </div>
                                            {{-- <input type="number" id="quantity" name="quantity" min="1" value="{{ $item->quantity}}" class="form-control" placeholder="{{ $item->quantity}}" style="width: 90px;"> --}}
                                            </div>
                                            <div class="col-md-3 price">
                                                {{-- Unit Price: {{ $item->product->price }} PLN --}}
                                                Total Price: {{ $item->product->price * $item->quantity }} PLN
                                             </div>

                                     </div>
                                 </div>
                             </div>
                            @endforeach
                         </div>
                     </div>
                  </div>
             </div>
             @else
                <p>No item in cart</p>
             @endif

             <div class="col-md-12 col-lg-4">
                 <div class="summary">
                     <h3>Summary</h3>
                     <div class="summary-item"><span class="text">Subtotal </span><span class="price"> {{ $sub_total }} PLN</span></div>
                     <div class="summary-item"><span class="text">Discount</span><span class="price"> $0</span></div>
                     <div class="summary-item"><span class="text">Shipping</span><span class="price"> $0</span></div>
                     <div class="summary-item"><span class="text">Total </span><span class="price"> {{ $total }} PLN</span></div>
                     <button type="button" class="btn btn-primary btn-lg btn-block" htef="checkout.index"> Checkout</button>
                 </div>
             </div>
         </div>

     </div>
 </div>
@endsection
@vite(['resources/js/welcome.js'])



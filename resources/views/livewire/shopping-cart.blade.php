<div>
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
                                                id:{{ $item->id }} {{ $item->product->name }}  {{ $item->product->price }} PLN
                                                <a href="{{ route('shopping-cart.destroy', $item->id) }}">
                                                    <button type="button" class="btn btn-danger" >X</button></a>
                                                 {{-- <div class="product-info">
                                                     <div>Display: <span class="value">5 inch</span></div>
                                                     <div>RAM: <span class="value">4GB</span></div>
                                                     <div>Memory: <span class="value">32GB</span></div>
                                                 </div> --}}
                                             </div>
                                        </div>
                                        <div class="col-md-4 quantity">quantity
                                            <div class="">
                                                <button class="btn btn-primary" wire:click="decrementQty({{ $item->id }})"> - </button>
                                                <span class="p-2">{{ $item->quantity }}</span>
                                                <button class="btn btn-primary" wire:click="incrementQty({{ $item->id }})"> + </button>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-md-3 price">
                                            Unit Price: {{ $item->product->price }} PLN
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
</div>


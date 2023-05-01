<div>
    @foreach ($products as $product)
          <div class="row justify-content-center mb-3">
            <div class="col-md-12">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row g-0">
                    <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                            <a href="{{ route('products.details', $product->id) }}" class="float-right">
                        @if(!is_null($product->image_path))
                            <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                        @else
                            <img src={{ $defaultImageUrl }} class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                        @endif
                            </a>
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
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i>
                            <span class="ms-1"> 3.5 </span>
                          </div>
                          <span class="text-muted"> 910 orders </span>
                        </div>
                        <p class="text mb-4 mb-md-0">
                          {{ $product->description }}
                        </p>
                      </div>
                      <div class="col-xl-3 col-md-3 col-sm-5">
                        <div class="d-flex flex-row align-items-center mb-1">
                          <h4 class="mb-1 me-1">{{ $product->price }} PLN </h4>
                        </div>
                        <h6 class="text-success">Free shipping</h6>
                        <div class="mt-4">
                            {{-- data-id="{{ $product->id }}" @guest disabled @endguest --}}
                            <button class="btn btn-success btn-sm add_cart_button" wire:click="addToCart({{ $product->id }})">
                                <i class="fas fa-cart-plus"></i> Dodaj do koszyka
                            </button>
                          <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i class="fas fa-heart fa-lg px-1"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          @endforeach
</div>

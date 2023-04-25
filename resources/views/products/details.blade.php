@extends('layouts.app')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- Product image -->
                                <div class="col-md-6">
                                    @if(!is_null($products->image_path))
                                        <img src="{{ asset('storage/' . $products->image_path) }}"
                                        class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef"
                                            class="img-fluid mx-auto d-block" alt="Card image cap">
                                        @endif
                                </div>

                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <form class="ps-lg-4">
                                    <!-- Product title -->
                                    <h3 class="mt-0"> {{ $products->name }} <i class="mdi mdi-square-edit-outline ms-2"></i> </h3>
                                    <p class="mb-1">Added Date: {{ $products->created_at }}</p>
                                    {{-- <p class="font-16">
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                        <span class="text-warning mdi mdi-star"></span>
                                    </p> --}}

                                    <!-- Product stock -->
                                    <div class="mt-3">
                                        <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                    </div>

                                    <!-- Product description -->
                                    <div class="mt-4">
                                        <h6 class="font-14">Retail Price:</h6>
                                        <h3> {{ $products->price }}PLN </h3>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="mt-4">
                                        <h6 class="font-14">Quantity</h6>
                                        <div class="d-flex">
                                            <input type="number" min="1" value="1" class="form-control" placeholder="Qty" style="width: 90px;">
                                            <button type="button" class="btn btn-danger ms-2"><i class="mdi mdi-cart me-1"></i> Add to cart</button>
                                        </div>
                                    </div>

                                    <!-- Product description -->
                                    <div class="mt-4">
                                        <h6 class="font-14">Description:</h6>
                                        <p> {{ $products->description }} </p>
                                    </div>

                                    <!-- Product information -->
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h6 class="font-14">Available Stock:</h6>
                                                <p class="text-sm lh-150"> {{ $products->amount }} </p>
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="font-14">Number of Orders:</h6>
                                                <p class="text-sm lh-150">5,458</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end col -->

                            {{-- @foreach ($rproducts as $rproduct)                             losowe produkty//nie dziala
                        <div class="row justify-content-center mb-3">
                          <div class="col-md-12">
                            <div class="card shadow-0 border rounded-3">
                              <div class="card-body">
                                <div class="row g-0">
                                  <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                                          <a href="{{ route('products.details', $rproduct->id) }}" class="float-right">
                                      @if(!is_null($rproduct->image_path))
                                          <img src="{{ asset('storage/' . $rproduct->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
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
                                      <h5>{{ $rproduct->name }}</h5>
                                      <div class="d-flex flex-row">
                                        </div>
                                        <span class="text-muted">910 orders</span>
                                      </div>

                                      <p class="text mb-4 mb-md-0">
                                        {{ $rproduct->description }}
                                      </p>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-sm-5">
                                      <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="mb-1 me-1">{{ $rproduct->price }} PLN </h4>
                                      </div>
                                      <h6 class="text-success">Free shipping</h6>
                                      <div class="mt-4">
                                        <button class="btn btn-primary shadow-0" type="button">Buy this</button>
                                        <a href="#!" class="btn btn-light border px-2 pt-2 icon-hover"><i class="fas fa-heart fa-lg px-1"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                        @endforeach --}}

                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
@endsection

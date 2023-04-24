@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endpush
@section('content')
<!--Main Navigation-->
<header>
    <!-- Jumbotron -->
        <!-- Jumbotron -->

    <!-- Heading -->
    <div class="bg-primary mb-4">
        <div class="container py-4">
          <h3 class="text-white mt-2">Men's wear</h3>
          <!-- Breadcrumb -->
          <nav class="d-flex mb-2">
            <h6 class="mb-0">
              <a href="" class="text-white-50">Home</a>
              <span class="text-white-50 mx-2"> > </span>
              <a href="" class="text-white-50">Library</a>
              <span class="text-white-50 mx-2"> > </span>
              <a href="" class="text-white"><u>Data</u></a>
            </h6>
          </nav>
          <!-- Breadcrumb -->
        </div>
      </div>
      <!-- Heading -->
    </header>

    <!-- sidebar + content -->
    <form class="" id="sidebar_filter" >                                    <!-- tu dodac action route -->
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
                    aria-label="Toggle navigation"
                    >
              <span>Show filter</span>
            </button>
            <!-- Collapsible wrapper  -->
                                                {{-- filtr kategoria --}}
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
                              aria-controls="panelsStayOpen-collapseTwo"
                              >
                        Kategorie
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
                      <div class="accordion-body">
                        @foreach ( $categories as $category )
                        <div>
                          <!-- Checked checkbox -->
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="filter[categories][]" id="category-{{ $category->id }}" value="{{ $category->id }}" />
                            <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                            {{-- <span class="badge badge-secondary float-end">120</span> --}}
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
                            aria-controls="panelsStayOpen-collapseThree"
                            >
                      Price
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                    <div class="accordion-body">
                      <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-outline">
                                <label class="form-label" for="filter[price_min]">Min</label>
                                <input type="number" id="filter[price_min]" class="form-control" name="filter[price_min]" placeholder="0" min="0"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-outline">
                                <label class="form-label" for="filter[price_max]">Max</label>
                                <input type="number" id="filter[price_max]" class="form-control" name="filter[price_max]" placeholder="1 000" min="0"/>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button
                            class="accordion-button text-dark bg-light"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseFour"
                            aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFour"
                            >
                      Size
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                    <div class="accordion-body">
                      <input type="checkbox" class="btn-check border justify-content-center" id="btn-check1" checked autocomplete="off" />
                      <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check1">XS</label>
                      <input type="checkbox" class="btn-check border justify-content-center" id="btn-check2" checked autocomplete="off" />
                      <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check2">SM</label>
                      <input type="checkbox" class="btn-check border justify-content-center" id="btn-check3" checked autocomplete="off" />
                      <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check3">LG</label>
                      <input type="checkbox" class="btn-check border justify-content-center" id="btn-check4" checked autocomplete="off" />
                      <label class="btn btn-white mb-1 px-1" style="width: 60px;" for="btn-check4">XXL</label>
                    </div>
                  </div>
                </div> --}}

                {{-- <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button
                            class="accordion-button text-dark bg-light"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#panelsStayOpen-collapseFive"
                            aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseFive"
                            >
                      Ratings
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingThree">
                    <div class="accordion-body">
                      <!-- Default checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                        <label class="form-check-label" for="flexCheckDefault">
                          <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-warning"></i>
                        </label>
                      </div>
                      <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                        <label class="form-check-label" for="flexCheckDefault">
                          <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                          <i class="fas fa-star text-secondary"></i>
                        </label>
                      </div>
                      <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                        <label class="form-check-label" for="flexCheckDefault">
                          <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i>
                          <i class="fas fa-star text-secondary"></i>
                        </label>
                      </div>
                        <!-- Default checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
                        <label class="form-check-label" for="flexCheckDefault">
                          <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-secondary"></i><i class="fas fa-star text-secondary"></i>
                          <i class="fas fa-star text-secondary"></i>
                        </label>
                      </div>
                    </div>
                  </div>
                </div> --}}
            </div>
          </div>
          <button id="filter-button" type="button" class="btn btn-white w-100 border border-secondary">{{ __('validation.attributes.filter') }}uj</button>
        </div>
    </form>
        <!-- sidebar -->
        <!-- content -->
        <div class="col-lg-9">
          <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
            <strong class="d-block py-2">{{ $products->total() }} Produktów </strong>
                <div class="ms-auto"> Widok:
              <select class="form-select d-inline-block w-auto border pt-1" id="product_count_value">
                <option
                {{-- class="{{ $pageSize==5 ? 'active': '' }}"  --}}
                value="5" wire:click.prevent="changePageSize(5)">5</option>
                <option value="10" wire:click.prevent="changePageSize(10)">10</option>
                <option value="15" wire:click.prevent="changePageSize(15)">15</option>
                <option value="20" wire:click.prevent="changePageSize(20)">20</option>
              </select>

              <select class="form-select d-inline-block w-auto border pt-1">
                <option value="0">Best match</option>
                <option value="1">Recommended</option>
                <option value="2">High rated</option>
                <option value="3">Randomly</option>
              </select>

              <div class="btn-group shadow-0 border">
                <a href="#" class="btn btn-light" title="List view">
                  <i class="fa fa-bars fa-lg"></i>
                </a>
                <a href="#" class="btn btn-light active" title="Grid view">
                  <i class="fa fa-th fa-lg"></i>
                </a>
              </div>
            </div>
          </header>

            <div id="product_wrapper">                                                    {{-- Produkty --}}
          @foreach ($products as $product)
          <div class="row justify-content-center mb-3">
            <div class="col-md-12">
              <div class="card shadow-0 border rounded-3">
                <div class="card-body">
                  <div class="row g-0">
                    <div class="col-xl-3 col-md-4 d-flex justify-content-center">
                      <div class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0">
                        @if(!is_null($product->image_path))
                            <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                        @else
                            <img src={{ $defaultImageUrl }} class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                        @endif
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
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span class="ms-1">
                              3.5
                            </span>
                          </div>
                          <span class="text-muted">910 orders</span>
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
                          <button class="btn btn-primary shadow-0" type="button">Buy this</button>
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

          <hr />

          <!-- Pagination -->
          <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                {!! $products->links() !!}
          </nav>
          <!-- Pagination -->
        </div>
      </div>
    </div>


  <!-- Footer -->
  <footer class="text-center text-lg-start text-muted bg-primary mt-3">
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start pt-4 pb-4">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-12 col-lg-3 col-sm-12 mb-2">
            <!-- Content -->
            <a href="https://mdbootstrap.com/" target="_blank" class="text-white h2">
              MDB
            </a>
            <p class="mt-1 text-white">
              © 2023 Copyright: MDBootstrap.com
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Store
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">About us</a></li>
              <li><a class="text-white-50" href="#">Find store</a></li>
              <li><a class="text-white-50" href="#">Categories</a></li>
              <li><a class="text-white-50" href="#">Blogs</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Information
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">Help center</a></li>
              <li><a class="text-white-50" href="#">Money refund</a></li>
              <li><a class="text-white-50" href="#">Shipping info</a></li>
              <li><a class="text-white-50" href="#">Refunds</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-6 col-sm-4 col-lg-2">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">
              Support
            </h6>
            <ul class="list-unstyled mb-4">
              <li><a class="text-white-50" href="#">Help center</a></li>
              <li><a class="text-white-50" href="#">Documents</a></li>
              <li><a class="text-white-50" href="#">Account restore</a></li>
              <li><a class="text-white-50" href="#">My orders</a></li>
            </ul>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-12 col-sm-12 col-lg-3">
            <!-- Links -->
            <h6 class="text-uppercase text-white fw-bold mb-2">Newsletter</h6>
            <p class="text-white">Stay in touch with latest updates about our products and offers</p>
            <div class="input-group mb-3">
              <input type="email" class="form-control border" placeholder="Email" aria-label="Email" aria-describedby="button-addon2" />
              <button class="btn btn-light border shadow-0" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                Join
              </button>
            </div>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <div class="">
      <div class="container">
        <div class="d-flex justify-content-between py-4 border-top">
          <!--- payment --->
          <div>
            <i class="fab fa-lg fa-cc-visa text-white"></i>
            <i class="fab fa-lg fa-cc-amex text-white"></i>
            <i class="fab fa-lg fa-cc-mastercard text-white"></i>
            <i class="fab fa-lg fa-cc-paypal text-white"></i>
          </div>
          <!--- payment --->

          <!--- language selector --->
          <div class="dropdown dropup">
            <a class="dropdown-toggle text-white" href="#" id="Dropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
              <li>
                <a class="dropdown-item" href="#"><i class="flag-united-kingdom flag"></i>English <i class="fa fa-check text-success ms-2"></i></a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
              </li>
            </ul>
          </div>
          <!--- language selector --->
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->
@endsection
@section('javascript')
    const storagePath = "{{ asset('storage')}}/";
    const defaultImageUrl = "{{ $defaultImageUrl }}";
@endsection
@vite(['resources/js/welcome.js'])
{{-- <div class="p-3 text-center bg-white border-bottom">
    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-5 col-md-12 col-12">
          <div class="input-group float-center">
            <div class="form-outline">
              <input type="search" id="form1" class="form-control" />
              <label class="form-label" for="form1">Search</label>
            </div>
            <button type="button" class="btn btn-primary shadow-0">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <!-- Right elements -->
      </div>
    </div>
  </div> --}}

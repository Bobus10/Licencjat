<div>
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
</div>

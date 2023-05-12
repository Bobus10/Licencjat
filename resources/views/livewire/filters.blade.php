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
                            <label class="form-check-label" >
                                <input class="form-check-input" type="checkbox" name="category[]" value="{{ $category->id }}" {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}/>
                                {{ $category->name }} id:{{ $category->id }}
                            </label>
                        {{-- <span class="badge badge-secondary float-end">120</span>name="filter[categories][]" id="category-{{ $category->id }}"for="category-{{ $category->id }}" --}}
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

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSize">
                    <button
                        class="accordion-button text-dark bg-light"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#collapseSize"
                        aria-expanded="false"
                        aria-controls="collapseSize"
                    >
                        Size
                    </button>
                </h2>
                <div id="collapseSize" class="accordion-collapse collapse show" aria-labelledby="headingSize">
                    <div class="accordion-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="form-outline">
                                    <select class="form-select d-inline-block w-auto border pt-1" wire:model="pageSize">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <button wire:click="applyFilters" class="btn btn-white w-100 border border-secondary">{{ __('validation.attributes.filter') }}uj</button>
</div>

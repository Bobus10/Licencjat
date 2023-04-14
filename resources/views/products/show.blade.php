@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Podgląd produktu</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength="500" class="form-control"
                                    name="name" value="{{ $products->name }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" maxlength="1500" class="form-control" name="description" disabled>{{ $products->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">{{ __('Ilość') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" min="0" class="form-control"
                                    name="amount" value="{{ $products->amount }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Cena') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" min="0"
                                    class="form-control" name="price" value="{{ $products->price }}" disabled>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-end">{{ __('Zdjecie') }}</label>

                            <div class="col-md-6">
                                @if(!is_null($products->image_path))
                                        <img src="{{ asset('storage/' . $products->image_path) }}"
                                        class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                        @else
                                        <img src="https://via.placeholder.com/240x240/5fa9f8/efefef"
                                            class="img-fluid mx-auto d-block" alt="Card image cap">
                                        @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

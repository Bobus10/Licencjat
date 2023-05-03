@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('shop.product.edit_title', ['name' => $products->name]) }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $products->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('validation.attributes.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" maxlength="500"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $products->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('validation.attributes.description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control @error('description') is-invalid @enderror"
                                    name="description" required autofocus>{{ $products->description }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="amount"
                                    class="col-md-4 col-form-label text-md-end">{{ __('validation.attributes.amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" min="0"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ $products->amount }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('validation.attributes.price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" min="0"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $products->price }}" required autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-end">{{ __('shop.product.fields.categories') }}</label>

                                <div class="col-md-6">
                                    <select id="category" class="form-control @error('price') is-invalid @enderror" name="category_id" required>
                                        <option value="">brak</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($products->isSelectedCategory($category->id)) selected @endif> {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-end">{{ __('validation.attributes.image') }}</label>

                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $products->image_path) }}"
                                        class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image">
                                </div>
                            </div>

                            @error('image')
                                <span class="form-control @error('image') is-invalid @enderror" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('shop.button.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

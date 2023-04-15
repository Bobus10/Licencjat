@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{ __('shop.user.index_title') }}</h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('validation.attributes.email') }}s</th>
                    <th scope="col">{{ __('validation.attributes.first_name') }}</th>
                    <th scope="col">{{ __('validation.attributes.last_name') }}</th>
                    <th scope="col">{{ __('validation.attributes.phone') }}</th>
                    <th scope="col">{{ __('shop.columns.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <a class="float-right">
                                <button data-id="{{ $user->id }}" type="button" class="btn btn-danger delete"> X </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
    const messagesDelete = "{{ __('shop.messages.delete.confirm') }}";

@endsection
@vite(['resources/js/delete.js']);
{{-- @section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection --}}

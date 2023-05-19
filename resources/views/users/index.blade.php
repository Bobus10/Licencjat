@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>{{ __('shop.user.index_title') }} <i class="fa-solid fa-users"></i></h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('validation.attributes.email') }}</th>
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
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <a href="{{ route('users.destroy', $user->id) }}" class="float-right">
                                <button type="button" class="btn btn-danger delete"> <i class="fa-solid fa-trash-can"></i> </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">imie</th>
                    <th scope="col">nazwisko</th>
                    <th scope="col">numer telefonu</th>
                    <th scope="col">Akcje</th>
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
                        <td><button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}"> X </button> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
@section('javascript')
            $('.delete').click(function(){
                {{-- alert($(this)); --}}
                {{-- console.log($(this).data("id")); --}}
                $.ajax({
                    method: "delete",
                    url: "http://shop.test/users/" + $(this).data("id"),
                    {{-- data: { id: $(this).data("id") } --}}
                  })
                    .done(function( response ) {
                        window.location.reload();
                      {{-- alert( "Success" ); --}}
                    })
                    .fail(function( response ) {
                      alert( "Error" );
                    });
            });

@endsection



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
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->email }}</td>
        <td>{{ $user->name }}</td>
        <td>-</td>
      </tr>     
    @endforeach
    </tbody>
  </table>
</div>
@endsection

@extends('layouts.layout')
@section("cabecera")

@endsection

@section('main')

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cédula</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $persona)
        <tr>
            <th scope="row"> {{ $persona->id }} </th>
            <td> {{ $persona->nombre }} </td>
            <td> {{ $persona->apellido }} </td>
            <td> {{ $persona->ci }} </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection